<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1><?=$student['student_name'] . ' ' .$student['student_surname']?></h1>
        <form action="" method="post" class="form label">
            <ul>
                <li>
                    <input type="text" id="surname" name="name" value="<?= $student['student_name'] ?>">
                    <label for="name">Ad</label>
                </li>
                <li>
                    <input type="text" id="surname" name="surname" value="<?= $student['student_surname'] ?>">
                    <label for="surname">Soyad</label>
                </li>
                <li>
                    <input type="number" id="phone" name="phone" value="<?= $student['student_phone'] ?>">
                    <label for="phone">Telefon</label>
                </li>
                    <li>
                        <input type="email" id="email" name="email" value="<?= $student['student_email'] ?>">
                        <label for="email">Email</label>
                    </li>
                <li>
                    <select name="language" id="language">
                        <?php foreach ($languages as $language):?>
                            <option <?=$language['language_id'] == $student['student_language'] ? 'selected' : false ?> value="<?=$language['language_id']?>"><?=$language['language_name']?></option>
                        <?php endforeach;?>
                    </select>
                    <label for="language">Dil</label>
                </li>
                <li>
                    <input type="hidden" name="submit" value="1">
                    <button class="btn">Saxla</button>
                </li>
            </ul>
        </form>
    </div>

<?php require admin_view('static/footer') ?>