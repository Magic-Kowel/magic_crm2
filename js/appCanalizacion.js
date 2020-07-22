const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listarDepartamentos: [],
        listarUsuarios: [],
        listar: [],
        buscar: '',
        itemId: '',
        formEditar: {},
        userPost: ''
    },
    created() {
        this.getDepartamentos()
        this.getCanalizacion()
        this.getUsuarios()
        this.getId()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Nickname_usr.toUpperCase().match(this.buscar.toUpperCase()) || filtro.Nombre_dep .toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        registro() {
            const form = document.getElementById('formRegistro')
            axios.post('../api/canalizacion/addCanalizacion.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Guardado',
                            text: 'Canalizacion Generado',
                            icon: 'success'
                        })
                        this.getDepartamentos();
                        this.getCanalizacion();
                        this.getUsuarios()
                    } else {
                        swal({
                            title: 'Error',
                            text: 'No se pudo guardar',
                            icon: 'error'
                        })
                    }

                })
        },
        getDepartamentos() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/puestos/getDepartamento.php')
                .then(res => {
                    this.listarDepartamentos = res.data
                })

        },
        getUsuarios() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/canalizacion/getUsuarios.php')
                .then(res => {
                    this.listarUsuarios = res.data
                })

        },
        getCanalizacion() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/canalizacion/getCanalizacion.php')
                .then(res => {
                    this.listar = res.data
                })

        },
        eliminar(id) {
            swal({
                    title: 'eliminar ',
                    text: 'Seguro Que Quieres eliminar La Canalizacion',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('http://localhost/magic_crm2/api/canalizacion/eliminarCanalizacion.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal('Canalizacion eliminado')
                                    this.getCanalizacion()
                                    this.getUsuarios()
                                } else {
                                    swal('Canalizacion no eliminado')
                                }
                            })
                    } else {
                        return false
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
                axios.get('http://localhost/magic_crm2/api/canalizacion/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }
        },editar() {
            const form = document.getElementById('editarCanalizacion')
            axios.post('../api/canalizacion/editarCanalizacion.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Editar',
                            text: 'Canalizacion actualizada',
                            icon: 'success',
                            timer: 3000
                        })
                        .then(() => {
                            location.href = 'index.php'
                        })
                    } else {
                        swal({
                            title: 'Editar',
                            text: 'Canalizacion no se pudo editar',
                            icon: 'error',
                            buttons: true
                        })
                    }
                })
        }


    }
})