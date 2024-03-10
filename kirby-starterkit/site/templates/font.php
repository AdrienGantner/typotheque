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

  <footer class="font-footer">
    <?php if (!empty($tags)): ?>
    <ul class="font-tags">
      <?php foreach ($tags as $tag): ?>
      <li>
        <a  href="<?= $page->parent()->url(['params' => ['tag' => $tag]]) ?>"><?= esc($tag) ?></a>
      </li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>

    <time class="font-date" datetime="<?= $page->date()->toDate('c') ?>">Published on <?= $page->date()->esc() ?></time>
  </footer>

  <?php snippet('prevnext') ?>
</article>

<script src="https://unpkg.com/opentype.js@1.3.4/dist/opentype.js"></script>
<script>
// Récupère l'url de la fonte seulement si c'est un woff, pour pouvoir en extraire le glyphset et le rajouter dans la page
const font = document.querySelector(".font-url.good");
const fontUrl = font.href;
const fontName = font.innerText;

const buffer = fetch(fontUrl).then(res => res.arrayBuffer());

// Attend que la fonte soit chargée pour l'analyser grâce à opentypejs
buffer.then(data => {
  const glyphs = opentype.parse(data).glyphs.glyphs;

  const glyphset = document.getElementById("glyphset");
  const ul = document.createElement("ul");

  Object.values(glyphs).forEach(glyph => {
    const li = document.createElement("li");
    li.innerText = String.fromCharCode(glyph.unicode);
    ul.appendChild(li);
  });

  glyphset.appendChild(ul);

});

</script>

<?php snippet('footer') ?>
