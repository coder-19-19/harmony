<?php settings('maintenance_description') ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=settings('maintenance_title')?></title>
    <style>
        body{
            background-color: #b3acac;
        }
        div{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 95vh;
            text-align: center;
            font-size: 70px;
            color: transparent;
            -webkit-text-stroke: 3px blue;
        }
    </style>
</head>
<body>

<div>
    <?=settings('maintenance_description')?>
</div>

</body>
</html>
