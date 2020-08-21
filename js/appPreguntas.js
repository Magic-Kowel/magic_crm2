const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listar: [],
        buscar: '',
        itemId: '',
        itemIdPregunta:'',
        formCuestionario: {},
        formEditar:{},
        identificadorPregunta:{},
        estado:1
    },
    created() {
        this.getId()
        this.getPreguntas(this.itemId.id)
        this.getIdPreguntas()
    },
    computed: {
        datosFiltrados() {
            this.getPreguntas(this.itemId.id)
            return this.listar.filter((filtro) => {
                return filtro.Pregunta_preg.toUpperCase().match(this.buscar.toUpperCase()) 
            })
        }
    },
    methods: {
        cambiarEstado(){
            if(this.estado==1){
                this.estado=0;
                swal({
                    title: 'Pregunta cerrada',
                    text:'No Podras Añadir Opciones',
                    icon: 'info'
                })
            }else{
                this.estado=1;
                swal({
                    title: 'Pregunta abierta',
                    text:'Podras Añadir Opciones',
                    icon: 'info'
                })
            }
        },
        registro(id) {
            const form = document.getElementById('formRegistro')
            axios.post('../api/preguntas/addPreguntas.php', new FormData(form))
                .then(res => {
                    if (res.data == 'success') {
                        swal({
                            title: 'Guardado',
                            text: 'Pregunta Creada',
                            icon: 'success'
                        })
                        this.getPreguntas(this.itemId.id)
                    } else {
                        swal({
                            title: 'Error',
                            text:'Pregunta no Creada'+res.data,
                            icon: 'error'
                        })
                    }
                    this.getPreguntas(this.itemId.id)
                })
        },
        getPreguntas(id) {
            let uri = window.location.href.split('?');

            axios.get('../api/preguntas/getPreguntas.php?id='+id)
                .then(res => {
                    this.listar = res.data
                })

        },
        eliminar(id) {
            swal({
                    title: 'Eliminar',
                    text: 'Seguro que deseas eliminar la pregunta',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('../api/preguntas/eliminarPreguntas.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal({
                                        title: 'Eliminar',
                                        text: 'Pregunta Eliminada',
                                        icon: 'success'
                                    })
                                    this.getPreguntas(this.itemId.id)
                                } else {
                                    swal({
                                        title: 'Error',
                                        text: 'Pregunta no Eliminada'+ this.respuesta,
                                        icon: 'error'
                                    })
                                }
                            })
                            this.getPreguntas(this.itemId.id)
                    } else {
                        return false
                    }
                })
        },
        editar() {
            const form = document.getElementById('editarPreguntas')
            axios.post('../api/preguntas/editarPreguntas.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Editar',
                            text: 'Pregunta actualizada',
                            icon: 'success',
                            timer: 3000
                        })
                        .then(() => {
                            location.href = 'http://localhost/magic_crm2/cuestionarios/'
                        })
                    } else {
                        swal({
                            title: 'Editar',
                            text: 'Pregunta no actualizada',
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
                axios.get('../api/preguntas/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }
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
                axios.get('../api/preguntas/getPreguntas.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formCuestionario  = res.data
                    })
                axios.get('../api/preguntas/getIdentificadorPregunta.php?id=' + this.itemId.id)
                    .then(res => {
                        this.identificadorPregunta  = res.data
                        
                    })
            }
        }
    }
})