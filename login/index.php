<?php @session_start();
if (isset($_SESSION['user'])) {
    header("location:../principal");
}?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"
    integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/home.css">
  <title>ALAM</title>
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="74">
  <!--Header-->
  <nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand text-alam" href="#">Agencia Aduanal ALAM
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#main">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#servicios">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#nosotros">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#puerto">Puerto de Manzanillo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-alam" href="#footer">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="http://localhost/magic_crm2/clientesHome/">Cliente</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <form id="inicioSesion" autocomplete="off" @submit.prevent="login">
          <div class="form-row pb-1">
            <div class="col-4">
              <span class="badge badge-light">Ingresar al sistema. </span>
            </div>
            <div class="col-4">
              <!--<span class="badge badge-warning">¡Estamos en producción!</span>-->
            </div>
          </div>
          <div class="form-row pb-0">
            <div class="form-group col-12 col-md">
              <input type="text" name="email" class="form-control" placeholder="Correo">
            </div>
            <div class="form-group col-12 col-md">
              <input type="password" name="pass" class="form-control" placeholder="******" required
                pattern="[A-Za-z0-9]{8,15}">
            </div>
            <div class="form-group col-12 col-md">
              <button type="submit" class="btn bg-alam bg-alam1 btn-block">Ingresar</button>
            </div>
          </div>
        </form>
      </ul>
    </div>
  </nav>
  <!--/Header-->
  <!--Main-->
  <main id="app">
  <section id="main" class="pt-2">
    <div class="jumbotron bg-light text-center">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-2">
            <img id="im1" src="../img/logo1.png" alt="Logo">
          </div>
          <div class="col-12 col-md-8 pt-5 offset-md-1 d-none d-md-block">
            <center>
              <h1 class="display-4">Agencia Logística Aduanera de Manzanillo</h1>
              <h4 class="text-alam">"Servicios con excelencia"</h4> <br> <br>
              <button class="btn bg-alam bg-alam1" data-toggle="modal" data-target="#formu">¡Quiero saber más!</button>
            </center>
          </div>
        </div>
      </div>
    </div>
    
      <div class="container-fluid">
        <div class="row pb-3">
          <div class="rounded border-2 shadow bg-white col-10 offset-1 d-md-none d-block">
            <form id="cuestionarioHome" autocomplete="off" @submit.prevent="cuestionarioHome" class="pb-3">
              <div class="form-group">
                <h5 class="text-center">Llena el formulario para recibir más información.</h5>
              </div>
              <hr>
              <div class="form-group">
                <label for="Empresa">Empresa:</label>
                <input name="empresa" type="text" class="form-control" id="Empresa">
              </div>
              <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input name="nombre" type="text" class="form-control" id="Nombre">
              </div>
              <div class="form-group">
                <label for="Ciudad">Ciudad o país:</label>
                <input name="ciudad" type="text" class="form-control" id="Ciudad">
              </div>
              <div class="form-group">
                <label for="Correo">Correo:</label>
                <input name="correo" type="email" class="form-control" id="Correo" aria-describedby="emailHelp"> </div>
              <div class="form-group">
                <label for="Telefono">Telefono:</label>
                <input name="telefono" type="tel" class="form-control" id="Telefono">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </form>
          </div>
        </div>
      
        <div class="row m2">
          <div id="m1" class="col-12 col-lg-6">
            <center>
              <h5 class="pt-5 text-justify">El AGENTE ADUANAL es una persona física a quien la Secretaría de Hacienda
                y Crédito Público autoriza mediante una patente, para promover por cuenta
                ajena el despacho de las mercancías, en los diferentes regímenes aduaneros
                previstos en la Ley Aduanera de quien contrate sus servicios.</h5>
            </center>
          </div>
          <div id="m1" class="col-12 col-lg-6 embed-responsive">
            <iframe src="https://www.youtube.com/embed/mwyAws59BDE" allowfullscreen></iframe>
          </div>
        </div>
      </div>
  </section>
  <!--/Main-->
  <!--Servicios-->
  <section id="servicios">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-6 embed-responsive d-none d-lg-block">
          <img src="../img/manza1.jpg" alt="MZO">
        </div>
        <div class="col-12 col-lg-6 pt-2 pb-4">
          <h2 class="text-center pt-5">Nuestros servicios</h2>
          <ul class="mt-3 text-justify">
            <li>Despacho Aduana Manzanillo, Colima - Aeropuerto de la cd. de México.</li>
            <li>Asesoría aduanal y logística.</li>
            <li>Consolidación de carga.</li>
            <li>Asesoría legal en comercio exterior.</li>
            <li>Etiquetado de mercancías.</li>
            <li>Rastreo de embarques.</li>
            <li>Fletes internacionales y nacionales.</li>
            <li>Aseguramiento de carga.</li>
            <li>Consulta en línea de cuentas de gastos y documentos de cada una de sus operaciones.</li>
          </ul>
        </div>
        <div class="col-12 col-lg-6 embed-responsive d-lg-none d-block">
          <img src="../img/manza1.jpg" alt="MZO">
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-6 pt-2 pb-4">
          <h2 class="text-center pt-5">Servicios integrales</h2>
          <ul class="mt-3 text-justify">
            <li>Tu mercancía en las mejores manos.</li>
            <li>Siempre a tiempo.</li>
            <li>Carga suelta y contenedores.</li>
            <li>Confiables.</li>
            <li>Asesoria logística.</li>
            <li>Almacenaje y distribución atravez de alianzas estratégica.</li>
            <li>Servicios para la recepción y correcta manipulación de sus mercancías.</li>
            <li>Despacho aduanero Manzanillo - Aeropuerto Ciudad de México.</li>
            <li>Asesoría Legal (Maritimo, Portuario, Aduanera, Mercantil, Fisical y Administrativo).</li>
          </ul>
        </div>
        <div class="col-12 col-lg-6 embed-responsive d-none d-lg-block">
          <img src="../img/manza1.jpg" alt="MZO">
        </div>
      </div>
    </div>
  </section>
  <!--/Servicios-->
  <!--Nosotros-->
  <section id="nosotros" class="pt-3">
    <div class="container">
      <div class="row pb-3">
        <div class="col text-center">
          <h2>Nosotros</h2>
        </div>
      </div>
      <div class="row pb-3">
        <div class="col ">
          <div class="card shadow bg-white">
            <div class="card-body">
              <h5 class="card-title text-center pb-3">Conoce nuestra historia:</h5>
              <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat sit
                possimus voluptate ipsa, facere, in, error molestias quidem repudiandae repellendus assumenda quas autem
                cumque dicta beatae ut laboriosam! Quas, ut?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam accusamus corporis placeat, adipisci
                eveniet explicabo tempora facilis quos molestiae culpa fuga possimus cumque quod debitis officia, ut ea
                eligendi eum!
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus, vel esse! Ab omnis, eos autem
                maiores harum deleniti consequuntur recusandae praesentium cumque delectus ipsa quidem quasi facilis
                saepe aspernatur inventore.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem tempora numquam quam voluptas dolore
                accusantium vero molestias officiis nostrum similique eligendi necessitatibus repudiandae earum
                veritatis vitae libero distinctio, neque delectus.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid repudiandae esse aliquam quod, quis
                expedita nesciunt repellat, libero iure ab deleniti, aspernatur maxime cupiditate dolorum? Nisi quidem
                optio fuga quis?
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md pb-3">
          <div class="card shadow bg-white">
            <div class="card-body">
              <h5 class="card-title">Misión</h5>
              <p class="card-text text-justify">Agencia Logística Aduanera de Manzanillo, S.C. es una empresa
                de servicio, enfocada en efectuar de manera profesional y con ética,
                la representación otorgada por nuestros clientes, en el despacho aduanero y la
                logística requerida.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md pb-3">
          <div class="card shadow bg-white">
            <div class="card-body">
              <h5 class="card-title">Visión</h5>
              <p class="card-text text-justify">Agencia Logística Aduanera de Manzanillo, S.C. es una empresa
                de servicio competitiva y productiva que contribuye al desarrollo profesional
                de nuestros clientes y colaboradores.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md pb-3">
          <div class="card shadow bg-white">
            <div class="card-body">
              <h5 class="card-title">Politíca general de calidad</h5>
              <p class="card-text text-justify">Lograr la satisfacción permanente de las necesidades y
                expectativas de los clientes, en concordancia con los lineamientos legales;
                contando con colaboradores calificados y comprometidos, fomentando el trabajo
                en equipo en un ambiente laboral apropiado.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row pt-4 pb-4">
        <div class="col text-center">
          <h4>Los valores que nos caracterizan son:</h4>
        </div>
      </div>
      <div class="row pt-4">
        <div class="col-7 col-md-5 offset-2 offset-md-0 offset-lg-1 col-lg-2 rounded border-2 shadow bg-white">
          <center><i class="fas fa-praying-hands fa-9x pt-3 pb-3 text-alam"></i></center>
        </div>
        <div class="col-7 offset-2 offset-lg-1 d-md-none d-sm-block">
          <hr>
          <h5 class="text-center">Honradez</h5>
        </div>
        <div class="col-7 col-md-5 offset-2 col-lg-2 offset-lg-1 rounded border-2 shadow bg-white">
          <center><i class="fas fa-hand-holding-heart fa-9x pt-3 pb-3 text-alam"></i></center>
        </div>
        <div class="col-md-5 offset-2 offset-md-0 d-md-block d-sm-none d-lg-none d-none">
          <hr>
          <h5 class="text-center">Honradez</h5>
        </div>
        <div class="col-7 col-md-5 offset-2 d-md-block d-sm-block d-lg-none">
          <hr>
          <h5 class="text-center">Confianza</h5>
        </div>
        <div
          class="col-7 col-md-5 offset-2 offset-md-0 col-lg-2 offset-lg-1 pb-3 pt-3 rounded border-2 shadow bg-white">
          <center><i class="fas fa-user-shield fa-9x pt-3 pb-3 text-alam"></i></center>
        </div>
        <div class="col-7 offset-2 offset-md-1 d-md-none d-sm-block">
          <hr>
          <h5 class="text-center">Responsabilidad</h5>
        </div>
        <div class="col-7 col-md-5 offset-2 col-lg-2 offset-lg-1 pb-3 pt-3 rounded border-2 shadow bg-white">
          <center><i class="fas fa-people-carry fa-9x pt-3 pb-3 text-alam"></i></center>
        </div>
        <div class="col-md-5 offset-2 offset-md-0 d-md-block d-lg-none d-sm-none d-none">
          <hr>
          <h5 class="text-center">Responsabilidad</h5>
        </div>
        <div class="col-7 col-md-5 offset-2 d-md-block d-sm-block d-lg-none">
          <hr>
          <h5 class="text-center">Trabajo en equipo</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 offset-lg-1 d-none d-lg-block d-sm-none">
          <hr>
          <h5 class="text-center">Honradez</h5>
        </div>
        <div class="col-lg-2 offset-lg-1 d-none d-lg-block d-sm-none">
          <hr>
          <h5 class="text-center">Confianza</h5>
        </div>
        <div class="col-lg-2 offset-lg-1 d-none d-lg-block d-sm-none">
          <hr>
          <h5 class="text-center">Responsabilidad</h5>
        </div>
        <div class="col-lg-2 offset-lg-1 d-none d-lg-block d-sm-none">
          <hr>
          <h5 class="text-center">Trabajo en equipo</h5>
        </div>
      </div>
    </div>
  </section>
  <!--/Nosotros-->
  <!--Puerto-->
  <section id="puerto" class="pt-3">
    <div class="container-fluid">
      <div id="p1" class="row">
        <div class="col-12 col-lg-6 embed-responsive">
          <iframe src="https://www.youtube.com/embed/Rfaw8Yd88nw" allowfullscreen></iframe>
        </div>
        <div class="col-12 col-lg-6">
          <h2 class="mt-5">Puerto de Manzanillo</h2>
          <p class="text-justify">Manzanillo es la ciudad y municipio más extenso y poblado del estado de Colima, limita
            al
            norte con Minatitlan al este con Coquimatlán y Armería; al sur, está el océano Pacífico; y al
            oeste y noroeste limita con el estado de Jalisco. La ciudad se compone de 9 localidades, El
            Naranjo, Miramar, Las Brisas, El Colomo, Tapeixtles, Salagua, Valle de las Garzas, Santiago y
            Manzanillo (Ahora conocido como Centro Histórico de Manzanillo). Gracias al desarrollo
            comercial de México, Manzanillo que se proyecta como un puerto comercial y destino turístico
            está experimentando un rápido crecimiento en infraestructura y atracciones.<br><br>
            Como puerto comercial, ha incrementado su actividad portuaria gracias a que se hicieron
            importantes inversiones en su infraestructura y logística, lo que le ha permitido mantenerse
            como el puerto número uno de México durante 9 años consecutivos.<br> <br>
            <a class="btn btn btn-outline-light" href="https://es.wikipedia.org/wiki/Manzanillo">¡Conoce más!</a>
        </div>
      </div>
    </div>
    <div class="row pt-4 pb-4">
      <div class="col text-center">
        <h4>Estadistica de interes:</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-6 embed-responsive">
        <center>
          <a
            href="https://estacionpacifico.com/2019/04/05/manzanillo-arriba-al-lugar-3-de-los-puertos-mas-importantes-de-america-latina/">
            <img src="../img/Estadistica.jpg" class="d-block" alt="E1"></center>
        </a>
      </div>
      <div class="col-12 col-lg-6 embed-responsive pt-1">
        <center>
          <a
            href="https://estacionpacifico.com/2019/01/10/el-puerto-de-manzanillo-rebasa-la-marca-de-3-millones-de-contenedores/">
            <img src="../img/Estadistica1.jpg" class="d-block" alt="E2"></center>
        </a>
      </div>
    </div>
    </div>
  </section>
  <!--/puerto-->
  <!--Modal-->
  <div class="modal" tabindex="-1" id="formu">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center">Llena el formulario para recibir más información.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  id="cuestionarioHome2" autocomplete="off" @submit.prevent="cuestionarioHome2"  class="pb-3">
          <div class="form-group">
              <div class="form-group">
                <label for="Empresa">Empresa:</label>
                <input name="empresa" type="text" class="form-control" id="Empresa">
              </div>
              <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input name="nombre" type="text" class="form-control" id="Nombre">
              </div>
              <div class="form-group">
                <label for="Ciudad">Ciudad o país:</label>
                <input name="ciudad" type="text" class="form-control" id="Ciudad">
              </div>
              <div class="form-group">
                <label for="Correo">Correo:</label>
                <input name="correo" type="email" class="form-control" id="Correo" aria-describedby="emailHelp"> </div>
              <div class="form-group">
                <label for="Telefono">Telefono:</label>
                <input name="telefono" type="tel" class="form-control" id="Telefono">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </main>
  <!--/Modal-->
  <!--footer-->
  <footer id="footer">
    <div class="container-fluid">
      <div class="row pb-3 pt-5">
        <div class="col-12 col-md-6 col-lg pb-3">
          <center>
            <img src="../img/logo1.png" alt="logo alam">
          </center>
        </div>
        <div class="col-12 col-md-6 col-lg pb-3 text-justify">
          <h6><i class="fas fa-map-marked fa-3x"></i>
            A.v.Lázaro Cárdenas #1492
            Col.Morelos,
          </h6>
          <h6 class="pl-5">C.P.28217 Manzanillo, Col.
            México.</h6>
          <br>
          <br>
          <h6><i class="fas fa-phone fa-3x"></i>
            +52 (314)333 6651
          </h6>
          <h6 class="pl-5">+52 (314)335 5200</h6>
          <br>
          <br>
          <h6><i class="fas fa-envelope fa-3x"></i> comercializacion@alam.com.mx
          </h6>
        </div>
        <div class="col-12 col-lg">
          <h5 class="text-center">Aviso de privacidad</h5>
          <br>
          <p class="text-justify">AGENCIA LOGÍSTICA ADUANERA DE MANZANILLO, S.C., con domicilio en Avenida Lázaro
            Cárdenas
            número 1492, Colonia Morelos, Manzanillo, Colima, Código Postal 28217, utilizará sus
            datos personales aquí recabados para los servicios de encomienda mercantil y despachos
            aduaneros. Para mayor información acerca del tratamiento y de los derechos que puede
            hacer valer.
          </p>
          <a type="button" class="btn btn-outline-light"
            href="https://drive.google.com/file/d/1Mqz-Uikf5rL9AljQ4fwD958ANHZYf-Gt/view?usp=sharing">
            ¡Leer más!
          </a>
          <br>
          <br>
          <h5 class="text-justify"> Sitios de interes</h5>
          <ul class="text-justify">
            <li> <a class="text-light" href="www.caaarem.mx/web_caaarem/Principal.html">CAAAREM</a> </li>
            <li> <a class="text-light" href="http://www.aaamzo.org.mx/home.php">AAAPUMAC</a> </li>
          </ul>
        </div>
      </div>
      <hr>
      <div class="row pt-2 pb-3">
        <div class="col">
          <h6 class="text-center">Copyright © 2020 Agencia Aduanal ALAM | Quetzaltech;</h3>
        </div>
      </div>
    </div>
  </footer>
  <!--/footer-->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"
    integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous">
  </script>

  <?php include '../includes/librerias.php' ?>
  <script src="../js/appLogin.js"></script>
</body>

</html>