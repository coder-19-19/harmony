<?php
$style = 'home';
require view('static/header') ?>

<main class="d-none">
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <?php foreach($services as $service):?>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?= site_url('uploads/service/' .$service['service_link']) ?>" alt="<?=$service['service_name']?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4 libre"><?=$service['service_title']?><i class="material-icons right">more_vert</i></span>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4 libre"><span style="max-width: 70%;display:inline-block"><?=$service['service_context']?></span><i class="material-icons right">close</i></span>
                        <a style="background-color: #03A9F4;" class="btn  waves-effect" href="<?= site_url('contact') ?>">Qeydiyyatdan keç</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="row">
        <div class="box-">
            <h4 class="center header libre">ÜSTÜNLÜKLƏRİMİZ <i style="color:rgb(76, 187, 85)" class="far fa-check-square"></i></h4>
            <div class="advantages">
                <img class="advantage-image" src="<?= public_url('img/advantage.jpg') ?>" alt="Şəkil">
                <ul>
                    <li class="advantage">
                        <img class="icon" src="<?= public_url('img/giftbox.png') ?>" alt="İkon">
                        <div>
                            <p class="white-text libre"><?= settings('context_1') ?></p>
                        </div>
                    </li>
                    <li class="advantage">
                        <img class="icon" src="<?= public_url('img/teacher.png') ?>" alt="İkon">
                        <div>
                            <p class="white-text libre"><?= settings('context_2') ?></p>
                        </div>
                    </li>
                    <li class="advantage">
                        <img class="icon" src="<?= public_url('img/vishu.png') ?>" alt="İkon">
                        <div>
                            <p class="white-text libre"><?= settings('context_3') ?></p>
                        </div>
                    </li>
                    <li class="advantage">
                        <img class="icon" src="<?= public_url('img/fast-time.png') ?>" alt="İkon">
                        <div>
                            <p class="white-text libre"><?= settings('context_4') ?></p>
                        </div>
                    </li>
                    <li class="advantage">
                        <img class="icon" src="<?= public_url('img/diploma.png') ?>" alt="İkon">
                        <div>
                            <p class="white-text libre"><?= settings('context_5') ?></p>
                        </div>
                    </li>
                    <li class="advantage">
                        <img class="icon" src="<?= public_url('img/books.png') ?>" alt="İkon">
                        <div>
                            <p class="white-text libre"><?= settings('context_6') ?></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="box-">
                <h4 class="center header libre">GÖSTƏRİCİLƏR <i style="color:rgb(76, 187, 85)" class="fa fa-stream"></i></h4>
                <div class="components">
                    <div class="component libre"> <span><?= settings('teacher_count') ?> + </span> <br> Müəllim <i class="fa fa-user"></i></div>
                    <div class="component libre"> <span><?= settings('student_count') ?> + </span> <br> Tələbə <i class="fa fa-graduation-cap"></i></div>
                    <div class="component libre"> <span><?= count($books) ?> + </span> <br> Kitab <i class="fa fa-book"></i></div>
                </div>
            </div>
        </div>
    </div>


</main>

<?php
$js = 'home';
require view('static/footer');
?>