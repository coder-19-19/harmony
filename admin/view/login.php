<!doctype html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta charset="UTF-8">
    <title>Giriş</title>

    <!--styles-->
    <link rel="stylesheet" href="<?=admin_public_url('styles/main.css')?>">

    <!--scripts-->
    <script src="<?=admin_public_url('scripts/jquery-1.12.2.min.js')?>"></script>
    <script src="<?=admin_public_url('scripts/admin.js')?>"></script>
    <style>
        .alert{
            background: #3b8306;
            text-align: center;
            padding: 10px 20px;
            color: white;
        }
        .alert-error{
            background-color: darkred;
        }
    </style>
</head>
<body>

<!--login screen-->
<div class="login-screen">

    <!--login logo-->
    <div class="login-logo">
        <a href="#">
            <img src="<?=admin_public_url('images/login-logo.png')?>" alt="">
        </a>
    </div>
    <?php if(error()):?>
        <div class="alert alert-error"><?=$error?></div>
    <?php endif;?>
    <?php if(success()):?>
        <div class="alert alert-success"><?=$success?></div>
    <?php endif;?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?=post('email')?>">
            </li>
            <li>
                <label for="password">Şifrə</label>
                <input type="password" id="password" name="password" value="<?=post('password')?>">
            </li>
            <li>
                <input type="hidden" name="submit" value="1">
                <button type="submit">Giriş</button>
            </li>
        </ul>
    </form>



</div>

</body>
</html>