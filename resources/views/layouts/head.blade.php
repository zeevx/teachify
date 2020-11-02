<!DOCTYPE html>
<html lang="en">

<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fontfaces CSS-->
    <link href="{{url('')}}/main-page/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('')}}/main-page/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{url('')}}/main-page/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('')}}/main-page/css/theme.css" rel="stylesheet" media="all">
    <!--- Datatable --->
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="welcome-page/nicepage35fa.css?version=65fa1cfc-8974-4c17-8f56-8ddfcf86482c" media="screen">
    <script class="u-script" type="text/javascript" src="welcome-page/static.nicepage.com/shared/assets/jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="welcome-page/capp.nicepage.com/358e45c98b8b708d5bd48ac677ebebd9cfcfb0ab/nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="welcome-page/fonts.googleapis.com/csscc57.css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="welcome-page/fonts.googleapis.com/cssa55e.css?family=BenchNine:300,400,700">
    <style class="u-style">.u-section-2 {background-image: url("welcome-page/images02.nicepage.io/c461c07a441a5d220e8feb1a/b7712f002af55454aac23334/hhh.jpg"); background-position: 50% 50%; min-height: 691px}
        .u-section-2 .u-layout-wrap-1 {width: calc(((100% - 1140px) / 2) + 1140px); margin: 0 0 0 auto}
        .u-section-2 .u-layout-cell-1 {min-height: 691px}
        .u-section-2 .u-container-layout-1 {padding: 30px 50px}
        .u-section-2 .u-text-1 {font-size: 4.5rem; text-transform: uppercase; letter-spacing: normal; font-family: BenchNine; font-weight: 700; margin: 0}
        .u-section-2 .u-text-2 {font-size: 1.125rem; margin: 20px 0 0}
        .u-section-2 .u-text-3 {margin: 23px auto 0 0}
        .u-section-2 .u-btn-1 {border-style: none none solid; padding: 0}
        .u-section-2 .u-btn-2 {font-size: 1rem; border-style: none; letter-spacing: 1px; font-weight: 700; text-transform: uppercase; background-image: none; margin: 34px auto 0 0; padding: 10px 69px}
        .u-section-2 .u-image-1 {min-height: 691px; background-image: url("welcome-page/images02.nicepage.io/c461c07a441a5d220e8feb1a/173f7473a67954f886be353e/fff.jpg"); background-position: 0% 50%}
        .u-section-2 .u-container-layout-2 {padding: 30px}
        @media (max-width: 1199px){ .u-section-2 {min-height: 591px}
            .u-section-2 .u-layout-wrap-1 {width: calc(((100% - 940px) / 2) + 940px)}
            .u-section-2 .u-layout-cell-1 {min-height: 654px}
            .u-section-2 .u-container-layout-1 {padding-left: 40px; padding-right: 40px}
            .u-section-2 .u-text-1 {font-size: 3.75rem}
            .u-section-2 .u-image-1 {min-height: 501px; background-position: 73.07% 50%} }
        @media (max-width: 991px){ .u-section-2 {min-height: 517px}
            .u-section-2 .u-layout-wrap-1 {width: calc(((100% - 720px) / 2) + 720px)}
            .u-section-2 .u-layout-cell-1 {min-height: 100px}
            .u-section-2 .u-container-layout-1 {padding: 50px 30px}
            .u-section-2 .u-image-1 {min-height: 384px} }
        @media (max-width: 767px){ .u-section-2 {min-height: 455px}
            .u-section-2 .u-layout-wrap-1 {width: calc(((100% - 540px) / 2) + 540px)}
            .u-section-2 .u-container-layout-1 {padding: 60px 50px 60px 10px}
            .u-section-2 .u-text-1 {font-size: 4.5rem}
            .u-section-2 .u-image-1 {min-height: 596px}
            .u-section-2 .u-container-layout-2 {padding-left: 10px; padding-right: 10px} }
        @media (max-width: 575px){ .u-section-2 {min-height: 234px}
            .u-section-2 .u-layout-wrap-1 {width: calc(((100% - 340px) / 2) + 340px)}
            .u-section-2 .u-container-layout-1 {padding-top: 50px; padding-bottom: 50px}
            .u-section-2 .u-text-1 {font-size: 3.4375rem}
            .u-section-2 .u-image-1 {min-height: 375px} }
    .zeev-btn{
        background: radial-gradient(circle, rgba(255,102,0,1) 1%, rgb(174, 217, 218) 100%) !important;
    }
        .zeev-btn:hover{
        background: radial-gradient(circle, rgba(255,102,0,1) 1%, rgba(0,51,153,1) 100%) !important;
    }
    </style>


</head>
