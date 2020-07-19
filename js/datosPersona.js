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
        this.getDatosPersoa()
        this.getId()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Nombre_prsn.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        registro() {
            const form = document.getElementById('formRegistro')
            axios.post('../api/datosPersona/addPersona.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    swal("Registro echo");
                    this.getDatosPersoa();
                })
        },
        getDatosPersoa() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/datosPersona/getDatosPersoa.php')
                .then(res => {
                    this.listar= res.data
                })

        },
        eliminar(id) {
            swal({
                    title: 'Eliminar Persona',
                    text: 'Seguro que deseas eliminar  la persona',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('http://localhost/magic_crm2/api/datosPersona/eliminarPersona.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal('Persona eliminado')
                                    this.getDatosPersoa()
                                } else {
                                    swal('Persona no eliminado')
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
                axios.get('http://localhost/magic_crm2/api/datosPersona/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }

        },
        editar() {
            const form = document.getElementById('editarPersona')
            axios.post('../api/datosPersona/editarPersona.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Editar',
                            text: 'Persona Actualizada',
                            icon: 'success',
                            timer: 3000
                        })
                        this.getDatosPersoa()
                        .then(() => {
                            location.href = 'index.php'
                        })
                    } else {
                        swal({
                            title: 'Editar',
                            text: 'La Persona no se pudo editar',
                            icon: 'error',
                            buttons: true
                        })
                    }
                })
        }
    }
})