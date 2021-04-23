<!doctype html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta charset="UTF-8">
    <title>Admin Paneli | <?=session('admin_name')?></title>
    <!--styles-->
    <link rel="stylesheet" href="<?= admin_public_url('styles/main.css?v=' . time()) ?>">
    <!--scripts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?= admin_public_url('scripts/jquery-1.12.2.min.js') ?>"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
    <script src="<?= admin_public_url('scripts/admin.js') ?>"></script>

</head>
<body>

<!--navbar-->
<div class="navbar">
    <ul dropdown>
        <li>
            <a href="#">
                <span>
                    Xoş gəldin <?=session('admin_name')?>
                </span>
            </a>
        </li>
        <li style="float: right">
            <a href="<?=admin_url('logout')?>">
                <span class="fa fa-sign-out"></span>
                Çıxış
            </a>
        </li>
    </ul>
</div>

<!--sidebar-->
<div class="sidebar">

    <ul>
        <?php if (!empty($menus)) {
            foreach ($menus as $mainUrl => $menu): ?>
                <li class="<?= (route(1) == $mainUrl) || (isset($menu['submenu'][route(1)])) ? 'active' : null ?>">
                    <a href="<?= admin_url($mainUrl) ?>">
                        <span class="fa fa-<?= $menu['icon'] ?>"></span>
                        <span class="title">
                        <?= $menu['title'] ?>
                    </span>
                    </a>

                </li>
            <?php endforeach;
        } ?>

        <li class="line">
            <span></span>
        </li>
    </ul>
    <a href="#" class="collapse-menu">
        <span class="fa fa-arrow-circle-left"></span>
        <span class="title">
            Bağla
        </span>
    </a>
</div>

<!--content-->
<div class="content">
