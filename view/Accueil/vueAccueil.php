<section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(assets/images/sport1.png);">
  <div class="sec-overlay sec-over-violet"></div>
  <div class="column">
    <h1 class="ttl ttl-lg ttl-green green-text">Dynamo</h1>
    <p class="txt-desc"><?php lang('Dynamo vous permet de trouver et gérer des groupes de sport selon votre position géographique, votre niveau de sport et vos sports favoris.'); ?></p>
    <a href="<?php page('inscription') ?>" class="button"><?php lang('inscris-moi'); ?></a>
  </div>
</section>
<section class="sec sec-bg-dviolet">
  <div class="column">
    <h1 class="ttl ttl-md"><?php lang('Types de sports'); ?></h1>
    <div class="grid">
      <?php foreach($types_sports as $type): ?>
        <div class="sport">
          <a href="<?php page('typeSport', ['id' => $type->id]) ?>">
            <div class="circle">
              <svg>
                <use xlink:href='#typeSport<?php echo $type->id ?>'></use>
              </svg>
            </div>
          </a>
          <span><?php echo $type->nom ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
