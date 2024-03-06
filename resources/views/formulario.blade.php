<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Ninestars Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="{{ url('/') }}"><span>MentoryData</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ url('/') }}">Inicio</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/') }}">Sobre el proyecto</a></li>
        
          <li><a class="nav-link scrollto" href="{{ url('/') }}">Equipo</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/') }}">Evolución</a></li>
          <li><a class="getstarted scrollto" href="{{ url('formulario') }}">Iniciar Sesión / Login</a></li>


          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Registro de estudiantes</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Registro</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    
    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact registro">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Registrate para tener acceso a nuestra App</h2>
          <p>¿Ya estas registrado? <a href="#" id="activar_sesion">Inicia Sesión</a></p>
        </div>
        
        <div class="row justify-content-center  ">
          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
            <form action="{{ url('estudiantes') }}" method="post" role="form" class="php-email-form">
            @csrf
              <div class="row">

              
              <div class="form-group col-md-6">
                  <label for="name">Cedula</label>
                  <input type="text" name="cedula" class="form-control" id="cedula" placeholder="Número de documento" required>
                </div>
              <div class="form-group col-md-6">
                  <label for="name">Código Estudiante</label>
                  <input type="text" name="Codigo" class="form-control" id="name" placeholder="Código Estudiante" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Nombres Completos</label>
                  <input type="text" name="nombres" class="form-control" id="name" placeholder="Nombres Completos" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Correo Electronico</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electronico" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Contraseña</label>
                  <input type="password" name="password" class="form-control" id="name" placeholder="Contraseña" required>
                </div>
              </div>
              <div class="text-center"><button type="submit">Registrarme</button></div>
            </form>
          </div>

          
        </div>

      </div>
    </section><!-- End Contact Us Section -->
    <section id="contact" class="contact sesion">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Inicia Sesión Para Descargar Nuestra Aplicación </h2>
          <p>¿No tienes cuenta aún? <a href="#" id="activar_registros">Registrate Aqui</a></p>
        </div>
        @if(session('error'))
          <div class="alert alert-danger" role="alert">
           El correo o la contraseña son incorrectos
          </div>
        @endif
   
        <div class="row justify-content-center  ">
          <!-- inicio de sesion -->
          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
          <form action="{{ url('login') }}" method="post" role="form" class="php-email-form">
            @csrf
            
              <div class="row">
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Correo Electronico</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electronico" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Contraseña</label>
                  <input type="password" name="pass" class="form-control" id="name" placeholder="Contraseña" required>
                </div>
              </div>
              <div class="text-center"><button type="submit">Inicia sesión</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Us Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">



    <div class="footer-top">
      <div class="container">
        <div class="row justify-content-center" >

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>MentoryData</h3>
            
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Accesos Directos</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre el proyecto</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Equipo</a></li>
          
            </ul>
          </div>

     

          <div class="col-lg-3 col-md-6 footer-links text-center">
            <h4>Redes Sociales</h4>
            <p>Puedes ponerte en contacto con nosotros </p>
            <div class="social-links mt-3 text-center">
             
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              
            </div>
          </div>

        </div>
      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  
 
  <script src="assets/js/main.js"></script>
  <script src="assets/js/myscript.js"></script>
  @if(session('error'))
  <script >
     $(".registro").hide();
      $(".sesion").show();
  </script>
  @endif
</body>

</html>