    <?php include 'view/template/groupe-header.php'; ?>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe', ['id' => $presentation_groupe->id]) ?>" class="active">informations</a></li>
          <li><a href="<?php page('membres-groupe', ['id' => $presentation_groupe->id]) ?>">membres</a></li>
          <li><a href="<?php page('planning-groupe', ['id' => $presentation_groupe->id]) ?>">planning</a></li>
          <li><a href="<?php page('discussion-groupe', ['id' => $presentation_groupe->id]) ?>">discussions</a></li>
          <li class="right">
            <a href="<?php page('reglage-groupe', ['id' => $presentation_groupe->id]) ?>" class="settings">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
          <li class="right social">
            <a href="https://www.facebook.com/sharer/sharer.php?u={http://dynamo.com/fr/groupe/38/info}"><img src="/assets/images/facebook.png" alt="facebook" width="20"/></a>
            <a href="https://twitter.com/intent/tweet/?url={http://dynamo.com/fr/groupe/38/info}&text={J'ai rejoins un groupe de sport sur Dynamo !}"><img src="/assets/images/twitter.png" alt="twitter" width="20"/></a>
            <a href="https://plus.google.com/share?url={http://dynamo.com/fr/groupe/38/info}"><img src="/assets/images/google-plus.png" alt="Google Plus" width="20"/></a>
          </li>
        </ul>
      </nav>
    </div>
    <section class="auto-width">
      <div class="ttl-group-underline-gr">
        <h1 class="ttl ttl-green ttl-inline ttl-sm">Infos</h1>
      </div>
      <table class="info-table">
        <tr>
          <th>Lieu</th>
          <td>
            Paris
          </td>
        </tr>
        <tr>
          <th>Niveau du groupe</th>
          <td>
            <?php echo $niveau[$niveau_c->niveau-1] ?>
          </td>
        </tr>
      </table>


      <div class="ttl-group-underline-gr">
        <h1 class="ttl ttl-green ttl-inline ttl-sm">Aujourd'hui</h1>
      </div>
      <div class="info-planning-grp">
        <div class="now" style='left: <?php //echo str_replace(',','.',(date('H')*100/6)) ?>%'>|</div>

        <div class="evenement">
          <p>
            Entrainement Football
          </p>
          <p>
            12:00 - 13:00
          </p>
        </div>
        <?php $h = date('h'); ?>
        <?php for ($i = -2; $i < 4; $i++): ?>
          <div class="info-planning">
            <p>
              <?php echo date('H',strtotime("now")+$i*3600) ?>h
            </p>
          </div>
        <?php endfor; ?>
      </div>

      <div class="ttl-group-underline-gr">
        <h1 class="ttl ttl-green ttl-inline ttl-sm">Vos photos</h1>
          <a href="#" onclick="togglemodal('add-photo')" class="button btn-sm btn-right btn-wh-inv">+<a>
      </div>
      <div class="gallerie-image">
        <?php foreach ($photos as $photo): ?>
          <a href="#" onclick="showImage('photo-gallerie',<?php echo $photo->id ?>)">
            <img src="/<?php echo $photo->nom ?>" alt="" />
          </a>
        <?php endforeach; ?>
      </div>
    </section>
    <div class="modal" id="add-photo">
      <div class="back"  onclick="togglemodal('add-photo')"></div>
      <div class="window">
        <h1 class="ttl ttl-sm ttl-green">Ajouter une photo</h1>
        <form class="groupe_crea" action="" method="post" enctype="multipart/form-data">
          <div class="">
            <label class="button light">Cliquez pour sélectionner une photo<input type="file" name="photo" class="form-hidden" onchange="showPhotoPreview('#preview')"></label>
          </div>
          <img id="preview" src="" alt="" class="img-preview"/>
          <br>
          <button type="submit" name="add-photo" class="button purple">ajouter</button>
        </form>
      </div>
    </div>
    <div class="modal" id="photo-gallerie">
      <div class="back"  onclick="togglemodal('photo-gallerie')"></div>
      <div class="window gallerie">
        <?php foreach ($photos as $photo): ?>
          <div id="<?php echo $photo->id ?>">
            <img src="/<?php echo $photo->nom ?>" alt="" class="gallerie-img"/>
            <form action="" method="post">
              <input type="hidden" name="value" value="<?php echo $photo->id ?>">
              <button class="gallerie-btn-opt" name="del">SUPPRIMER</button>
            </form>
          </div>

        <?php endforeach; ?>
      </div>
    </div>
