<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>

<ul>
    <p id="footer-title"><a href="/"><u>Typotes Club</u></a></p>
    <ul>
        <?php snippet('main-menu') ?>
        <li>
            <a id="link-footer" target="_blank" href="https://lacambretypo.be/fr">Atelier&nbsp;de&nbsp;typographie La&nbsp;Cambre</a>
        </li>
    </ul>
</footer>

  <?= js([
    'assets/js/index.js',
    '@auto'
  ]) ?>

</body>
</html>
