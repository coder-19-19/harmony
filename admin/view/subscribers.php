<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Abonələr - <?= count($row) ?> nəfər
        </h1>
    </div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Email</th>
                <th>Tarix</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($row as $subscriber): ?>

                <tr>
                    <td>
                        <?= $subscriber['subscriber_email'] ?>
                    </td>
                    <td>
                        <?= timeConvert($subscriber['subscriber_time']) . ' | ' . $subscriber['subscriber_time'] ?>
                    </td>
                    <td>
                        <a href="delete/subscribers/subscriber_id/<?=$subscriber['subscriber_id']?>"
                           class="btn delBtn"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>


<?php require admin_view('static/footer') ?>