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
        itemIdCanalizacion: '',
        formEditar: {},
        userPost: '',
        idAtencion: ''
    },
    created() {
        this.getDepartamentos()
        this.getCanalizacion()
        this.getDatosUrl()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.Nickname_usr.toUpperCase().match(this.buscar.toUpperCase()) || filtro.Nombre_dep.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        registro() {
            const form = document.getElementById('formRegistro')
            axios.post('../api/canalizacion/addCanalizacion.php?idAtencion=' + idAtencion, new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Guardado',
                            text: 'Canalizacion Generada',
                            icon: 'success'
                        })
                        this.getDepartamentos();
                        this.getCanalizacion();
                    } else {
                        swal({
                            title: 'Error',
                            text: 'No se pudo guardar' + res.data,
                            icon: 'error'
                        })
                    }
                    this.getDepartamentos();
                    this.getCanalizacion();

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
            idAtencion = parametroURL('idAtencion')
        }
    }
})