<?php
/*
Renders all the fonts on the website. The homepage acts as an archive page for fonts, the only content type.
*/

?>
<?php snippet('header') ?>
<article id="main">
<section id="landing">
    <!-- Displays greeting only on homepage-->
    <p id="welcome-text">Typothèque de l'<a id="link" target="_blank"  href="https://lacambretypo.be/fr">atelier Typographie</a><br>de l'ENSAV La Cambre</p>
</section>


<section id="moveable">
    <div class="font-panel" class="sticky top">
        <h2>Fontes</h2>
        <div id="trierpar">
            <p>Trier par: <button type="button" class="filtres">Plus récent</button> <button type="button" class="filtres">A-Z</button> </p>

        <pre>
          <?php print_r($page->categories()->split());  ?>
        </pre>


            <ul>
              <?php foreach ($page->tags()->split() as $category): ?>
              <li><?= $category ?></li>
              <?php endforeach ?>
            </ul>

            <button type="button" class="filtres collapsible">Filtres</button>

            <div class="filtresList">
                <button type="button" class="filtres">display</button>
                <button type="button" class="filtres">serif</button>
                <button type="button" class="filtres">sans serif</button>
                <button type="button" class="filtres">mono</button>
                <button type="button" class="filtres">slab</button> <br>

                <button type="button" class="filtres">1 style</button>
                <button type="button" class="filtres">2 styles</button>
                <button type="button" class="filtres">3+ styles</button>
                <button type="button" class="filtres">variable</button><br>
                <button type="button" class="filtres">minuscules</button>
                <button type="button" class="filtres">majuscules</button>
                <button type="button" class="filtres">chiffres</button>
                <button type="button" class="filtres">caractères spéciaux</button>
                <button type="button" class="filtres">glyphes inclusifs (QUNI)</button>
            </div>
        </div>
    </div>

    <!-- Loop to display each font -->
    <!-- $i is used as an index to add an incremental id to the font, so that they are targeted more easily with JS later -->
    <?php foreach ($page->children()->listed() as $i => $font): ?>

      <!-- <p> -->
      <!--   <?= print_r($font) ?> -->
      <!-- </p> -->

      <div class="font-list" class="sticky" >
          <div class="fontflex">
              <a href="<?= $font->url(); ?>"><div class="font-name"><?= $font->title() ?></div></a>
              <div class="font-designer"><?= $font->author(); ?></div>
          </div>

          <div class="fontflex2">
              <div id="fontButtons">
                <!-- TODO : change this to account for various weights defined in the font page. Maybe a select instead of buttons ? -->
                <button type="button" class="weightbutton weightbutton-active" onclick="<?= "changeWeight(idname".$i.". ".$font->title().")" ?>">Regular</button>
              </div>
          </div>

          <a href="<?= $font->url(); ?>">
          <!-- TODO : Maybe the base text is also defined in the font info ? -->
          <h3 id="insolente" id="idname1" class="editabletxt" >révolution&nbsp;queer</h3>
          </a>
      </div>

    <?php endforeach ?>
</article>
<?php snippet('footer') ?>
