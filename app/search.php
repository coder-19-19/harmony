<?php
require 'init.php';

if (isset($_GET['search'])) {

    $search = $_GET['search'];

    $query = $db->prepare('SELECT * FROM books LEFT JOIN book_categories ON book_category = category_id WHERE book_name  LIKE ? OR book_author LIKE ? ORDER BY book_id DESC');
    $query->execute(['%' . $search . '%', '%' . $search . '%']);
    $books = $query->fetchAll(PDO::FETCH_ASSOC);




    if ($books) {
        foreach ($books as $book) {
?>


            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?= site_url('uploads/book-photos/' . $book['book_photo']) ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title  grey-text text-darken-4"><span style="max-width: 70%;display:inline-block"><?= $book['book_name'] ?></span><a href="<?= URL . '/uploads/books/' . $book['book_link'] ?>"><i class="download material-icons right">download_for_offline</i></a></span>
                        <p><?= $book['book_author'] ?></p>
                        <h6 style="font-weight: bold;" class="orange-text">Kateqoriya : <span class="black-text"><?= $book['category_name'] ?></span></h6>
                    </div>
                </div>
            </div>

        <?php
        }
    } else {
        ?>
        <div class="noto" style="background-color: white;
        border-left:4px rgb(200, 14, 14) solid;
        margin-top:10px;
        width:212px;
        padding:10px 20px;
        ">
            Axtardığınız kitab tapılmadı
        </div>
<?php
    }
}
