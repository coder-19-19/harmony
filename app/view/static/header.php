<?php
    $menus = [
            'index' => [
                    'title' => 'Ana Səhifə',
                    'icon' => 'home'
            ],
            'teachers' => [
                    'title' => 'Müəllimlər',
                    'icon' => 'record_voice_over'
            ],
            'books' => [
                    'title' => 'Kitabxana',
                    'icon' => 'menu_book'
            ],
            'vacancy' => [
                    'title' => 'Vakansiya',
                    'icon' => 'checklist'
            ],
            'contact' => [
                    'title' => 'Əlaqə',
                    'icon' => 'call'
            ]
    ];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?=settings('keywords')?>">
    <meta name="description" content="<?=settings('description')?>">
    <link rel="canonical" href="<?=URL?>" />
    <title><?=settings('title')?></title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@300&display=swap" rel="stylesheet">    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= public_url('img/favicon.JPG') ?>" type="image/x-icon">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= public_url('css/style.css') ?>">
    <?php if(isset($style)): ?>
        <link rel="stylesheet" href="<?= public_url("css/$style.css") ?>">
    <?php endif; ?>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c37a2e96a6.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="navbar-fixed d-none">
    <nav class="white">
        <div class="nav-wrapper">
            <a href="#" data-target="mobile-icon" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
            <a style="height:55px;" href="<?=site_url('index')?>" class="brand-logo"><img id="logo" src="<?= public_url('img/logo.png') ?>" alt="Logo"></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <?php foreach ($menus as $url => $menu): ?>
                    <li class="libre waves-effect  navLi <?=route(0) == $url ? 'active' : false?>"><a href="<?=site_url($url)?>"><i class="material-icons left"><?=$menu['icon']?></i><?=$menu['title']?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
</div>

<ul class="sidenav" id="mobile-icon">
    <?php foreach ($menus as $url => $menu): ?>
        <li class="libre"><a href="<?=site_url($url)?>"><i class="material-icons left"><?=$menu['icon']?></i><?=$menu['title']?></a></li>
    <?php endforeach; ?>
</ul>


<div class="center-preloader">
    <div class="harmony libre">Harmony<br><span class="harmony colleges">Colleges</span></div>
</div>
 