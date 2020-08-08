const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listarAtencion: [],
        listar: [],
        buscar: '',
        itemId: '',
        formEditar: {},
        userPost: ''
    },
    created() {
        this.getAtencion()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Contrato_repo.toUpperCase().match(this.buscar.toUpperCase()) 
            })
        }
    },
    methods: {
        getAtencion() {
            let uri = window.location.href.split('?');

            axios.get('http://localhost/magic_crm2/api/atencion/getAtencionClientes.php')
                .then(res => {
                    this.listar = res.data
                })

        },
        actualizarEstado (id,estado) {
            swal({
                    title: 'Actualizar ',
                    text: '¿Seguro que quieres cambiarlo?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('http://localhost/magic_crm2/api/atencion/actualizarEstado.php?id='+id+'&estado='+estado)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal('Estado Actualizado')
                                    this.getAtencion()
                                } else {
                                    swal(res.data )
                                }
                            })
                    } else {
                        return false
                    }
                })
        }


    }
})