    <section class="pink-bg">
      <div class="column success-section">
        <?php if ($data['token']): ?>
          <h1 class="title success-title">✔︎</h1>
          <p  class="success-msg">
            Félicitation, votre compte a bien été activé !
          </p>
        <?php else: ?>
          <h1 class="title success-title">✗</h1>
          <p class="success-msg">
            Le compte a déjà été validé.
          </p>
        <?php endif; ?>
      </div>
    </section>
