<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>

<footer>
    <p id="footer-title"><a href="../../index.html"><u>Typotes Club</u></a></p>
    <li>
        <ul>
            <a href="../../index.html#moveable">Fontes</a>
        </ul>
        <ul>
            <a href="../../licences/index.html">Licences</a>
        </ul>
        <ul>
            <a href="">À propos</a>
        </ul>
        <ul>
            <a id="link-footer" target="_blank" href="https://lacambretypo.be/fr">Atelier&nbsp;de&nbsp;typographie&nbsp;La&nbsp;Cambre</a>
        </ul>
    </li>
</footer>

  <?= js([
    'assets/js/prism.js',
    'assets/js/lightbox.js',
    'assets/js/index.js',
    '@auto'
  ]) ?>

</body>
</html>
