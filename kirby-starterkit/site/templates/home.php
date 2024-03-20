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

<a href="index.html"><img id="logo" src="../../assets/icons/logo.svg"></a>

<section id="fontes">
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
          <button type="button" class="filtres" data-checked="false" data-filter="<?= Str::slug($tag) ?>" onclick="filterFonts(this)"><?= $tag ?></button>
            <?php endforeach; ?>
          </div>

        </div>
    </div>

    <!-- Loop to display each font -->
    <!-- $i is used as an index to add an incremental id to the font, so that they are targeted more easily with JS later -->
    <?php foreach ($page->children()->listed() as $i => $font) : ?>
    <div class="font-list sticky <?php foreach (explode(",", $font->tags()) as $tag) {
        echo Str::slug($tag) . ' ';
    } ?>">
          <div class="fontflex">
              <a href="<?= $font->url(); ?>"><div class="font-name"><?= $font->title() ?></div></a>
        <div class="font-designer">
          <?= $font->name(); ?>
        </div>

          </div>


      <!-- Récupère le nom de la première fonte pour l'affiher dans l'éditeur de texte -->
        <?php
      try {
          $main_font = $font->title()->slug() . "-" . Str::slug($font->fontes()->yaml()[0]['graisse']);
      } catch (Exception $ex) {
          echo "Pas de fonte par ici";
          $main_font = "nofont";
      }
        ?>

        <!-- Ajout des styles de chaque graisse -->
      <style>
        <?php foreach ($font->fontes()->yaml() as $i => $font_file) : ?>
          @font-face {
            font-family: "<?= $font->title()->slug() . "-" . Str::slug($font_file['graisse']) ?>";
            src: url("<?= url($font_file['fichier'][0]) ?>");
          }
        <?php endforeach ?>

      </style>

          <div class="fontflex2">
                <div id="fontButtons">
                  <?php foreach ($font->fontes()->yaml() as $i => $font_file) : ?>
                <!-- TODO : change this to account for various weights defined in the font page. Maybe a select instead of buttons ? -->
                  <button
                    type="button"
                    class="weightbutton weightbutton-active"
                    data-font-name="<?= $font->title()->slug() . "-" . Str::slug($font_file['graisse']) ?>"
                    onclick="changeFontHome(this)">
                      <?= $font_file["graisse"] ?>
                  </button>
                <?php endforeach ?>

              </div>
          </div>

          <a href="<?= $font->url(); ?>">
            <!-- TODO : Ajout des classes pour les filtres -->
            <h3
              id="<?= $font->title()->slug() ?>"
              class="editabletxt "
              style="font-family: <?= $main_font ?>;">
          <?php
          if (null != $font->content()->text1() && $font->content()->text1() != "") {
              echo $font->content()->text1();
          } else {
              echo "un deux un deux test";
          }
        ?>
            </h3>
          </a>
      </div>

    <?php endforeach ?>
</article>
<?php snippet('footer') ?>
