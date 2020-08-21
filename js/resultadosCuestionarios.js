const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listar: [],
        buscar: '',
        idPregunta:''
    },
    created() {
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
        this.idPregunta = parametroURL('id')
        console.log('id de pregunta:'+ this.idPregunta)
        this.chart() 
        this.getRespuestasAbiertas(this.idPregunta)
    },
    computed: {
    },
    methods: {
        chart() {
            var id= this.idPregunta;
            $(document).ready(function () {
                $.ajax({
                    url: "../api/resultadosCuestionarios/getResultadosEncuestas.php?idPregunta="+ id,
                    method: "GET",
                    success: function (data) {
                        console.log(data);
                        var player = [];
                        var score = [];
                        var colores =  new Array();
                        var dynamicColors = function () {
                            var r = Math.floor(Math.random() * 255);
                            var g = Math.floor(Math.random() * 255);
                            var b = Math.floor(Math.random() * 255);
                            return "rgb(" + r + "," + g + "," + b + ")";
                        };
            
                        for (var i in data) {
                            player.push(data[i].Respuesta_rsp);
                            score.push(data[i].conteo);
                            var coloR = dynamicColors();
                            colores.push(coloR);
                        }
            
                        var chartdata = {
                            labels: player,
                            datasets: [{
                                label: 'Resultados',
                                backgroundColor: colores,
                                borderColor: 'rgba(200, 200, 200, 0.75)',
                                hoverBackgroundColor: 'rgba(120, 200, 200, 1)',
                                hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                data: score ,
                            }]
                        };
            
                        var ctx = $("#mycanvas");
            
                        var barGraph = new Chart(ctx, {
                            type: 'pie',
                            data: chartdata,
                            options: { // options es para añadir obciones
                                responsive: true,
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true //para que empiese  en 0  
                                        }
                                    }]
                                }
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            }
                        });
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        },
        getRespuestasAbiertas(id) {
            let uri = window.location.href.split('?');

            axios.get('../api/resultadosCuestionarios/getResultadosPreguntasAbiertas.php?id='+ id )
                .then(res => {
                    this.listar = res.data
                })
        }
    }
})