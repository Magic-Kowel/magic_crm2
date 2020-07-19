const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listarPermisos: [],
        listar: [],
        buscar: '',
        itemId: '',
        formEditar: {},
        userPost: ''
    },
    created() {
        this.getPermisos()
        this.getUsuarios()
        this.getId()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Nickname_usr.toUpperCase().match(this.buscar.toUpperCase() ) ||  filtro.Nombre_perm.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        registro() {
            const form = document.getElementById('formRegistro')
            axios.post('../api/usuarios/addUsuarios.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Guardado',
                            text: 'Usuario añadido',
                            icon: 'success'
                        })
                        this.getPermisos()
                        this.getUsuarios()
                    } else {
                        swal({
                            title: 'Error',
                            text: this.respuesta,
                            icon: 'error'
                        })
                    }
                    
                })
        },
        getPermisos() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/usuarios/getPermisos.php')
                .then(res => {
                    this.listarPermisos = res.data
                })

        },
        getUsuarios() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/usuarios/getUsuarios.php')
                .then(res => {
                    this.listar = res.data
                })

        },
        eliminar(id) {
            swal({
                    title: 'Seguro que deseas eliminar el puesto',
                    text: 'Al eliminarlo no podras recuperarlo',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('http://localhost/magic_crm2/api/usuarios/eliminarUsuarios.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal('Usuario eliminado')
                                    this.getUsuarios()
                                } else {
                                    swal('Usuario no eliminado')
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
                axios.get('http://localhost/magic_crm2/api/usuarios/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }
        },editar() {
            const form = document.getElementById('editarUsuarios')
            axios.post('../api/usuarios/editarUsuario.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Editar',
                            text: 'Puesto actualizados',
                            icon: 'success',
                            timer: 3000
                        })
                        this.getPuestos()
                        .then(() => {
                            location.href = 'index.php'
                        })
                    } else {
                        swal({
                            title: 'Editar',
                            text: 'El puesto no se pudo editar',
                            icon: 'error',
                            buttons: true
                        })
                    }
                })
        }


    }
})