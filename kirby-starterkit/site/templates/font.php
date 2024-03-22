<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This font template renders a blog article. It uses the `$page->cover()`
  method from the `font.php` page model (/site/models/page.php)

  It also receives the `$tag` variable from its controller
  (/site/controllers/font.php) if a tag filter is activated.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

        <!-- Récupère le nom de la première fonte pour l'afficher dans l'éditeur de texte -->
        <?php
          try {
              $main_font = $page->title()->slug() . "-" . Str::slug($page->fontes()->yaml()[0]['graisse']);

          } catch (Exception $ex) {
              echo "Pas de fonte par ici";
              $main_font = "nofont";
          }
?>


  <!-- Charge toutes les graisses de la fonte -->
  <style>
    <?php foreach ($page->fontes()->yaml() as $font) : ?>
    <?php if (isset($font['fichier'][0])) : ?>
    @font-face {
      font-family: "<?= $page->title()->slug() . "-" . Str::slug($font['graisse']) ?>";
      src: url("<?= url($font['fichier'][0]) ?>");
    }
    <?php endif ?>
    <?php endforeach ?>
  </style>

<!-- <section id="fixed"> -->
  <div id="landing">
    <header class="header">
      <!-- <a href="/" class="logo">Typothèque</a> -->
      <div id="white-bkgd"></div>
      <input class="menu-btn" type="checkbox" id="menu-btn" />
      <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
      <ul class="menu">
        <?php snippet('main-menu') ?>
      </ul>

    <div class="image-container">
        <a href="/"><img id="logo" src="/assets/icons/logo.svg"></a>
    </div>
          </header>

  </div>

        <article id="main">

    <!--   FONT NAME   -->
    <div id="container-titre">
      <h1 id="font-name"><?= $page->title()->esc() ?></h1>
      <?php foreach ($page->tags()->split() as $category) : ?>
      <button type="button" class="tags" ><?= $category ?></button>
      <?php endforeach ?>

    </div>

    <div id="processus">
      <p id="processus-description"><?= $page->description() ?></p>
    </div>
  <!-- </section> -->

  <div id="imageSection">
    <?php foreach ($page->images() as $image) : ?>
    <?= $image ?>
    <?php endforeach ?>

  </div>

  <div id="editable-container">

    <div class="setting-flex">
      <div class="flex box1">
        <div id="fontSizeDisplay"> <span id="fontSizeValue" class="txt">90</span>px</div>
        <input type="range" min="10" max="150" value="90" class="slider txt" id="fontSlider">
      </div>

    <!--Espacement-->
    <div class="container flex box2">
        <label for="letterSpacingSlider">↔</label>
        <input type="range" id="letterSpacingSlider" class="slider" min="-3" max="3" step="0.1" value="0">
    </div>

    <!--Interlignage-->
      <div class="container flex box2">
          <label for="lineHeightSlider">↕</label><br>
          <input type="range" id="lineHeightSlider" class="slider" min="1" max="3" step="0.1" value="1.5">
      </div>

      <!-- Check variable -->
      <?php if ($page->toggleVariable() != "false") : ?>

        <div class="container flex box2">
        <label for="variable1Slider" class="txt">
          Axe <?= $page->variableAxis1() ?>

        </label>
          <input type="range"
            id="variable1Slider"
                  data-axis="<?= $page->variableAxis1() ?>"
            class="slider"
            min="<?= $page->var1Min() ?>"
            max="<?= $page->var1Max() ?>"
            step="1"
            value="<?= $page->var1Min() ?>">
        </div>


        <?php if ($page->axesVariable() == "2axes") : ?>

          <div class="container flex box2">
          <label for="variable2Slider" class="txt">
            Axe <?= $page->variableAxis2() ?>
          </label>
              <input type="range"
                id="variable2Slider"
                class="slider"
                  data-axis="<?= $page->variableAxis2() ?>"
                min="<?= $page->var2Min() ?>"
                max="<?= $page->var2Max() ?>"
                step="1"
                value="<?= $page->var2Min() ?>">
            </div>

        <?php endif ?>

      <?php endif ?>

      <div id="font-dropdown" class="container flex box3" >
        <div class="custom-dropdown-container">
          <select name="fonts" class="txt" onclick="changeFont(this.value)">
            <?php foreach ($page->fontes()->yaml() as $font) : ?>
              <option
                value="<?= $page->title()->slug() . "-" . Str::slug($font['graisse']) ?>" >

                <?= $font['graisse'] ?>
              </option>

            <?php endforeach ?>

          </select>
          <div class="dropdown-icon" class="txt">&#9660;</div>
        </div>
      </div>
    </div>
    <div id="textContainer">

      <div
        class="editabletxt txt"
        id="editableText"
        contenteditable="true"
        style="font-family: <?= $main_font ?>"
        tag
        autocomplete="off"
        autocorrect="off"
        autocapitalize="off"
        spellcheck="false">
        <?= $page->text2() ?>
      </div>

    </div>
  </div>

          <div id="details">
            <?= $page->title() ?> est sous licence <u>

      <?php if ($page->licence() == "autre"): ?>
        <?= $page->licenceAutre() ?>
      <?php elseif ($page->licence() == "tous-droits") :  ?>
          tous droits réservés
      <?php elseif ($page->licence() == "OFL") :  ?>
          OFL
      <?php elseif ($page->licence() == "ccbysa") :  ?>
        CC-BY-SA
      <?php endif ?>

  </u>.<br>
              Elle a été crée par <u><?= $page->name() ?></u> en <u><?= $page->year()->toDate('Y') ?></u>.

      </div>

  <div id="links">
    <a href="" class="links" onclick="event.preventDefault();">Glyphset</a>
    <div id="glyphset">

    <?php foreach ($page->fontes()->yaml() as $font) : ?>
      <?php if(isset($font['fichier'][0])) :?>
        <button
          class="font-url"
          data-font-url="<?= url($font["fichier"][0]) ?>"
          data-font-name="<?= $page->title()->slug(). "-" . Str::slug($font["graisse"]) ?>"
          onclick="getGlyphset(this)">
          <?= $font["graisse"] ?>
        </button>
      <?php endif ?>
    <?php endforeach ?>

    </div>

    <!-- Check specimen -->
    <?php if ($page->specimen() == "SpecimenPDF") :  ?>
      <a href='<?= $page->specimenPDF() ?>' target="_blank" class="links specimen">Specimen</a>
    <?php elseif ($page->specimen() == "SpecimenURL") :  ?>
      <a href='<?= $page->specimenURL() ?>' target="_blank" class="links specimen">Specimen</a>
    <?php endif ?>

    <button type="button" class="collapsible links">Télécharger</button>

    <!-- Check licence -->
    <div class="content">
      <?php if ($page->licence() == "ofl") :  ?>
        <!-- En vrai c'est mieux de mettre des <p> et de gérer l'espace entre les lignes avec des styles spécifiques -->
        <p>Cette fonte est téléchargeable sous la licence <a href="https://openfontlicense.org/open-font-license-official-text/" target="_blank"><u>OFL</u></a>.</p>
          Avec ce fichier, j'ai le droit:<br>
            d'utiliser la fonte pour un projet personnel.<br>
            J'ai le droit de l'utiliser pour un usage commercial.</p>

      <?php elseif ($page->licence() == "ccbyncsa") :  ?>
      <p>Cette fonte est téléchargeable sous la licence <a href="https://creativecommons.org/licences/by-nc-sa/4.0/" target="_blank"><u>CC-BY-NC-SA</u></a>.</p>

      <?php elseif ($page->licence() == "tous-droits") :  ?>
        <p>Cette fonte n'est pas téléchargeable. Elle est sous la license <a href="https://www.tous-droits-reserves.com/utilite-mention-tous-droits-reserves-copyright.html"><u>tous droits réservés</u></a> © </p>
      <?php else :  ?>
        <p>Cette fonte est téléchargeable sous la licence <a href="<?= $page->lienlicence() ?>" target="_blank"><u><?= $page->licenceautre() ?></u></a>.</p>

      <?php endif  ?>

        <p>Pour plus d'informations, contactez <?= $page->name() ?> :</br>
          <a href="mailto://<?= $page->email() ?>"><?= $page->email() ?></a> </p>

      <?php if ($page->downloadType() == "downloadable") :  ?>
        <div id="dl-container">
          <label>
            <input type="checkbox" id="agreeCheckbox">J'accepte les conditions d'utilisation
          </label><br>
          <a id="downloadLink" class="disabled" href="<?php echo $page->dossierfonte()->toFile(); ?>"
             download>
            Télécharger
          </a>

        </div>
      <?php endif  ?>

    </div>

  </div>
</article>
<script src="https://unpkg.com/opentype.js@1.3.4/dist/opentype.js"></script>

<!-- Load js only on font template -->
<?= js([
  'assets/js/fonte.js',
]) ?>

<?php snippet('footer') ?>
