<?php require admin_view('static/header') ?>
<style>
    .fa-remove {
        background-color: #be1212;
        color: white;
        width: 25px;
        height: 25px;
        text-align: center;
        border-radius: 50%;
        line-height: 25px;
    }
</style>
<div class="box-">
    <h1><?= count($messages) ?> mesaj</h1>
</div>
<div class="table">
    <table>
        <thead>
        <tr>
            <th>Ad Soyad</th>
            <th>Email</th>
            <th>Nömrə</th>
            <th>Tarix</th>
            <th style="text-align: center">Oxunma</th>
            <th>Dil</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($messages as $message): ?>
            <tr>
                <td><?= $message['message_name'] . ' ' . $message['message_surname'] ?></td>
                <td><?= $message['message_email'] ?></td>
                <td><?= $message['message_phone'] ?></td>
                <td><?= timeConvert($message['message_time']) ?></td>
                <td style="text-align: center"><?= $message['message_read'] == 0 ? '<i  class="fa fa-remove"></i>' : timeConvert($message['message_read_time']) . '<br>' . $message['user_name'] . ' tərəfindən oxunub' ?></td>
                <td><?= $message['language_name'] ?></td>
                <td><a href="<?= admin_url('message/' . $message['message_id']) ?>" class="btn"><i class="fa fa-eye"></i></a>
                    <a class="btn .delBtn"
                       href="<?= admin_url('delete/messages/message_id/' . $message["message_id"]) ?>"><i class="fa fa-trash"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require admin_view('static/footer') ?>

