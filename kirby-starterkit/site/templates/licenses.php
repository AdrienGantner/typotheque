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

<h1>Licences et conditions</h1>
  <p id="txt"><?= $page->intro() ?></p>

  <?php foreach ($page->licences()->toStructure() as $licence) : ?>

  <div class="grid-container" id="<?= Str::slug($licence->nomLicence()) ?>">
        <div class="licence-name"><?= $licence->nomLicence() ?></div>

        <?php if(!$licence->descLicence()->isEmpty()): ?>
          <p><?= $licence->descLicence() ?></p>
        <?php endif ?>

        <div class="grid-left">Avec la licence <?= $licence->nomLicence() ?>, vous&nbsp;pouvez&thinsp;:</div>
        <div class="grid-right">
              <?php foreach ($licence->ledroit() as $yes) : ?>
                <?= $yes ?>
              <?php endforeach ?>
        </div>

        <?php if(!$licence->devoir()->isEmpty()): ?>
            <div class="grid-left">Vous devez&thinsp;:</div>
            <div class="grid-right">
                <?php foreach ($licence->devoir() as $yes) : ?>
                   <?= $yes ?>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <div class="grid-left">Vous ne&nbsp;pouvez&nbsp;pas&thinsp;:</div>
        <div class="grid-right">
            <?php foreach ($licence->pasledroit() as $yes) : ?>
               <?= $yes ?>
            <?php endforeach ?>
        </div>

    </div>

  <?php endforeach ?>

<!-- <div  class="grid-container" id="info"> -->
<!--   <p>Pour aller plus loin sur les questions de licences,<br> -->
<!--   explorez le poster de Clara Bougon:</p> -->
<!--   <button>Poster Licences (FR)</button> -->
<!--   <button>Poster Licences (EN)</button> -->
<!-- </div> -->

<button onclick="topFunction()" id="upButton" title="Go to top">↑</button>
<?php snippet('footer') ?>
