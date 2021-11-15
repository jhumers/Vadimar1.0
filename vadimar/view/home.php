<!DOCTYPE html>
<html lang="en"> 
  <head>
    <title> <?= $data['page_title'] ?> - Bootstrap 5 </title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= media(); ?>/css/portal.css">
    <link id="theme-style" rel="stylesheet" href="<?= media(); ?>/plugins/bootstrap-icons-1.6.0/bootstrap-icons.css">
  </head>
  <body>
    <main>
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light py-4">
          <div class="container">
            <a class=" ml-auto mr-0" href="<?= base_url(); ?>/home"><img width="40" src="https://themes.3rdwavemedia.com/demo/portal/assets/images/app-logo.svg" alt="" srcset=""></a>
            <a class="btn app-btn-primary ml-auto order-lg-2" href="<?= base_url(); ?>/login" >Iniciar Sesión</a>
          </div>
        </nav>
        <section class="py-4">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-12 col-md-6 order-md-1">
                <img class="img-fluid img-float-md-6 mb-5 mb-md-0" src="<?= media(); ?>/images/illustration/dash.svg" alt="">
              </div>
              <div class="col-12 col-md-6 order-md-2">
                <div class="col-fix pl-xl-3 ml-auto text-center text-sm-left">
                  <h1 class="display-4 enable-responsive-font-size mb-4"> 
                    Gracias por <strong> intentarlo </strong>
                    ¡Soy el <strong> tema </strong> de tu <strong> proyecto </strong>! </h1>
                  <a class="btn d-block d-sm-inline-block app-btn-primary my-3"> Intentemos <i class="bi bi-arrow-right"></i></a>
                  <a class="btn d-block d-sm-inline-block app-btn-primary my-3">Documentacion</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    
    <script src="<?= media(); ?>/plugins/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>  

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        const base_url = "<?= base_url(); ?>";
    </script>

    <script src="<?= media(); ?>/backend/<?= $data['page_function_js']; ?>"></script>

  </body>
</html> 