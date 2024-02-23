<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php
  /*
    In the title tag we show the title of our
    site and the title of the current page
  */
?>

  <?php
/*
  Stylesheets can be included using the `css()` helper.
  Kirby also provides the `js()` helper to include script file.
  More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
*/
?>
  <?= css([
  'assets/css/index.css',
  'assets/css/styles.css',
  'assets/css/font.css',
  '@auto'
]) ?>

  <!-- ajout de css pour charger la bonne fonte sur la page de la fonte -->
  <?php if ($page->parent() == "home") : ?>
    <style>
      @font-face {
        font-family: "locale";
        src: url(<?= $page->files()->first() ?>);
      }

      #glyphset,
      #glyphset li {
        font-family: "locale";
      }

    </style>
  <?php endif ?>

  <?php
/*
  The `url()` helper is a great way to create reliable
  absolute URLs in Kirby that always start with the
  base URL of your site.
*/
?>
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>
<body>

<header class="header">
    <a href="" class="logo">Typothèque</a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
    <li><a href="#moveable">Fontes</a></li>
    <li><a href="#licences">Licences</a></li>
    <li><a href="#apropos">À Propos</a></li>
    </ul>
  </header>

  <main class="main">
