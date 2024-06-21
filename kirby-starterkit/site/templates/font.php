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

<header class="header">
    <div class="image-container">
        <a href="/"><img id="logo" src="/assets/icons/logo.svg"></a>
    </div>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>

  <ul class="menu">
    <?php snippet('main-menu') ?>
  </ul>
</header>

    <!--   FONT NAME   -->
    <div id="container-titre">
      <h1 id="font-name"><?= $page->title()->esc() ?></h1>
      <?php foreach ($page->tags()->split() as $category) : ?>
      <button type="button" class="tags" ><?= $category ?></button>
      <?php endforeach ?>

    </div>

    <p id="description"><?= $page->description() ?></p>

  <!-- </section> -->

  <div id="imageSection">
    <?php foreach ($page->images() as $image) : ?>
    <?= $image ?>
    <?php endforeach ?>

  </div>

    <?php foreach ($page->fontes()->yaml() as $font) : ?>
        <div class="font-title">
          <h2><?= $page->title() . " " . $font['graisse'] ?></h2>
        </div>

  <div class="editable-container">
      <div id="slider-size" class="setting-flex">
        <div id="fontSizeDisplay"> <span class="fontSizeValue" class="txt">90</span>px</div>
        <input type="range" min="10" max="150" value="90" class="slider txt" id="fontSlider" oninput="sizeSlider(this)">
      </div>

    <!--Espacement-->
    <div class="slider-flex setting-flex">
        <label for="letterSpacingSlider">↔</label>
        <input type="range" class="letterSpacingSlider slider" txt" min="-0.15" max="0.15" step="0.01" value="0" oninput="letterSpacingSlider(this)">
    </div>

    <!--Interlignage-->
      <div class="slider-flex setting-flex">
          <label for="lineHeightSlider">↕</label><br>
          <input type="range" class="lineHeightSlider slider" txt" min="1" max="3" step="0.1" value="1.5" oninput="lineHeightSlider(this)">
      </div>

      <!-- Check variable -->
      <?php if ($page->toggleVariable() != "false" && Str::lower($font['graisse']) == "variable") : ?>

        <div class="setting-flex">
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
            oninput="updateFontVariation(this)"
            value="<?= $page->var1Min() ?>">
        </div>


        <?php if ($page->axesVariable() == "2axes" && Str::lower($font['graisse']) == "variable") : ?>

          <div class="setting-flex">
          <label for="variable2Slider" class="txt">
            Axe <?= $page->variableAxis2() ?>
          </label>
              <input type="range"
                id="variable2Slider"
                class="slider"
                data-axis="<?= $page->variableAxis2() ?>"
                min="<?= $page->var2Min() ?>"
                max="<?= $page->var2Max() ?>"
                oninput="updateFontVariation(this)"
                step="1"
                value="<?= $page->var2Min() ?>">
            </div>
        <?php endif ?>
      <?php endif ?>

    <div id="textContainer">

      <div
        class="editabletxt txt editableText"
        contenteditable="true"
        style="font-family: <?= $page->title()->slug() . "-" . Str::slug($font['graisse']); ?>"
        tag
        autocomplete="off"
        autocorrect="off"
        autocapitalize="off"
        spellcheck="false">
        <?= $page->text2() ?>
      </div>
    </div>

      <?php endforeach ?>
  </div>

<div class="glyphset-container">
    <?php foreach ($page->fontes()->yaml() as $font) : ?>
      <?php if(isset($font['fichier'][0])) :?>
        <details class="font-url glyphset-button">
          <summary
            data-font-url="<?= url($font["fichier"][0]) ?>"
            data-font-name="<?= $page->title()->slug(). "-" . Str::slug($font["graisse"]) ?>"
            onclick="getGlyphset(this)">
            <?= $font["graisse"] ?>
          </summary>
            <ul class="font-<?= $page->title()->slug(). "-" . Str::slug($font["graisse"]) ?>"></ul>
        </details>

      <?php endif ?>

    <?php endforeach ?>

</div>

  <div class="flex-container">
    <div class="flex-item" id="licence-txt">
      <p>
        <?= $page->title() ?> est sous licence&nbsp;<u>
          <?php if ($page->licence() == "autre") : ?>
          <a target="_blank" rel="noopener" href="<?= $page->lienLicence() ?>"><?= $page->licenceAutre() ?></a>
          <?php elseif ($page->licence() == "tous-droits") :  ?>
          <a target="_blank" rel="noopener" href="https://www.tous-droits-reserves.com/utilite-mention-tous-droits-reserves-copyright.html">tous droits réservés</a>
          <?php elseif ($page->licence() == "ofl") :  ?>
          <a target="_blank" rel="noopener" href="https://openfontlicense.org/open-font-license-official-text/">OFL</a>
          <?php elseif ($page->licence() == "cute") :  ?>
          <a target="_blank" rel="noopener" href="https://genderfluid.space/documents/2024_BBB_CUTE_FR.pdf">CUTE</a>
          <?php elseif ($page->licence() == "ccbyncsa") :  ?>
          <a target="_blank" rel="noopener" href="https://creativecommons.org/licences/by-nc-sa/4.0/">CC-BY-NC-SA</a>
          <?php endif ?>

        </u>.<br>
        Elle a été dessinée par <u><?= str_replace(" ", "&nbsp;", $page->name()) ?></u> en&nbsp;<u><?= $page->year()->toDate('Y') ?></u>.
      </p>
            <div id="contact">

              <?php if (!$page->website()->isEmpty()) : ?>
                <a target="_blank" rel="noopener" href="<?= $page->website() ?>">Site</a>,
              <?php endif ?>

              <?php if (!$page->email()->isEmpty()) : ?>
                <a target="_blank" rel="noopener" href="mailto:<?= $page->email() ?>">E-mail</a>,
              <?php endif ?>

              <?php if (!$page->socials()->isEmpty()) : ?>
                <a target="_blank" rel="noopener" href="<?= $page->socials() ?>">Médias sociaux</a>
              <?php endif ?>

            </div>
    </div>

    <div class="flex-item" id="links">
      <!-- Check specimen -->
      <?php if ($page->specimen() == "SpecimenPDF") :  ?>
        <a href='<?= $page->specimenPDF() ?>' target="_blank" class="links" id="specimen-button">Specimen</a>

      <?php elseif ($page->specimen() == "SpecimenURL") :  ?>
        <a href='<?= $page->specimenURL() ?>' target="_blank" class="links" id="specimen-button">Specimen</a>

      <?php endif ?>

      <button type="button" class="collapsible links" id="telecharger-button">Télécharger…</button>

      <!-- Check licence -->
      <div class="content">
        <?php if ($page->licence() == "ofl") :  ?>
          <!-- En vrai c'est mieux de mettre des <p> et de gérer l'espace entre les lignes avec des styles spécifiques -->
          <p>
            Cette fonte est téléchargeable sous&nbsp;la&nbsp;licence&nbsp;<a href="https://openfontlicense.org/open-font-license-official-text/" target="_blank"><u>OFL</u></a>.<br />
            Vous pouvez utiliser la fonte pour un projet personnel.<br />
            Vous ne pouvez pas l'utiliser pour un usage commercial.
        <?php elseif ($page->licence() == "cute") :  ?>
        <p>Cette fonte est téléchargeable sous&nbsp;la&nbsp;licence&nbsp;<a href="https://genderfluid.space/documents/2024_BBB_CUTE_FR.pdf" target="_blank"><u>CUTE</u></a>.</p>

        <?php elseif ($page->licence() == "ccbyncsa") :  ?>
        <p>Cette fonte est téléchargeable sous&nbsp;la&nbsp;licence&nbsp;<a href="https://creativecommons.org/licences/by-nc-sa/4.0/" target="_blank"><u>CC-BY-NC-SA</u></a>.</p>

        <?php elseif ($page->licence() == "tous-droits") :  ?>
          <p>Cette fonte n'est pas téléchargeable. Elle est sous&nbsp;la&nbsp;license&nbsp;<a href="https://www.tous-droits-reserves.com/utilite-mention-tous-droits-reserves-copyright.html"><u>tous droits réservés</u></a> © </p>
        <?php else :  ?>
          <p>Cette fonte est téléchargeable sous&nbsp;la&nbsp;licence&nbsp;<a href="<?= $page->lienlicence() ?>" target="_blank"><u><?= $page->licenceautre() ?></u></a>.</p>

        <?php endif  ?>

          <p>Pour plus d'informations, contactez <?= $page->name() ?>&thinsp;:</br>
            <a href="mailto:<?= $page->email() ?>"><?= $page->email() ?></a> </p>

        <?php if ($page->downloadType() == "downloadable") :  ?>
          <div id="dl-container">
            <label id="conditions">
              <input type="checkbox" id="agreeCheckbox">J'accepte les conditions d'utilisation
            </label><br>
            <a id="downloadButton" class="disabled" href="<?= $page->dossierfonte()->toFile() ?>"
               download>
                  <?php
                    $filename_splitted = explode("/", $page->dossierfonte()->toFile());
            ?>
                  Télécharger <u><?= end($filename_splitted) ?></u>
            </a>

          </div>
        <?php endif ?>

      </div>

    </div>

  </div>
<script src="https://unpkg.com/opentype.js@1.3.4/dist/opentype.js"></script>

<!-- Load js only on font template -->
<?= js([
  'assets/js/fonte.js',
]) ?>

<?php snippet('footer') ?>
