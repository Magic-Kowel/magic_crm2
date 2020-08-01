const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listarCuestionarios: [],
        listarPreguntas: [],
        listarOpciones: [],
        buscar: '',
        itemId: '',
        formEditar: {},
        idCuestionario:'',
        idPregunta:'',
        tipoPregunta:'',
        respuestaAbierta:''
    },
    created() {
        this.getCuestionario()
        this.getDatosUrl()
        this.getPregruntas()
        this.getOpciones()
    },
    computed: {
        datosFiltrados() {
            return this.listarCuestionarios.filter((filtro) => {
                return filtro.Nombre_cuest.toUpperCase().match(this.buscar.toUpperCase()) || filtro.Cod_cuest.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        contestarPreguntaAbierta(cuestionario,pregrunta,respuestaAbierta) {
            axios.get('http://localhost/magic_crm2/api/contestarPreguntas/addRespuesta.php?cuestionario='+cuestionario+'&pregrunta='+pregrunta+'&respuestaAbierta='+this.respuestaAbierta)
                    .then(res => {
                        if (res.data == 'success') {
                            swal({
                                title: 'Pregunta',
                                text: 'Contestada Con Exito',
                                icon: 'success',
                                timer: 3000
                            })
                        } else {
                            swal({
                                title: 'Pregunta',
                                text: res.data,
                                icon: 'error',
                                buttons: true
                            })
                        }
                    })

        },
        contestarPregunta(cuestionario,pregrunta,opcion) {
            axios.get('http://localhost/magic_crm2/api/contestarPreguntas/contestar.php?cuestionario='+cuestionario+'&pregrunta='+pregrunta+'&opcion='+opcion)
                    .then(res => {
                        if (res.data == 'success') {
                            swal({
                                title: 'Pregunta',
                                text: 'Contestada Con Exito',
                                icon: 'success',
                                timer: 3000
                            })
                        } else {
                            swal({
                                title: 'Pregunta',
                                text: res.data,
                                icon: 'error',
                                buttons: true
                            })
                        }
                    })

        },
        getCuestionario() {
            let uri = window.location.href.split('?');
            axios.get('http://localhost/magic_crm2/api/cuestionario/getCuestionario.php')
                .then(res => {
                    this.listarCuestionarios = res.data
                })
        },
        getPregruntas(){
                let uri = window.location.href.split('?');
                axios.get('http://localhost/magic_crm2/api/preguntas/getPreguntas.php?id='+idCuestionario)
                    .then(res => {
                        this.listarPreguntas = res.data
                    })
        },
        getOpciones(){
            let uri = window.location.href.split('?');
            axios.get('http://localhost/magic_crm2/api/opciones/getObciones.php?id='+idPregunta)
                .then(res => {
                    this.listarOpciones = res.data
                })
        },
        getDatosUrl() {
            function parametroURL(_par) {
                var _p = null;
                if (location.search) location.search.substr(1).split("&").forEach(function (pllv) {
                    var s = pllv.split("="), //separamos llave/valor
                        ll = s[0],
                        v = s[1] && decodeURIComponent(s[1]); //valor hacemos encode para prevenir url encode
                    if (ll == _par) { //solo nos interesa si es el nombre del parametro a buscar
                        if (_p == null) {
                            _p = v; //si es nula, quiere decir que no tiene valor, solo textual
                        } else if (Array.isArray(_p)) {
                            _p.push(v); //si ya es arreglo, agregamos este valor
                        } else {
                            _p = [_p, v]; //si no es arreglo, lo convertimos y agregamos este valor
                        }
                    }
                });
                return _p;
            }
            idCuestionario = parametroURL('idCuestionario');
            idPregunta = parametroURL('idPregunta');
            tipoPregunta=parametroURL('tipo');
            console.log('id de Cuestionario:'+idCuestionario)
            console.log('id de Pregunta:'+idPregunta)
            console.log('Tipo pregunta:'+tipoPregunta)
        }
    }
})