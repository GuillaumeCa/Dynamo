    <section class="sec sec-bg-violet">
      <div class="column success-section">
        <?php if ($token): ?>
          <h1 class="ttl ttl-md success-title FadeArrival">✔︎</h1>
          <p  class="success-msg">
            <?php lang('Félicitation, votre compte a bien été activé !'); ?>
          </p>
        <?php else: ?>
          <h1 class="ttl ttl-md success-title FadeArrival">✗</h1>
          <p class="success-msg">
            <?php lang('Le compte a déjà été validé.'); ?>
          </p>
        <?php endif; ?>
      </div>
    </section>
