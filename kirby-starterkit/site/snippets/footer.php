<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<div onclick="topFunction()" id="upButton" title="Go to top">↑</div>

<footer></footer>

<?= js([
    'assets/js/global.js',
    '@auto'
]) ?>

</body>

</html>
