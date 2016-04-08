    <section class="sec sec-bg-img sec-bg-overlay" style="background-image: url(/assets/images/sport1.png);">
      <div class="sec-overlay sec-over-violet"></div>
      <div class="auto-width group">
        <h1 class="ttl-md">Nom du groupe</h1>
        <p class="txt-jdesc">Dynamo vous permet de trouver et de gérer des groupes de sport selon votre position géograhique, votre niveau de sport et vos sports favoris. </p>
        <div class="txt-info">
          <span><b>Sport</b> football</span>
          <span><b>Club</b> Forest Hill</span>
        </div>
      </div>
    </section>
    <div class="nav-bbar">
      <nav class="tab-menu">
        <ul>
          <li><a href="<?php page('groupe') ?>">informations</a></li>
          <li><a href="<?php page('membres-groupe') ?>">membres</a></li>
          <li><a href="<?php page('planning-groupe') ?>">planning</a></li>
          <li><a href="<?php page('discussion-groupe') ?>">discussions</a></li>
          <li>
            <a href="<?php page('reglage-groupe') ?>" class="settings active">
              <svg>
                <use xlink:href="#gear"></use>
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="reglage">
      <p>Recevoir des notifications par mail lorsqu'une nouvelle activité est ajoutée</p>
      <a href="#" class="button light">Désactiver</a>
    </div>
    <div class="reglage">
      <p>Recevoir des notifications par mail lorsque quelqu'un répond à ma discussion</p>
      <a href="#" class="button light">Désactiver</a>
    </div>
