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
        itemIdCanalizacion:'',
        formEditar: {},
        userPost: ''
    },
    created() {
        this.getDepartamentos()
        this.getCanalizacion()
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
        getCanalizacion() {

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
                    this.itemIdCanalizacion = getVars
                    console.log(this.itemIdCanalizacion.canalizacion)
                    axios.get('http://localhost/magic_crm2/api/canalizacion/getCanalizacion.php?id=' + this.itemIdCanalizacion.canalizacion)
                        .then(res => {
                            this.listar = res.data
                        })
                    }
        }
    }
})