<?php
/*
Renders all the fonts on the website. The homepage acts as an archive page for fonts, the only content type.
*/

?>
<?php snippet('header') ?>

<section id="fixed">
    <header class="header">
        <div class="image-container">
            <a href="index.html"><img id="logo" src="/assets/icons/logo.svg"></a>
        </div>
      <input class="menu-btn" type="checkbox" id="menu-btn" />
      <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>

      <ul class="menu">
        <?php snippet('main-menu') ?>
      </ul>

    </header>
</section>

<section id="fontes">
    <div class="filter-flex">
        <div class="custom-select select1">
          <select onchange="sortFonts(this)">
              <option value="recent">Plus récente</option>
              <option value="ancient">Plus ancienne</option>
              <option value="alphabetic">A-Z</option>
              <option value="reverse-alphabetic">Z-A</option>
          </select>
        </div>

        <div class="custom-select select2">
            <select onchange="filterFonts(event)">
              <?php foreach ($page->children()->listed()->pluck('tags', ',', true) as $tag) : ?>
                <option value="<?= Str::slug($tag) ?>"><?= $tag ?></option>
              <?php endforeach; ?>
            </select>

        </div>

        <div class="custom-select select3">
            <select>
              <option value="0">Projets</option>
              <option value="1">Fonte variable B3</option>
              <option value="3">Gothique revival</option>
              <option value="4">Infini moins 62</option>
            </select>
        </div>
    </div>

    <!-- Loop to display each font -->
    <!-- $i is used as an index to add an incremental id to the font, so that they are targeted more easily with JS later -->
    <?php $index = 0 ?>
    <?php foreach ($page->children()->listed()->flip() as $i => $font) : ?>
    <?php $index++; ?>

  <div id="no-shadow" data-order="<?= $index ?>" class="font-list sticky <?php foreach (explode(",", $font->tags()) as $tag) {
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

        // echo '<pre>'
        // print_r($font->fontes()->yaml()[0]['graisse']);
        // echo '</pre>';


    } catch (Exception $ex) {
        echo "Pas de fonte par ici";
        $main_font = "nofont";
    }
        ?>

        <!-- Ajout des styles de chaque graisse -->
      <style>
        <?php foreach ($font->fontes()->yaml() as $i => $font_file) : ?>
          <?php if(isset($font_file['fichier'][0])) :?>
            @font-face {
              font-family: "<?= $font->title()->slug() . "-" . Str::slug($font_file['graisse']) ?>";
              src: url("<?= url($font_file['fichier'][0]) ?>");
            }
          <?php endif ?>
        <?php endforeach ?>

      </style>

          <div class="fontflex2">
                <div id="fontButtons">
                  <?php foreach ($font->fontes()->yaml() as $i => $font_file) : ?>
                <!-- TODO : change this to account for various weights defined in the font page. Maybe a select instead of buttons ? -->
                  <?php if(isset($font_file['fichier'][0])) :?>
                    <button
                      type="button"
                      class="weightbutton weightbutton-active"
                      data-font-name="<?= $font->title()->slug() . "-" . Str::slug($font_file['graisse']) ?>"
                      onclick="changeFontHome(this)">
                        <?= $font_file["graisse"] ?>
                    </button>
                  <?php endif ?>
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
</section>

<?php snippet('footer') ?>
