<?php
/*
  Main menu navigation
*/

// main menu items
$items = $pages->listed();

// only show the menu if items are available
if($items->isNotEmpty()):

    ?>
<nav>
  <ul>
    <li><a<?php e($page->isOpen(), ' class="active"') ?> href="/">Fontes</a></li>
    <?php foreach ($items as $item) : ?>
    <li><a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
  </ul>
</nav>
<?php endif ?>
