<section class="sec sec-bg-overlay">

  <div id="diaporama" class="sec-overlay diapo-images">
    <div class="image sec-overlay sec-bg-img visible" style="background-image: url(/assets/images/sport1.png);"></div>
    <div class="image sec-overlay sec-bg-img" style="background-image: url(/assets/images/sport2.jpg);"></div>
    <div class="image sec-overlay sec-bg-img" style="background-image: url(/assets/images/sport3.jpg);"></div>
  </div>
  <div class="sec-overlay sec-over-violet"></div>
  <div class="auto-width group">
    <h1 class="ttl-md"><?php echo $presentation_groupe->nomGroupe ?></h1>
    <p class="txt-jdesc"><?php echo $presentation_groupe->description ?> </p>
    <div class="txt-info">
      <span><b>Sport</b> <?php echo $presentation_groupe->sport ?></span>
      <span><b>Club</b> <?php echo $presentation_groupe->club ?></span>
    </div>
  </div>
</section>
