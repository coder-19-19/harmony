<?php 
$style = 'contact';
require view('static/header') ?>

    <main class="d-none">
        <div class="container">
            <div class="row" style="margin-top: 10px;text-align: center">
                <ul class="info">
                    <li>
                        <a href="#"><i class="fa fa-map-marker"></i></a>
                        <div class="noto">Azərbaycan,Bakı</div>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-clock"></i></a>
                        <div class="noto">Hər zaman</div>
                    </li>
                    <li>
                        <a href="tel:<?=settings('whatsapp')?>"><i class="fa fa-phone"></i></a>
                        <div class="noto"> <?=settings('whatsapp')?></div>
                    </li>
                    <li>
                        <a href="mailto:<?=settings('smtp_email')?>"><i class="fa fa-envelope"></i></a>
                        <div class="noto"><?=settings('smtp_email')?></div>
                    </li>
                </ul>

            </div>
            <div class="row">
                <div style="text-align: center;">
                    <h3 class="registration libre">QEYDİYYAT</h3>
                </div>
                <form action="" id="message-form" method="POST" class="col s12" >
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" name="name" id="name" class="validate" value="<?= post('name') ?>">
                            <label for="name" class="orange-text noto">Ad</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="surname" id="surname" class="validate"
                                   value="<?= post('surname') ?>">
                            <label for="surname" class="orange-text noto">Soyad</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="email" name="email" id="email" value="<?= post('email') ?>">
                            <label for="email" class="orange-text noto">Email <span class="lt">(istəyə bağlı)</span></label>
                        </div>
                        <div class="input-field col s6">
                            <select name="language" class="noto" >
                                <?php foreach ($languages as  $language): ?>
                                    <option class="noto" value="<?=$language['language_id']?>"><?=$language['language_name']?></option>
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
                            <textarea name="message" class="materialize-textarea" id="message" cols="30" rows="10"><?=post('message')?></textarea>
                            <label for="message" class="orange-text noto">Mesaj</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-filed">
                            <input type="hidden" value="1" name="submit">
                            <button type="submit" class="btn waves-effect noto sendBtn">Göndər</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
<script>
    let contact_url = '<?=URL?>'
</script>
<?php $js = 'contact'?>
<?php require view('static/footer') ?>

