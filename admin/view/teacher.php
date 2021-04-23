<?php  require admin_view('static/header')?>
<style>
    .photo{
        width: 100px;
        height: 100px;
        cursor: pointer;
        border-radius: 50%;
    }
</style>
    <div class="box-">
        <img class="photo" onclick="$('#photo').click()" src="<?=URL?>/uploads/<?=$teacher['teacher_photo']?>">
            <form action="" class="form label" method="POST" enctype="multipart/form-data">
                <input accept=".png, .jpg, .jpeg" type="file" name="photo" id="photo" style="display: none;">
                <ul>
                    <li>
                        <label for="name">Ad</label>
                        <input type="text" id="name" name="name" value="<?=$teacher['teacher_name']?>">
                    </li>
                    <li>
                        <label for="surname">Soyad</label>
                        <input type="text" id="surname" name="surname" value="<?=$teacher['teacher_surname']?>">
                    </li>
                    <li>
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="<?=$teacher['teacher_email']?>">
                    </li>
                    <li>
                        <label for="phone">Telefon</label>
                        <input type="text" id="phone" name="phone" value="<?=$teacher['teacher_phone']?>">
                    </li>
                    <li>
                        <label for="language">Dil</label>
                        <select name="language" id="language">
                            <?php foreach($languages as $language): ?>
                                <option <?=$language['language_id'] == $teacher['teacher_language'] ? 'selected' : false ?> value="<?=$language['language_id']?>"><?=$language['language_name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </li>
                    <li>
                        <label for="context">Haqqında</label>
                        <textarea name="context" id="context" cols="30" rows="10"><?=$teacher['teacher_context']?></textarea>
                    </li>
                    <li>
                        <input type="hidden" value="1" name="submit">
                        <button class="btn">Saxla</button>
                    </li>
                </ul>
            </form>
    </div>

<?php  require admin_view('static/footer')?>