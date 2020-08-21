const menu = new Vue({
    el: '#cssmenu',
    data: {
        listar: {},
        nivel:''
    },
    created() {
        this.validarNivelUsuario()
    },
    computed: {

    },
    methods: {
		validarNivelUsuario() {
            axios.get('../api/loginRegistro/validarNivelUsuario.php')
                .then(res => {
					this.listar = res.data
					this.nivel=this.listar.Cod_fk_perm
                })

        }
    }
})