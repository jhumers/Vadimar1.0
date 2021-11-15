<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1">
        <meta name="apple-mobile-web-app-capable" content="yes"/> 
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="description" content=""/>
        <meta name="author" content="" />
        <title><?= $data['page_title'] ?></title>
        <link rel="icon" href="<?= media(); ?>/img/icon/halfmoon-fav-alt.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link href="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/css/halfmoon-variables.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= media(); ?>/css/preferences.css"/>
    </head>
    <body class="with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-set-preferred-mode-onload="true">
        <div id="page-wrapper" class="page-wrapper with-navbar with-sidebar with-transitions" data-sidebar-type="overlayed-sm-and-down">
            <div class="container-fluid">
                <div class="d-flex justify-content-center">            
                    <div class="card w-500">
                        <div class="content">
                            <h1>Iniciar Sesión</h1>
                            <form name="formLogin" id="formLogin">
                                <div class="form-group">
                                    <label for="txtEmail" class="required">Identificación:</label>
                                    <input type="text" id="txtEmail" name="txtEmail" class="form-control" placeholder="Email" autofocus="autofocus">
                                </div>
                                <div class="form-group">
                                    <label for="txtPassword" class="required">Contraseña:</label>
                                    <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password" autocomplete="false">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" value="Submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <div>

       

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/js/halfmoon.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script> const base_url = "<?= base_url(); ?>"; </script>
        <script src="<?= media(); ?>/backend/<?= $data['page_function_js']; ?>"></script>

    </body>
</html>
