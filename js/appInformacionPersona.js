const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listar: [],
        listarPersona: [],
        listarPuestos: [],
        listarUsuarios: [],
        buscar: '',
        itemId: '',
        formEditar: {},
        userPost: '',
        idPuesto: ''

    },
    created() {
        this.getInformacionPersona()
        this.getPuestos()
        this.getDatosPersona()
        this.getUsuarios()
        this.getId()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Nombre_prsn.toUpperCase().match(this.buscar.toUpperCase()) || filtro.Nickname_usr.toUpperCase().match(this.buscar.toUpperCase())
            })
        },

    },
    methods: {
        registro() {
            const form = document.getElementById('formRegistro')
            axios.post('../api/informacionPersona/addPersonal.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Guardado',
                            text: 'Usuario añadido',
                            icon: 'success'
                        })
                        this.getInformacionPersona()
                    } else {
                        swal({
                            title: 'Error',
                            text: this.respuesta,
                            icon: 'error'
                        })
                    }
                })
        },
        getInformacionPersona() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/informacionPersona/getInformacionPersona.php')
                .then(res => {
                    this.listar = res.data
                })

        },
        getPuestos(id) {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/informacionPersona/getPuestos.php?id=' + id)
                .then(res => {
                    this.listarPuestos = res.data
                })

        },
        getDatosPersona() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/datosPersona/getDatosPersoa.php')
                .then(res => {
                    this.listarPersona = res.data
                })

        },
        getUsuarios() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/informacionPersona/getUsuarios.php')
                .then(res => {
                    this.listarUsuarios = res.data
                })

        },
        eliminar(id) {
            swal({
                    title: 'Eliminar Personal',
                    text: 'Seguro que deseas eliminar  el Personal',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('http://localhost/magic_crm2/api/informacionPersona/eliminarInformacionPersona.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal('Personal eliminado')
                                    this.getInformacionPersona()
                                } else {
                                    swal('personal no eliminado')
                                }
                            })
                    } else {
                        return false
                    }
                })
        },
        editar() {
            const form = document.getElementById('editarPersonal')
            axios.post('../api/informacionPersona/editarInformacionPersona.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                                title: 'Editar',
                                text: this.respuesta,
                                icon: 'success',
                                timer: 3000
                            })
                            .then(() => {
                                location.href = 'index.php'
                            })
                    } else {
                        swal({
                            title: 'Editar',
                            text: this.respuesta,
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
                axios.get('http://localhost/magic_crm2/api/informacionPersona/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }
        }


    }
})