const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listar: [],
        buscar: ''
    },
    created() {
        this.getReporte()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Contrato_repo.toUpperCase().match(this.buscar.toUpperCase()) || filtro.Cod_repo.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        registro() {

            const form = document.getElementById('formRegistro')
            axios.post('../api/reporte/addReporte.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    //this.direccionamiento()
                    if (res.data == 'success') {
                        swal({
                            title: 'Guardado',
                            text: 'Reporte Generado',
                            icon: 'success'
                        })
                        this.getReporte()
                    } else {
                        swal({
                            title: 'Error',
                            text: this.respuesta,
                            icon: 'error'
                        })
                    }
                })
        },getReporte() {
            let uri = window.location.href.split('?');

            axios.get('../api/reporte/getReporte.php')
                .then(res => {
                    this.listar = res.data
                })

        }
    }
})