const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listar: [],
        listarPreguntas: [],
        buscar: '',
        itemId: '',
        itemIdPregunta: '',
        formEditar: {},
        formCuestionario: {},
        userPost: ''
    },
    created() {
        this.getCuestionario()
        this.getPreguntas()
        this.getIdPreguntas()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Nombre_cuest.toUpperCase().match(this.buscar.toUpperCase()) || filtro.Cod_cuest.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        getCuestionario() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/cuestionario/getCuestionario.php')
                .then(res => {
                    this.listar = res.data
                })

        },
        getPreguntas() {
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
                axios.get('http://localhost/magic_crm2/api/preguntas/getPreguntas.php?id=' + this.itemId.id)
                    .then(res => {
                        this.listarPreguntas = res.data
                    })
            }
        },
        contestar(id) {
            axios.get('http://localhost/magic_crm2/api/contestarPreguntas/contestar.php?id=' + id )
                .then(res => {
                    if (res.data == 'success') {
                        swal({
                            title: 'Contestar',
                            text: 'Cuestionario contestado',
                            icon: 'success',
                            timer: 3000
                        }).then(() => {
                            location.href = 'index.php'
                        })
                    } else {
                        swal({
                            title: 'Error',
                            text: 'Cuestionari no Creado' + this.respuesta,
                            icon: 'error'
                        })
                    }
                })


        },
        getIdPreguntas() {
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
                axios.get('http://localhost/magic_crm2/api/preguntas/getPreguntas.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formCuestionario  = res.data
                        console.log(this.formCuestionario[1].Nombre_cuest );
                    })
            }
        }
    }
})