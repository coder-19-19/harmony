<?php 
$style = 'vacancy';
require view('static/header') ?>

<main class="d-none">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div style="text-align: center;">
                <h3 class="vacancy-header libre">VAKANSİYA</h3>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="col s12">
            <?php if(error()):?>
            <div class="error"><?=$error?></div>
            <?php endif;?>
            <?php if(success()):?>
            <div class="success"><?=$success?></div>
            <?php endif;?>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" name="name" id="name" class="validate" value="<?= post('name') ?>">
                        <label for="name" class="orange-text noto">Ad</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="surname" id="surname" class="validate" value="<?= post('surname') ?>">
                        <label for="surname" class="orange-text noto">Soyad</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="email" name="email" id="email" value="<?= post('email') ?>">
                        <label for="email" class="orange-text noto">Email <span class="lt">(istəyə bağlı)</span></label>
                    </div>
                    <div class="input-field col s6">
                        <select name="language" class="noto">
                            <?php foreach ($languages as  $language) : ?>
                                <option class="noto" value="<?= $language['language_id'] ?>"><?= $language['language_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="number" name="phone" id="phone" value="<?= post('phone') ?>">
                        <label for="phone" class="orange-text noto">Telefon</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea name="comment" class="materialize-textarea" id="comment" cols="30" rows="10"><?= post('comment') ?></textarea>
                        <label for="comment" class="orange-text noto">Əlavə şərh</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-filed">
                        <input type="hidden" value="1" name="submit">
                        <label class="btn light-blue darken-1 waves-effect noto" for="cv" style="font-size:1.1rem !important;background:#03A9F4  !important">CV</label>
                        <input type="file" accept=".docx" style="display: none;" name="cv" id="cv">
                        <button type="submit" class="btn orange darken-1 waves-effect sendBtn noto">Göndər</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require view('static/footer') ?>