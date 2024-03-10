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
          <p id="processus-description">Insolente a été réalisée au cours d'un workshop avec Eugénie Bidaut. J'ai commencé par imiter le tracé de typographies gothiques à la plume. Ensuite, en utilisant du calque, j'ai complexifié les formes en repassant au feutre. </p>
        </div>
    </section>

<div id="imageSection">
    <img src="images/insolente1.jpg">
    <img src="images/insolente2.jpg">
    <img src="images/insolente3.jpg">
    <img src="images/insolente4.jpg">
    <img src="images/insolente5.jpg">
</div>

  <div class="font text">
    <ul>
      <?php foreach ($page->files() as $font_url): ?>

      <?php
      // Divise l'url en array à partir des caractères "/", et récupère le dernier élément de cette array
      $url_array = explode("/", $font_url);
          $font_filename = end($url_array);

          // Récupère juste l'extension du fichier pour pouvoir récupérer le glyphset
          $font_extension = explode(".", $font_filename)[1];

          ?>

      <li>
        <a class="font-url <?php if ($font_extension != "woff2") {
            echo "good";
        }   ?>" href="<?= $font_url ?>"><?= $font_filename ?></a>
      </li>
      <?php endforeach ?>
    </ul>

  </div>

  <div id="glyphset">
    <h2>Glyphset</h2>
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
