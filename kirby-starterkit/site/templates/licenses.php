<?php snippet('header') ?>
<?php snippet('main-menu') ?>

<h1 id="page-title">Licences et conditions</h1>
<p id="intro"><?= $page->intro() ?></p>

<section id="licenses">

    <?php foreach ($page->licences()->toStructure() as $licence) : ?>

        <div class="license" id="<?= Str::slug($licence->nomLicence()) ?>">
            <div class="license-name"><?= $licence->nomLicence() ?></div>

            <?php if (!$licence->descLicence()->isEmpty()): ?>
                <p><?= $licence->descLicence() ?></p>
            <?php endif ?>

            <div class="grid-left">Avec la licence <?= $licence->nomLicence() ?>, vous&nbsp;pouvez&thinsp;:</div>
            <div class="grid-right">
                <?php foreach ($licence->ledroit() as $yes) : ?>
                    <?= $yes ?>
                <?php endforeach ?>
            </div>

            <?php if (!$licence->devoir()->isEmpty()): ?>
                <div class="grid-left">Vous devez&thinsp;:</div>
                <div class="grid-right">
                    <?php foreach ($licence->devoir() as $yes) : ?>
                        <?= $yes ?>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <div class="grid-left">Vous ne&nbsp;pouvez&nbsp;pas&thinsp;:</div>
            <div class="grid-right">
                <?php foreach ($licence->pasledroit() as $yes) : ?>
                    <?= $yes ?>
                <?php endforeach ?>
            </div>

        </div>

    <?php endforeach ?>

</section>

<button onclick="topFunction()" id="upButton" title="Go to top">↑</button>
<?php snippet('footer') ?>