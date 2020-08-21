const cuestionario = new Vue({
    el:'#cuestionarioHome',
    data:{
        respuesta:''
    },
    methods:{
        cuestionarioHome(){
            
                const form = document.getElementById('cuestionarioHome')
                axios.post('../api/contestarPreguntas/cuestionarioHome.php', new FormData(form))
                .then( res =>{
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Guardado',
                            text: 'Cuestionario',
                            icon: 'success'
                        })
                    } else {
                        swal({
                            title: 'Error',
                            text: this.respuesta,
                            icon: 'error'
                        })
                    }
                })
                
        }

    }
})