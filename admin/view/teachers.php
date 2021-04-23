<?php require admin_view('static/header') ?>
<style>
    #photo-label {
        background-color: rgb(13, 153, 13);
        padding: 10px;
        color: white;
        border-radius: 6px;
        cursor: pointer;

    }
    #photo-label:hover{
        background-color: green;
    }
    .error{
        width: 25%;
        padding: 10px 20px;
        background-color: darkred;
        color: white;
        text-align: center;
        margin: 5px 0;
    }
    .photo{
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 1s;
    }
    .photo:hover{
        cursor:zoom-in;
        transform: scale(1.2);
    }
</style>
<div class="box-">
    <h1><?= count($teachers) ?> müəllim</h1>
    <?php if(error()):?>
        <div class="error"><?=error()?></div>
    <?php endif;?>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Dil</th>
                    <th>Tarix</th>
                    <th>Haqqında</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teachers as $teacher) : ?>
                    <tr>
                        <td><a href="<?=site_url('uploads/' . $teacher['teacher_photo'])?>"><img class="photo" src="<?=URL?>/uploads/<?=$teacher['teacher_photo']?>"></a></td>
                        <td><?= $teacher['teacher_name'] ?></td>
                        <td><?= $teacher['teacher_surname'] ?></td>
                        <td><?= $teacher['teacher_phone'] ?></td>
                        <td><?= $teacher['teacher_email'] ?></td>
                        <td><?= $teacher['language_name'] ?></td>
                        <td><?= timeConvert($teacher['teacher_time']) ?></td>
                        <td><?= $teacher['teacher_context'] ?></td>
                        <td>
                            <a class="btn" href="<?= admin_url("teacher/" . $teacher['teacher_id']) ?>"><i class="fa fa-eye"></i></a>
                            <a class="btn" href="<?= admin_url('delete/teachers/teacher_id/' . $teacher['teacher_id'])?>"><i class="fa fa-trash"></i></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
                <tr>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <td>
                            <label id="photo-label" for="photo"><i class="fa fa-image"></i></label>
                            <input accept=".png, .jpg, .jpeg" style="display: none;"  name="photo" type="file" id="photo">
                        </td>
                        <td>
                            <input type="text" placeholder="Ad" name="name" value="<?=post('name')?>">
                        </td>
                        <td>
                            <input type="text" placeholder="Soyad" name="surname" value="<?=post('surname')?>">
                        </td>
                        <td>
                            <input type="text" placeholder="Telefon" name="phone" value="<?=post('phone')?>">
                        </td>
                        <td>
                            <input type="text" placeholder="Email" name="email" value="<?=post('email')?>">
                        </td>
                        <td>
                            <select name="language">
                                <?php foreach ($languages as $language) : ?>
                                    <option value="<?= $language['language_id']?>"><?= $language['language_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            Yeni
                        </td>
                        <td>
                            <textarea name="context" placeholder="Haqqında" cols="30" rows="1"><?=post('context')?></textarea>
                        </td>
                        <td>
                            <input type="hidden" name="submit" value="1">
                            <button class="btn">Əlavə Et</button>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require admin_view('static/footer') ?>