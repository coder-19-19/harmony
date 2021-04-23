<?php require admin_view('static/header') ?>


    <div class="box-">
        <h1><?= count($students) ?> tələbə</h1>
        <div class="table">
            <table>
                <thead>
                <tr>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Dil</th>
                    <th>Tarix</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student['student_name'] ?></td>
                        <td><?= $student['student_surname'] ?></td>
                        <td><a href="https://wa.me/+994<?= $student['student_phone']?>"><?= $student['student_phone'] ?></a></td>
                        <td><?= $student['student_email'] ?></td>
                        <td><?= $student['language_name'] ?></td>
                        <td><?= timeConvert($student['student_time']) ?></td>
                        <td>
                            <a class="btn" href="<?=admin_url('student/' . $student['student_id'])?>"><i class="fa fa-eye"></i></a>
                            <a class="btn" href="delete/students/student_id/<?= $student['student_id'] ?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <form action="" method="post">
                        <td>
                            <input type="text" name="name" value="<?= post('name') ?>" placeholder="Ad">
                        </td>
                        <td>
                            <input type="text" name="surname" value="<?= post('surname') ?>" placeholder="Soyad">
                        </td>
                        <td>
                            <input type="number" name="phone" value="<?= post('phone') ?>" placeholder="Telefon">
                        </td>
                        <td>
                            <input type="text" name="email" value="<?= post('email') ?>" placeholder="Email">
                        </td>
                        <td>
                            <select name="language">
                                <?php foreach ($languages as $language): ?>
                                    <option value="<?= $language['language_id'] ?>"><?= $language['language_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            Yeni
                        </td>
                        <td>
                            <input type="hidden" value="1" name="submit">
                            <button class="btn">Əlavə Edin</button>
                        </td>
                    </form>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


<?php require admin_view('static/footer') ?>