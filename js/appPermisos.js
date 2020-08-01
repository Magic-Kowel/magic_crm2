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
        this.getPermisos()
        this.getId()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Nombre_perm.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        registro() {

            const form = document.getElementById('formRegistro')
            axios.post('../api/permisos/addPermisos.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    //this.direccionamiento()
                    if (res.data == 'success') {
                        swal({
                            title: 'Registro',
                            text: 'Registro echo',
                            icon: 'success',
                            timer: 3000
                        })
                        this.getPermisos();
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
        getPermisos() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/permisos/getPermisos.php')
                .then(res => {
                    this.listar = res.data
                })

        },
        eliminar(id) {
            swal({
                    title: 'Eliminar',
                    text: 'Seguro que deseas eliminar el Permiso',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('http://localhost/magic_crm2/api/permisos/eliminarPermisos.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal({
                                        title: 'Eliminar',
                                        text: 'Permiso eliminado',
                                        icon: 'success',
                                        timer: 3000
                                    })
                                    this.getPermisos()
                                } else {
                                    swal({
                                        title: 'Eliminar',
                                        text:'Permiso no eliminado',
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
            const form = document.getElementById('editarPermiso')
            axios.post('../api/permisos/editarPermisos.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Editar',
                            text: 'Permiso actualizado',
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
                axios.get('http://localhost/magic_crm2/api/permisos/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }
        }
    }
})