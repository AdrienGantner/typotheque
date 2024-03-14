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

            <ul>
              <?php foreach ($page->tags()->split() as $category): ?>
              <li><?= $category ?></li>
              <?php endforeach ?>
            </ul>

            <button type="button" class="filtres collapsible">Filtres</button>

        <!-- Liste les tags trouvés dans toutes les pages fontes -->
          <div class="filtresList">
            <?php foreach ($page->children()->listed()->pluck('tags', ',', true) as $tag) : ?>
                <button type="button" class="filtres"><?= $tag ?></button>
            <?php endforeach; ?>
          </div>

        </div>
    </div>

    <!-- Loop to display each font -->
    <!-- $i is used as an index to add an incremental id to the font, so that they are targeted more easily with JS later -->
    <?php foreach ($page->children()->listed() as $i => $font) : ?>
      <div class="font-list" class="sticky" >
          <div class="fontflex">
              <a href="<?= $font->url(); ?>"><div class="font-name"><?= $font->title() ?></div></a>
              <div class="font-designer"><?= $font->author(); ?></div>
          </div>

          <div class="fontflex2">
              <div id="fontButtons">
                <!-- TODO : change this to account for various weights defined in the font page. Maybe a select instead of buttons ? -->
                <button type="button" class="weightbutton weightbutton-active" onclick="<?= "changeWeight(idname" . $i . ". " . $font->title() . ")" ?>">Regular</button>
              </div>
          </div>

          <a href="<?= $font->url(); ?>">
          <!-- TODO : Maybe the base text is also defined in the font info ? -->
        <h3 id="<?= $font->uid() ?>" class="editabletxt" >
          <?= $font->content()->text1() ?>
        </h3>
          </a>
      </div>

    <?php endforeach ?>
</article>
<?php snippet('footer') ?>
