<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        Tənzimləmələr
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="box-">
    <form action="" method="post" class="form label">
        <ul>
            <li>
                <label>Sayt Başlığı</label>
                <div class="form-content">
                    <input type="text" id="title" name="settings[title]" value="<?= settings('title') ?>">
                </div>
            </li>
            <li>
                <label>Sayt Təsviri</label>
                <div class="form-content">
                    <input type="text" id="description" name="settings[description]"
                           value="<?= settings('description') ?>">
                </div>
            </li>
            <li>
                <label>Sayt Açar Sözləri</label>
                <div class="form-content">
                    <input type="text" id="keywords" name="settings[keywords]" value="<?= settings('keywords') ?>">
                </div>
            </li>

        </ul>
        <ul>
            <h1>Baxım Modu Ayarları</h1>
            <li>
                <label>Baxım Modu</label>
                <div class="form-content">
                    <select name="settings[maintenance]">
                        <option <?= settings('maintenance') == 1 ? ' selected ' : null ?> value="1">On</option>
                        <option <?= settings('maintenance') == 2 ? ' selected ' : null ?> value="2">Off</option>
                    </select>
                </div>
            </li>
            <li>
                <label>Baxım Modu Başlığı </label>
                <input type="text" name="settings[maintenance_title]" value="<?= settings('maintenance_title') ?>">
            </li>
            <li>
                <label>Baxım Modu Təsviri </label>
                <textarea name="settings[maintenance_description]"><?= settings('maintenance_description') ?></textarea>
            </li>
        </ul>
        <ul>
            <h1>Sayt Tema Ayarları</h1>
            <li>
                <label>Sayt Logosu</label>
                <input type="text" name="settings[logo]" value="<?= settings('logo') ?>">
            </li>
            <li>
                <label> Footer Başlığı </label>
                <textarea name="settings[footer_title]"><?= settings('footer_title') ?></textarea>
            </li>
            <li>
                <label> Footer Form Başlığı </label>
                <textarea name="settings[footer_form_title]"><?= settings('footer_form_title') ?></textarea>
            </li>
            <li>
                <label> Footer Haqqında </label>
                <textarea name="settings[footer_about_text]"><?= settings('footer_about_text') ?></textarea>
            </li>
            <li>
                <label> Footer Hüquqlar </label>
                <textarea name="settings[footer_copyright]"><?= settings('footer_copyright') ?></textarea>
            </li>
            <li>
                <label>Developer Linki</label>
                <input type="text" name="settings[developer]" value="<?= settings('developer') ?>">
            </li>
            <li>
                <label>Designer Linki</label>
                <input type="text" name="settings[designer]" value="<?= settings('designer') ?>">
            </li>
            <li>
                <label>Facebook Linki</label>
                <input type="text" name="settings[facebook]" value="<?= settings('facebook') ?>">
            </li>
            <li>
                <label> İnstagram Linki</label>
                <input type="text" name="settings[instagram]" value="<?= settings('instagram') ?>">
            </li>
            <li>
                <label>YouTube Linki</label>
                <input type="text" name="settings[youtube]" value="<?= settings('youtube') ?>">
            </li>
            <li>
                <label> Whatsapp Nömrəsi</label>
                <input type="text" name="settings[whatsapp]" value="<?= settings('whatsapp') ?>">
            </li>
            <ul>
                <h1>SMTP Mail Ayarları</h1>
                <li>
                    <label>SMTP Emaili</label>
                    <input type="text" name="settings[smtp_email]" value="<?= settings('smtp_email') ?>">
                </li>
                <li>
                    <label>SMTP Email Şifərsi</label>
                    <input type="text" name="settings[smtp_password]" value="<?= settings('smtp_password') ?>">
                </li>
                <li>
                    <label>SMTP Mesaj Başlığı</label>
                    <input type="text" name="settings[smtp_email_title]" value="<?= settings('smtp_email_title') ?>">
                </li>
                <li>
                    <label>SMTP Abonə Mesaj Başlığı</label>
                    <input type="text" name="settings[smtp_subscribe_message_title]" value="<?= settings('smtp_subscribe_message_title') ?>">
                </li>
                <li>
                    <label>SMTP Abonə Mesajı</label>
                    <input type="text" name="settings[smtp_subscribe_message]" value="<?= settings('smtp_subscribe_message') ?>">
                </li>
            </ul>
            <ul>
                <h1>Üstünlüklər</h1>
                <li>
                    <label>Yazı 1</label>
                    <textarea name="settings[context_1]"><?= settings('context_1') ?></textarea>
                </li>
                <li>
                    <label>Yazı 2</label>
                    <textarea name="settings[context_2]"><?= settings('context_2') ?></textarea>
                </li>
                <li>
                    <label>Yazı 3</label>
                    <textarea name="settings[context_3]"><?= settings('context_3') ?></textarea>
                </li>
                <li>
                    <label>Yazı 4</label>
                    <textarea name="settings[context_4]"><?= settings('context_4') ?></textarea>
                </li>
                <li>
                    <label>Yazı 5</label>
                    <textarea name="settings[context_5]"><?= settings('context_5') ?></textarea>
                </li>
                <li>
                    <label>Yazı 6</label>
                    <textarea name="settings[context_6]"><?= settings('context_6') ?></textarea>
                </li>
            </ul>
            <ul>
                <li>
                <label>Müəllim sayı</label>
                    <input type="text" name="settings[teacher_count]" value="<?= settings('teacher_count') ?>">
                </li>
                <li>
                <label>Tələbə sayı</label>
                    <input type="text" name="settings[student_count]" value="<?= settings('student_count') ?>">
                </li>
            </ul>
            <li class="submit">
                <input type="hidden" name="submit" value="1">
                <button type="submit">Saxla</button>
            </li>
        </ul>
    </form>
</div>


<?php require admin_view('static/footer') ?>
