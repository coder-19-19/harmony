<?php require admin_view('static/header') ?>
<div class="box-">
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Ad
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
                <?php foreach ($books_categories as $book_category) : ?>
                    <tr>
                        <td><?= $book_category['category_id'] ?></td>
                        <td><?= $book_category['category_name'] ?></td>
                        <td><?= timeConvert($book_category['category_time']) ?></td>
                        <td><a href="delete/book_categories/category_id/<?= $book_category['category_id'] ?>" class="btn"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <form action="" method="POST">
                        <td>#</td>
                        <td><input type="text" name="name"></td>
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