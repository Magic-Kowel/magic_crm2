const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listarDepartamentos: [],
        listar: [],
        buscar: '',
        itemId: '',
        formEditar: {},
        userPost: ''
    },
    created() {
        this.getDepartamentos()
        this.getPuestos()
        this.getId()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Nombre_pues.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        registro() {
            const form = document.getElementById('formRegistro')
            axios.post('../api/puestos/addPuesto.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Registro',
                            text: 'Registro echo',
                            icon: 'success',
                            timer: 3000
                        })
                        this.getDepartamentos();
                        this.getPuestos();
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
        getDepartamentos() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/puestos/getDepartamento.php')
                .then(res => {
                    this.listarDepartamentos = res.data
                })

        },
        getPuestos() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/puestos/getPuestos.php')
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
                        axios.get('http://localhost/magic_crm2/api/puestos/eliminarPuestos.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal({
                                        title: 'Eliminar',
                                        text: 'Departamento eliminado',
                                        icon: 'success',
                                        timer: 3000
                                    })
                                    this.getPuestos()
                                } else {
                                    swal({
                                        title: 'Eliminar',
                                        text: 'Departamento no eliminado'+res.data,
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
                axios.get('http://localhost/magic_crm2/api/puestos/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }
        },editar() {
            const form = document.getElementById('editarPuesto')
            axios.post('../api/puestos/editarPuesto.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Editar',
                            text: 'Puesto actualizados',
                            icon: 'success',
                            timer: 3000
                        })
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