    <section class="sec sec-bg-violet">
      <div class="column success-section">
        <?php if ($token): ?>
          <h1 class="ttl ttl-md success-title FadeArrival">✔︎</h1>
          <p  class="success-msg">
            <?php lang('congrat'); ?>
          </p>
        <?php else: ?>
          <h1 class="ttl ttl-md success-title FadeArrival">✗</h1>
          <p class="success-msg">
            <?php lang('account-validated'); ?>
          </p>
        <?php endif; ?>
      </div>
    </section>
