<?php
$style = 'books';
require view('static/header') ?>

<main class="d-none">
    <ul id="tabs-swipe-language" class="tabs">
        <?php foreach ($languages as $language) : ?>
            <li class="tab col s3 libre"><a style="color:black" href="#language-<?= $language['language_id'] ?>"><?= $language['language_name'] ?></a></li>
        <?php endforeach; ?>
    </ul>
    <nav class="search col s12 l4">
        <div class="nav-wrapper">
            <div class="input-field">
                <input id="search" type="search">
                <label class="label-icon" for="search"><i class="search-icon material-icons black-text">search</i></label>
                <i id="closeBtn" class="material-icons">close</i>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row books">
            <?php foreach ($languages as $language) : ?>
                <div id="language-<?= $language['language_id'] ?>" class="col s12">
                    <?php foreach ($books as $book) : if ($language['language_id'] == $book['book_language']) : ?>
                            <div class="col s12 m3">
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="<?= site_url('uploads/book-photos/' . $book['book_photo']) ?>" alt="<?=$book['book_name']?>">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title  grey-text text-darken-4 libre"><span style="max-width: 70%;display:inline-block"><?= $book['book_name'] ?></span><a href="<?= URL . '/uploads/books/' . $book['book_link'] ?>"><i class="download material-icons right">download_for_offline</i></a></span>
                                        <p class="noto"><?= $book['book_author'] ?></p>
                                        <h6 style="font-weight: bold;" class="orange-text noto">Kateqoriya : <span class="black-text"><?= $book['category_name'] ?></span></h6>
                                    </div>
                                </div>
                            </div>
                    <?php endif;
                    endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<script>
    let book_url = '<?= URL ?>'
</script>

<?php
$js = 'book';
require view('static/footer') ?>