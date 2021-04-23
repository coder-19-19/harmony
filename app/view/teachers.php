<?php 
$style = 'teachers';
require view('static/header') ?>

<main class="d-none">
<div class="container" style="margin-top: 10px;">
    <div class="row ">
        <?php foreach($teachers as $teacher):?>
        <div class="col s12 m3 teacher-row">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?=site_url('uploads/' . $teacher['teacher_photo'])?>" alt="<?=$teacher['teacher_name']?>">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4 libre"><?=$teacher['teacher_name'] . ' ' . $teacher['teacher_surname']?><i class="material-icons right">more_vert</i></span>
                    <p class="noto"><?=$teacher['language_name']?> dili</p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4 libre"><?=$teacher['teacher_name'] . ' ' . $teacher['teacher_surname']?><i class="material-icons right">close</i></span>
                    <p class="noto"><?=$teacher['teacher_context']?></p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
</main>

<?php require view('static/footer') ?>