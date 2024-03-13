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
<article id="main">
    <section id="landing">
        <!--   FONT NAME   -->
        <div id="container-titre">
          <h1 id="font-name"><?= $page->title()->esc() ?></h1>
          <button type="button" class="tags">Fonte gothique Eugénie Bidaut 2023</button>

          <?php foreach ($page->tags()->split() as $category) : ?>
            <button type="button" class="tags" ><?= explode("/", $category)[1] ?></button>
          <?php endforeach ?>

        </div>

        <div id="processus">
          <!--     <h1>Processus</h1> -->
      <p id="processus-description"><?= $page->description() ?></p>
        </div>
    </section>

<div id="imageSection">
    <?php foreach ($page->images() as $image) : ?>
      <?= $image ?>
    <?php endforeach ?>

</div>

  <ul class="font text">
    <!-- tri pour  -->
    <?php foreach ($page->files()->filterBy("type", "!=", "image") as $font_url) : ?>
    <!-- Ajoute une classe "good" aux fontes uploadées qui ont la bonne extension (woff ou ttf) -->
    <li class="font
      <?php if ($font_url->extension() != "woff2") : ?>
          <?= "good" ?>
      <?php endif ?>"
      data-font-url="<?= $font_url ?>"><?= $font_url->filename() ?>
    </li>
    <?php endforeach ?>

  </ul>

<div id="editable-container">

    <div class="setting-flex">
        <div class="flex box1">
            <div id="fontSizeDisplay"> <span id="fontSizeValue" class="txt">90</span>px</div>
            <input type="range" min="10" max="150" value="87" class="slider txt" id="fontSlider">
        </div>

        <div class="container flex box2">
            <label for="lineHeightSlider" class="txt">Espacement</label><br>
            <input type="range" id="lineHeightSlider" class="slider" min="1" max="3" step="0.1" value="1.5">
        </div>

        <div id="font-dropdown" class="container flex box3" >
            <div class="custom-dropdown-container">
                <select name="fonts" class="txt">
                    <option value="font1" style="width: 300px;">Regular</option>
                </select>
                <div class="dropdown-icon" class="txt">&#9660;</div>
            </div>
        </div>
    </div>
    <div id="textContainer">
        <div class="editabletxt locale-font" class="txt" id="editableText" contenteditable="true" tag autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"> dans un wagon bleu, tout en mangeant cinq kiwis frais, vous jouez du xylophone</div>
    </div>
</div>

<!-- <h1>Détails</h1> -->
  <p id="details"><?= $page->title() ?> est sous licence OFL.<br>
    Elle a été créée par <u><?= $page->name() ?></u> en <u><?= $page->date()->toDate('Y') ?></u>. </p>

<div id="links">
  <a href="/glyphset" class="links" onclick="getGlyphset(event)">Glyphset</a>
  <div id="glyphset">

  </div>

    <a href='<?php print_r($page->files()->filterBy("filename", "==", "specimen")) ?>' class="links specimen">Specimen</a><br>

    <button type="button" class="collapsible links">Télécharger</button>
    <div class="content">

      <p>Cette fonte est téléchargeable sous la licence <u>OFL</u>.<br>
        Avec ce fichier, j'ai le droit:<br>
        d'utiliser la fonte pour un projet personnel.<br>
          Je n'ai pas le droit de l'utiliser pour un usage commercial.</p>
      <p>Pour plus d'informations, contactez <?= $page->name() ?> :</br>
       <a href="mailto://<?= $page->email() ?>"><?= $page->email() ?></a> </p>

        <div id="dl-container">
            <label>
                <input type="checkbox" id="agreeCheckbox">J'accepte les conditions d'utilisation
            </label><br>
            <button id="downloadButton" disabled><a href="file" download>Télécharger</a></button>
        </div>
    </div>
</div>

  <!-- Snippet pour afficher les fontes suivantes ou précédentes -->
  <!-- <?php snippet('prevnext') ?> -->
</article>

<script src="https://unpkg.com/opentype.js@1.3.4/dist/opentype.js"></script>

<!-- Load js only on font template -->
  <?= js([
  'assets/js/fonte.js',
  ]) ?>

<?php snippet('footer') ?>
