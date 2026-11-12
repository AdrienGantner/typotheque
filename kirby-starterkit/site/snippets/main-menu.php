<?php
/*
  Main menu navigation
*/

// main menu items
$items = $pages->listed();

?>

<header <?php e($page->uri() == "home", 'class="sticky"') ?>>
    <div class="logo-container">
        <a href="/"><img id="logo" src="/assets/icons/logo.svg"></a>
    </div>
    <!-- <input class="menu-btn" type="checkbox" id="menu-btn" /> -->
    <!-- <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label> -->

    <div class="menus">
        <!-- Always show Fontes page -->
        <div>
            <a<?php e($page->isOpen(), ' class="active"') ?> href="/#fonts">Fontes</a>
        </div>

        <!-- // only show the menu if items are available -->
        <?php if ($items->isNotEmpty()): ?>
            <?php foreach ($items as $item) : ?>
                <div>
                    <a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
                </div>
            <?php endforeach ?>

        <?php endif ?>
        <div><a target="_blank" rel="noopener" href="https://typo.lacambre.be">La Cambre Typo</a></li>
        </div>

</header>
