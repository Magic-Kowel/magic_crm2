const app = new Vue({
    el:'#header',
    data:{
        pass:'',
        passC:'',
        respuesta:'',
        correo:'',
        boton:'btn blue disabled',
        menu:false
    },
    methods:{
        direccionamiento(){
            if (this.respuesta == 'success') {
                location.href = 'index.php'
            } else {
                swal('No se pudo registrar')
            }
        },
        validarCorreo(){
            if (this.validEmail(this.correo)) {
                const formData = new FormData()
                formData.append('correo',this.correo)
                axios.post('../api/loginRegistro/validarEmail.php', formData)
                .then( res =>{
                    this.respuesta = res.data
                    if (res.data == "success") {
                        this.boton = 'btn blue'
                    } else {
                        swal('El correo electronico ya esta en uso')
                    }
                })
            } else {
                swal('Escribe el correo de forma correcta')
            }
        },
        validEmail: function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        login(){
            const form = document.getElementById('inicioSesion')
            axios.post('../api/loginRegistro/login.php', new FormData(form))
            .then( res =>{
            this.respuesta = res.data
            if (res.data == 'success') {
                location.href = '../principal'
            } else {
                swal('Usuario y/o contraseña incorrectos')
            }
                
            })
        }

    }
})
const main = new Vue({
    el:'#app',
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
            
    },
    cuestionarioHome2(){
        const form = document.getElementById('cuestionarioHome2') ||document.getElementById('cuestionarioHome2')
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