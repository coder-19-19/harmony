<?php  require admin_view('static/header')?>
<style>
    .photo{
        width: 100px;
        height: 100px;
        cursor: pointer;
        border-radius: 50%;
    }
</style>
    <div class="box-">
        <img class="photo" onclick="$('#photo').click()" src="<?=URL?>/uploads/service/<?=$service['service_link']?>">
            <form action="" class="form label" method="POST" enctype="multipart/form-data">
                <input accept=".png, .jpg, .jpeg" type="file" name="photo" id="photo" style="display: none;">
                <ul>
                    <li>
                        <label for="title">Başlıq</label>
                        <input type="text" id="title" name="title" value="<?=$service['service_title']?>">
                    </li>
                    <li>
                        <label for="context">Mövzu</label>
                        <textarea name="context" id="context" cols="30" rows="10"><?=$service['service_context']?></textarea>
                    </li>
                    <li>
                        <input type="hidden" value="1" name="submit">
                        <button class="btn">Saxla</button>
                    </li>
                </ul>
            </form>
    </div>

<?php  require admin_view('static/footer')?>