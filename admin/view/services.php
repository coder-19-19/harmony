<?php require admin_view('static/header') ?>
<style>
    #photo-label {
        background-color: rgb(13, 153, 13);
        padding: 10px;
        color: white;
        border-radius: 6px;
        cursor: pointer;

    }

    .error {
        width: 25%;
        padding: 10px 20px;
        background-color: darkred;
        color: white;
        text-align: center;
        margin: 5px 0;
    }
</style>
<div class="box-">
    <div class="table">
        <?php if (error()) : ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th>
                        Şəkil
                    </th>
                    <th>
                        Başlıq
                    </th>
                    <th>
                        Mövzu
                    </th>
                    <th>
                        Tarix
                    </th>
                    <th>
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service) : ?>
                    <tr>
                        <td>
                            <a style="cursor: zoom-in;" href="<?= site_url('/uploads/service/' . $service['service_link']) ?>">
                                <img id="image" src="<?= URL . '/uploads/service/' . $service['service_link'] ?>" width="100" height="100">
                            </a>
                        </td>
                        <td>
                            <?= $service['service_title'] ?>
                        </td>
                        <td>
                            <?= $service['service_context'] ?>
                        </td>
                        <td><?= timeConvert($service['service_time']) ?></td>
                        <td><a href="<?=admin_url('service/'.$service['service_id']) ?>" class="btn"><i class="fa fa-eye"></i></a>
                        <a href="delete/services/service_id/<?= $service['service_id'] ?>" class="btn"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <td>
                            <label for="photo" id="photo-label"><i class="fa fa-image"></i></label>
                            <input type="file" id="photo" accept=".png,.jpg,.jpeg" name="photo" style="display: none;">
                        </td>
                        <td>
                            <input type="text" name="title" value="<?= post('title') ?>">
                        </td>
                        <td>
                            <textarea name="context" cols="30" rows="2"><?= post('context') ?></textarea>
                        </td>
                        <td>Yeni</td>
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