<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This default template must not be removed. It is used whenever Kirby
  cannot find a template with the name of the content file.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

  <!-- <section id="fixed"> -->
  <div id="landing">
    <header class="header">
      <a href="/" class="logo">Typothèque</a>
      <div id="white-bkgd"></div>
      <input class="menu-btn" type="checkbox" id="menu-btn" />
      <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
      <ul class="menu">
        <?php snippet('main-menu') ?>
      </ul>
    </header>
  <!-- </section> -->

<article>
  <h1 class="h1"><?= $page->title()->esc() ?></h1>
  <div class="text">
    <?= $page->text()->kt() ?>
  </div>
</article>

<?php snippet('footer') ?>
