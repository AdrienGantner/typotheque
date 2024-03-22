<?php
/*
  Main menu navigation
*/

// main menu items
$items = $pages->listed();

?>
<!-- Always show Fontes page -->
<li><a<?php e($page->isOpen(), ' class="active"') ?> href="/#fontes">Fontes</a></li>

<!-- // only show the menu if items are available -->
<?php if($items->isNotEmpty()): ?>
    <?php foreach ($items as $item) : ?>
    <li><a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>

<?php endif ?>
