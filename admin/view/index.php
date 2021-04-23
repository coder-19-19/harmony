<?php require admin_view('static/header') ?>

    <style>
        .static {
            padding: 10px 20px;
            background-color: orange;
            border: 1px solid black;
            margin-bottom: 2px;
        }

    </style>

    <div class="box-container container-25">
        <div class="box" id="div-1">
            <h3>
                Statistika
            </h3>
            <div class="box-content">

                <div class="static">Görüntüləmə Sayı : <strong><?= $num ?> nəfər</strong></div>
                <div class="static">Tələbə Sayı : <strong><?=count($studentRow)?> nəfər</strong></div>
                <div class="static">Müəllim Sayı : <strong><?=count($teacherRow)?> nəfər</strong></div>
                <div class="static">Kitab Sayı : <strong><?=count($bookRow)?> ədəd</strong></div>
                <div class="static">CV Sayı : <strong><?=count($vacancyRow)?> nəfər</strong></div>
                <div class="static">Oxunamamış Mesaj Sayı : <strong><?= $countMessage ?> </strong></div>
                <div class="static">Abonə Sayı : <strong><?= count($subRow) ?> nəfər</strong></div>


            </div>
        </div>
    </div>

    <div class="box-container container-50">
        <div class="box" id="div-2">
            <h3>
                Adminlər
            </h3>
            <div class="box-content">
                <div class="table">
                    <table>
                        <thead>
                        <tr>
                            <th>Ad</th>
                            <th>Email</th>
                            <th>Son giriş</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($userRow as $admin):
                            if($admin['user_id'] == session('admin_id')){
                                $admin_name = $admin['user_name'];
                                $admin_email = $admin['user_email'];
                                $admin_time = $admin['user_time'];

                            }
                            ?>
                            <tr>
                                <td><?= $admin['user_name'] ?></td>
                                <td><?= $admin['user_email'] ?></td>
                                <td><?= $admin['user_last_time'] != '' ? timeConvert($admin['user_last_time']) : 'Giriş edilməyib' ?></td>
                            </tr>
                        <?php  endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="box-container container-25">
        <div class="box" id="div-3">
            <h3>
                Hərkəsə mesaj yaz
            </h3>
            <div class="box-content">
                <form action="" class="form" method="post">
                    <ul>
                        <li>
                            <label for="title" class="title">Başlıq</label>
                            <input type="text" id="title" name="title">
                        </li>
                        <li>
                            <label for="message" class="title">Mesaj</label>
                            <textarea name="message" id="message" cols="30" rows="5"></textarea>
                        </li>
                        <li>
                            <input type="hidden" name="submit" value="1">
                            <button type="submit">Göndər</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
    <div class="box-container container-25">
        <div class="box" id="div-4">
            <h3>
                Admin info
            </h3>
            <div class="box-content">
                <h6><?=timeConvert($admin_time)?> qoşulmusunuz</h6><br>
                <form action="" class="form" method="post">
                    <ul>
                        <li>
                            <label for="admin_name" class="title">Ad</label>
                            <input type="text" id="admin_name" name="admin_name" value="<?=$admin_name?>">
                        </li>
                        <li>
                            <label for="admin_email" class="title">Email</label>
                            <input name="admin_email" id="admin_email" value="<?=$admin_email?>">
                        </li>
                        <li>
                            <label for="admin_password" class="title">Şifrə</label>
                            <input name="admin_password" id="admin_password">
                        </li>
                        <li>
                            <input type="hidden" name="admin_submit" value="1">
                            <button type="submit">Saxla</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>

    <div class="box-container container-25">
        <div class="box" id="div-5">
            <h3>
                Yeni admin əlavə et
            </h3>
            <div class="box-content">
                <form action="" class="form" method="post">
                    <ul>
                        <li>
                            <label for="new_admin_name" class="title">Ad</label>
                            <input type="text" id="new_admin_name" name="new_admin_name">
                        </li>
                        <li>
                            <label for="new_admin_email" class="title">Email</label>
                            <input name="new_admin_email" id="new_admin_email">
                        </li>
                        <li>
                            <label for="new_admin_password" class="title">Şifrə</label>
                            <input name="new_admin_password" id="new_admin_password">
                        </li>
                        <li>
                            <input type="hidden" name="new_admin_submit" value="1">
                            <button type="submit">Saxla</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>

<?php require admin_view('static/footer') ?>