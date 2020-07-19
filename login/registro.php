<?php include '../includes/header.php' ?>
<center>
    <form id="inicioSesion" autocomplete="off" @submit.prevent="login">

        <div class="card text-center " style="width: 30rem;">
            <div class="card-body ">
                <h5 class="card-title" style="color: #2FACB2">Registro</h5>
                <input type="email" name="email" placeholder="Correo electronico" required
                    class=" form-control input-group mb-3">
                <input type="password" name="pass" placeholder="Password" required pattern="[A-Za-z0-9]{8,15}"
                    class="form-control input-group mb-3">

                    <label for="customRadioInline1">Hombre</label>
                    <input type="radio" name="Hombre" class="radio" >
                    
           
                    <label  for="customRadioInline2">Mujer</label>
                    <input type="radio" name="Mujer" class="radio">
                    
               
                <input type="submit" value="Entrar" class="btn btn-primary btn-lg btn-block"
                    style="background-color: #2FACB2">
            </div>

            <div class="card-link">
                <a href="index.php">Ya tengo cuenta</a>
            </div>
        </div>
    </form>
</center>
</main>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../../js/appLogin.js"></script>
</body>

</html>