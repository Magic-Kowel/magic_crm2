
            const menu = new Vue({
                el: '#cssmenu',
                data: {
                    listar: {},
                    nivel:''
                },
                created() {
                    this.validarSesion()
                },
                computed: {
                },
                methods: {
                    validarSesion() {
                        axios.get('http://localhost/magic_crm2/api/loginRegistro/validarSesion.php')
                            .then(res => {
                                this.listar = res.data
                                this.nivel=this.listar.Cod_fk_perm
                                console.log('Nivel de Usuario:'+ this.listar.Cod_fk_perm);
                            })
            
                    }
                }
            })