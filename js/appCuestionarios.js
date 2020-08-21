const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listar: [],
        buscar: '',
        itemId: '',
        formEditar: {},
        userPost: ''
    },
    created() {
        this.getCuestionario()
        this.getId()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Nombre_cuest.toUpperCase().match(this.buscar.toUpperCase()) || filtro.Cod_cuest.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        registro() {

            const form = document.getElementById('formRegistro')
            axios.post('../api/cuestionario/addCuestionario.php', new FormData(form))
                .then(res => {
                    this.respuesta= res.data ;
                    if (res.data == 'success') {
                        swal({
                            title: 'Cuestionario',
                            text: 'Cuestionario Creado',
                            icon: 'success'
                        })
                    } else {
                        swal({
                            title: 'Error',
                            text:'Cuestionario no Creado, '+ this.respuesta,
                            icon: 'error'
                        })
                    }
                    this.getCuestionario()
                })
        },
        getCuestionario() {
            let uri = window.location.href.split('?');

            axios.get('../api/cuestionario/getCuestionario.php')
                .then(res => {
                    this.listar = res.data
                })

        },
        eliminar(id) {
            swal({
                    title: 'Seguro que deseas eliminar el Cuestionario',
                    text: 'Al eliminarlo no podras recuperarlo',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('../api/cuestionario/eliminarCuestionario.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal({
                                        title: 'Eliminar',
                                        text: 'Cuestionario Eliminado',
                                        icon: 'success'
                                    })
                                    this.getCuestionario()
                                } else {
                                    swal({
                                        title: 'Error',
                                        text: 'Cuestionario no Eliminado'+ this.respuesta,
                                        icon: 'error'
                                    })
                                }
                            })
                            this.getCuestionario()
                    } else {
                        return false
                    }
                })
        },
        editar() {
            const form = document.getElementById('editarCuestionario')
            axios.post('../api/cuestionario/editarCuestionario.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Editar',
                            text: 'Datos actualizados',
                            icon: 'success',
                            timer: 3000
                        })
                        .then(() => {
                            location.href = 'index.php'
                        })
                    } else {
                        swal({
                            title: 'Editar',
                            text: 'El Cuestionario no se pudo editar',
                            icon: 'error',
                            buttons: true
                        })
                    }
                })
        },
        getId() {
            let uri = window.location.href.split('?');
            if (uri.length == 2) {
                let vars = uri[1].split('&');
                let getVars = {};
                let tmp = '';
                vars.forEach(function (v) {
                    tmp = v.split('=');
                    if (tmp.length == 2) {
                        getVars[tmp[0]] = tmp[1];
                    }
                });
                this.itemId = getVars
                console.log(this.itemId.id)
                axios.get('../api/cuestionario/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }
        }
    }
})