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
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/css/halfmoon-variables.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css"/>
        <link rel="stylesheet" href="<?= media(); ?>/css/preferences.css"/>
    </head>
    <body class="with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-set-preferred-mode-onload="true">
        <!-- Page wrapper with .with-navbar class -->
        <div id="page-wrapper" class="page-wrapper with-navbar with-transitions">


