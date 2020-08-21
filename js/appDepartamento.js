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
        this.getCategoria()
        this.getId()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Nombre_dep.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        registro() {

            const form = document.getElementById('formRegistro')
            axios.post('../api/departamento/addDepartamento.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    //this.direccionamiento()
                    if (res.data == 'success') {
                        swal({
                            title: 'Registro',
                            text: 'Registro hecho',
                            icon: 'success',
                            timer: 3000
                        })
                        this.getCategoria();
                    } else {
                        swal({
                            title: 'Registro',
                            text: res.data,
                            icon: 'error',
                            buttons: true
                        })
                    }

                    
                })
        },
        direccionamiento() {
            if (this.respuesta == 'success') {
                location.href = 'index.php'
            } else {
                swal('No se pudo registrar')
            }
        },
        getCategoria() {
            let uri = window.location.href.split('?');

            axios.get('../api/departamento/getDepartamentos.php')
                .then(res => {
                    this.listar = res.data
                })

        },
        eliminar(id) {
            swal({
                    title: 'Seguro que deseas eliminar el Departamento',
                    text: 'Al eliminarlo no podras recuperarlo',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('../api/departamento/eliminarDepartamento.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal({
                                        title: 'Eliminar',
                                        text: 'Departamento eliminado',
                                        icon: 'success',
                                        timer: 3000
                                    })
                                    this.getCategoria()
                                } else {
                                    swal({
                                        title: 'Eliminar',
                                        text:'Departamento no eliminado'+ res.data,
                                        icon: 'error',
                                        buttons: true
                                    })
                                }
                            })
                    } else {
                        return false
                    }
                })
        },
        editar() {
            const form = document.getElementById('editarDepartamento')
            axios.post('../api/departamento/editarDepartamento.php', new FormData(form))
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
                            text: 'El departamento no se pudo editar',
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
                axios.get('../api/departamento/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }
        }
    }
})