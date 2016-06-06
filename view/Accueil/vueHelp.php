<section class="sec sec-bg-violet">
  <div class="auto-width">
    <?php foreach ($help as $value): ?>
      <article class="help">
        <h1 class="ttl ttl-md"><?php echo $value->question ?></h1>
        <p class="ttl ttl-s">
          <?php echo $value->reponse ?>
        </p>
      </article>
    <?php endforeach; ?>
  </div>
</section>
