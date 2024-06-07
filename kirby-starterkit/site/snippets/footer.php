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
    <button onclick="topFunction()" id="upButton" title="Go to top">↑</button>
</footer>

  <?= js([
    'assets/js/index.js',
    '@auto'
  ]) ?>

</body>
</html>
