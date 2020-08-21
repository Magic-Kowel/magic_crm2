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

        this.getId()
        this.getHiloConversasion()

    },
    computed: {},
    methods: {
        registro() {
            const form = document.getElementById('formRegistro')
            axios.post('../api/mensajes/addMensaje.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                                title: 'Editar',
                                text: 'Mensaje Agregado',
                                icon: 'success',
                            })
                            .then(() => {
                                this.getHiloConversasion()
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
                axios.get('../api/mensajes/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }

        },
        getHiloConversasion() {
            let uri = window.location.href.split('?');
                axios.get('../api/mensajes/getHiloConversasion.php?id='+this.itemId.id)
                    .then(res => {
                        this.listar = res.data
                    })

            }
        }
    
})