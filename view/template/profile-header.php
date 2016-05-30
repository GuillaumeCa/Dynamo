<section class="sec sec-bg-violet">
  <div class="auto-width left-align">
    <!-- <a href="<?php page('profile') ?>" class="profile-btn profile-btn-sm" title="Dynamo User">
      <?php echo substr(ucfirst($_SESSION['auth']->prénom), 0, 1) ?>
    </a> -->
    <div class="profile-photo">
      <img src="/<?php echo $photoProfile ?>" alt="" />
      <span class="upload">
        <span class="upload-item">
          <form action="" method="post" enctype="multipart/form-data" id="profilephoto">
            <label class="upload-btn"><input type="file" name="photo" class="form-hidden" onchange="submit('#profilephoto')"></label>
            <input type="hidden" name="profile-photo">
          </form>
        </span>
      </span>
    </div>
    <h1 class="ttl ttl-md ttl-band"><?php echo $infos->prénom.' '.$infos->nom ?></h1>
    <a href="<?php page('logout') ?>" class="button btn-purple-inv btn-right btn-band btn-sm">SE DÉCONNECTER</a>
  </div>
</section>
