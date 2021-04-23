<?php require admin_view('static/header') ?>

    <div class="box-container container-50">
        <div class="box-">
            <h1><?= timeConvert($message['message_time']) ?> göndərildi, <strong><?= $message['user_name'] ?></strong>
                tərəfindən oxundu</h1>
            <form action="" class="form label">
                <ul>
                    <li>
                        <label>Ad Soyad</label>
                        <div class="form-content" style="padding-top: 12px">
                            <?= $message['message_name']. ' ' . $message['message_surname']?>
                        </div>
                    </li>
                    <?php if ($message['message_email']): ?>
                        <li>
                            <label>Email</label>
                            <div class="form-content" style="padding-top: 12px">
                                <?= $message['message_email'] ?>
                            </div>
                        </li>
                    <?php endif; ?>
                    <li>
                        <label>Telefon</label>
                        <div class="form-content" style="padding-top: 12px">
                            <a href="https://wa.me/+994<?= $message['message_phone']?>"><?= $message['message_phone']?></a>
                        </div>
                    </li>
                    <li>
                        <label>Dil</label>
                        <div class="form-content" style="padding-top: 12px">
                            <?= $message['language_name'] ?>
                        </div>
                    </li>
                    <li>
                        <label>Mesaj</label>
                        <div class="form-content" style="padding-top: 12px">
                            <?= nl2br($message['message_context']) ?>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <div class="box-container container-25">
        <h1>Mesaj göndər</h1>
        <form action="" method="post" class="form">
            <ul>
                <li>
                    <label for="email" class="title">Email</label>
                    <input type="text" id="email" name="email" value="<?=$message['message_email']?>">
                </li>
                <li>
                    <label for="subject" class="title">Başlıq</label>
                    <input type="text" id="subject"  name="subject" value="<?=$message['language_name']?> dili">
                </li>
                <li>
                    <label for="message" class="title">Mesaj</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </li>
                <li>
                    <input type="hidden" value="1" name="submit">
                    <button class="btn">Göndər</button>
                </li>
            </ul>
        </form>
    </div>


<?php require admin_view('static/footer') ?>