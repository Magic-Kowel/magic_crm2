const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listar: [],
        buscar: '',
        itemId: '',
        formEditar:{},
        userPost: '',
        titulo:{},
        idPregunta:''
    },
    created() {
        this.getDatosUrl()
        this.getOpciones(idPregunta)
        this.getId()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Respuesta_rsp.toUpperCase().match(this.buscar.toUpperCase()) 
            })
        }
    },
    methods: {
        getOpciones(id) {
            let uri = window.location.href.split('?');
            axios.get('../api/opciones/getObciones.php?id='+ id)
                .then(res => {
                    this.listar = res.data
                })
            axios.get('../api/opciones/getTituloPregunta.php?id='+ id)
            .then(res => {
                this.titulo = res.data
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
            idPregunta = parametroURL('idPregunta')
            console.log('id de pregunta:'+idPregunta)
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
                axios.get('../api/opciones/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }
        },
        registro() {
            const form = document.getElementById('formRegistro')
            axios.post('../api/opciones/addOpciones.php?id='+idPregunta, new FormData(form))
                .then(res => {
                    if (res.data == 'success') {
                        swal({
                            title: 'Guardado',
                            text: 'Opcion Creada',
                            icon: 'success'
                        })
                    } else {
                        swal({
                            title: 'Error',
                            text:'Opcion no Creada'+res.data,
                            icon: 'error'
                        })
                    }
                })
                this.getOpciones(this.idPregunta)
        },
        eliminar(id) {
            swal({
                    title: 'Eliminar',
                    text: 'Seguro que deseas eliminar la Opcion',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('../api/opciones/eliminarOpcion.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal({
                                        title: 'Eliminar',
                                        text: 'Opcion Eliminada',
                                        icon: 'success'
                                    })
                                    this.getOpciones(idPregunta)
                                } else {
                                    swal({
                                        title: 'Error',
                                        text: 'Opcion no Eliminada'+ this.respuesta,
                                        icon: 'error'
                                    })
                                }
                            })
                    } else {
                        return false
                    }
                })
        },
        editar(){
            const form = document.getElementById('idOpcion')
            axios.post('../api/opciones/editarOpcion.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Editar',
                            text: 'Opcion actualizada',
                            icon: 'success',
                            timer: 3000
                        })
                        .then(() => {
                            location.href = 'index.php?idPregunta='+ 2
                        })
                    } else {
                        swal({
                            title: 'Editar',
                            text: 'Opcion no actualizada'+ res.data,
                            icon: 'error',
                            buttons: true
                        })
                    }
                })
        }

    }
})