<footer class="page-footer grey white black d-none ">
  <div class="container">
    <div class="row">
      <div class="col l3 s12">
        <h5 class="orange-text footer-title libre"><?= settings('footer_title') ?></h5>
        <p style="font-size:22px" class="white-text text-lighten-4 noto"><?= settings('footer_about_text') ?></p>
      </div>
      <div class="col l3  s12">
        <h5 class="orange-text footer-title libre">Faydalı Linklər</h5>
        <ul>
          <?php  $menus['contact']['title'] = 'İndi qeydiyyatdan keç';
          foreach ($menus as $url => $menu) : if (route(0) != $url) : ?>
              <?php if ($menu['title'] == 'İndi qeydiyyatdan keç') : ?>
                <li>
                  <a class="btn orange footer-contact waves-effect noto" href="<?= site_url($url) ?>"><?= $menu['title'] ?></a>
                </li>
              <?php else :  ?>
                <li><a class="footer-link white-text text-lighten-3 noto" href="<?= site_url($url) ?>"><?= $menu['title'] ?></a></li>
              <?php endif; ?>
          <?php endif;
          endforeach ?>
          
        </ul>
      </div>
      <div class="col l3 s12">
        <h5 class="orange-text footer-title libre">Əlaqə</h5>
        <a class="footer-social btn btn-floating waves-effect green accent-4 " href="https://wa.me/<?= settings('whatsapp') ?>"><i class="fa fa-whatsapp "></i></a>
        <a class="footer-social btn btn-floating waves-effect blue accent-4 " href="<?= settings('facebook') ?>"><i class="fa fa-facebook "></i></a>
        <a class="footer-social btn btn-floating waves-effect red accent-3 " href="<?= settings('instagram') ?>"><i class="fa fa-instagram "></i></a>
        <a class="footer-social btn btn-floating waves-effect red accent-4 " href="<?= settings('youtube') ?>"><i class="fa fa-youtube"></i></a><br>
        <a class="footer-phone noto" href="tel:<?= settings('whatsapp') ?>"><i class="fa fa-phone"></i> <?= settings('whatsapp') ?></a><br><br>
        <a class="footer-link white-text text-lighten-3 noto"  href="<?=settings('developer')?>"><i style="font-size:20px ;" class="fas fa-code"></i>  Developer</a><br>
        <a class="footer-link white-text text-lighten-3 noto"  href="<?=settings('designer')?>"><i style="font-size:20px ;" class="fas fa-palette"></i>  Designer</a><br>
      </div>
      <div class="col s12 l3">
        <h6 class="orange-text footer-title libre"><?= settings('footer_form_title') ?></h6>
        <form action="" method="POST" id="footer-form">
          <div class="input-field">
            <input type="email" name="email" id="footerEmail" class="white-text">
            <label for="footerEmail" class="white-text noto">Email</label>
          </div>
          <input type="hidden" name="submit" value="1">
          <button style="width:100%" id="sendAppeal" class="noto btn waves-effect blue accent-4">Göndər</button>
        </form>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container white-text libre">
      <?= settings('footer_copyright') ?>
    </div>
  </div>
</footer>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  let wp_number = '<?=settings('whatsapp')?>'
</script>
<script src="<?= public_url('js/main.js') ?>"></script>
<?php if(isset($js)):?>
<script src="<?= public_url("js/" . $js . ".js") ?>"></script>
<?php endif;?>
<script>
  const form = $('#footer-form')
  form.on('submit', e => {
    let data = form.serialize()
    $.post('<?= URL ?>/app/subscribe.php', data, response => {
      if (response.error) {
        M.toast({
          html: response.error
        })
      } else {
        M.toast({
          html: response.success
        })
      }

    }, 'json')
    e.preventDefault()
  })
</script>

</body>

</html>