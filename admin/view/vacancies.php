<?php require admin_view('static/header')?>

    <div class="box-">
        <h1><?=count($vacancies)?> cv</h1>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th>Dil</th>
                        <th>Şərh</th>
                        <th>Tarix</th>
                        <th>Cv</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($vacancies as $vacancy): ?>
                        <tr>
                            <td><?=$vacancy['vacancy_name']?></td>
                            <td><?=$vacancy['vacancy_surname']?></td>
                            <td><?=$vacancy['vacancy_phone']?></td>
                            <?php if($vacancy['vacancy_email']):?>
                                <td><?=$vacancy['vacancy_email']?></td>
                            <?php endif;?>
                            <td><?=$vacancy['language_name']?></td>
                            <td><?=$vacancy['vacancy_comment']?></td>
                            <td><?=timeConvert($vacancy['vacancy_time'])?></td>
                            <td><a href="<?=URL . '/uploads/cv/606adeeda6104.docx' ?>">Cv Yüklə</a></td>
                            <td>
                                <a class="btn" href="delete/vacancy/vacancy_id/<?=$vacancy['vacancy_id']?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php require admin_view('static/footer')?>