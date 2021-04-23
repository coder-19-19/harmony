<?php require admin_view('static/header')?>
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
        <h1><?=count($books)?> kitab</h1>
        <?php if(error()):?>
            <div class="error"><?=$error?></div>
        <?php endif;?>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Şəkil</th>
                        <th>Ad</th>
                        <th>Müəllif</th>
                        <th>Admin</th>
                        <th>Yüklə</th>
                        <th>Tarix</th>
                        <th>Kateqoriya</th>
                        <th>Dil</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($books as $book):?>
                        <tr>
                            <td><a href="<?=URL . '/uploads/book-photos/' . $book['book_photo']?>"><img class="photo" src="<?=URL . '/uploads/book-photos/' . $book['book_photo']?>" alt=""></a></td>
                            <td><?=$book['book_name']?></td>
                            <td><?=$book['book_author']?></td>
                            <td><?=$book['book_admin']?></td>
                            <td><a href="<?=URL . '/uploads/books/' . $book['book_link']?>" class="">Yüklə</a></td>
                            <td><?=timeConvert($book['book_time'])?></td>
                            <td><?=$book['category_name']?></td>
                            <td><?=$book['language_name']?></td>
                            <td><a class="btn" href="delete/books/book_id/<?=$book['book_id']?>"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach;?>
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
                            <input type="text" placeholder="Müəllif" name="author" value="<?=post('author')?>">
                        </td>
                        <td>
                           <?=$_SESSION['admin_name']?>
                        </td>
                        <td>
                            <label for="pdf" id="photo-label"><i class="fa fa-file"></i></label>
                            <input type="file" id="pdf" accept=".docx" style="display: none;" name="pdf" value="<?=post('pdf')?>">
                        </td>
                        <td>
                            Yeni
                        </td>
                        <td>
                            <select name="category">
                                <?php foreach($categories as $category):?>
                                    <option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                        <td>
                            <select name="language">
                                <?php foreach($languages as $language):?>
                                    <option value="<?=$language['language_id']?>"><?=$language['language_name']?></option>
                                <?php endforeach;?>
                            </select>
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

<?php require admin_view('static/footer')?>