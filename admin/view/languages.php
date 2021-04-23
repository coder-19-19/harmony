<?php require admin_view('static/header') ?>

<div class="box-">
    <h1><?= count($languages) ?> dil tədris olunur</h1>
</div>

<div class="table">
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Dil</th>
            <th>Tarix</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($languages as $language): ?>

            <tr>
                <td>
                    <?=$language['language_id']?>
                </td>
                <td>
                    <?= $language['language_name'] ?>
                </td>
                <td>
                    <?= timeConvert($language['language_time']) ?>
                </td>
                <td>
                    <a class="btn delBtn" href="delete/languages/language_id/<?= $language['language_id'] ?>"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <form action="" method="post">
                <td>#</td>
                <td>
                    <input type="text" name="language_name">
                </td>
                <td>Yeni</td>
                <td>
                    <input type="hidden" name="submit" value="1">
                    <button class="btn">Əlavə et</button>
                </td>
            </form>
        </tr>
        </tbody>
    </table>
</div>



<?php require admin_view('static/footer') ?>
