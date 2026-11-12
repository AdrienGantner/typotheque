<?php

// Renders all the fonts on the website. The homepage acts as an archive page for fonts, the only content type.

?>
<?php snippet('font-functions') ?>
<?php snippet('header') ?>
<?php snippet('main-menu') ?>

<section id="fonts">
    <div class="font-filters">
        <select oninput="sortFonts(this)" id="sorting-mode">
            <option value="recent">plus récente</option>
            <option value="ancient">plus ancienne</option>
            <option value="alphabetic">a-z</option>
            <option value="reverse-alphabetic">z-a</option>
        </select>

        <select oninput="filterFonts()" id="tags-filter">
            <option value="reset">tous les tags</option>
            <?php foreach ($page->children()->listed()->pluck('tags', ',', true) as $tag) : ?>
                <option value="<?= Str::slug($tag) ?>"><?= Str::lower($tag) ?></option>
            <?php endforeach; ?>
        </select>

        <select oninput="filterFonts()" id="categories-filter">
            <option value="reset">toutes les catégories</option>
            <?php foreach ($page->children()->listed()->pluck('categories', null, true) as $tag) : ?>
                <option value="<?= Str::slug($tag) ?>"><?= Str::lower($tag) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div id="font-list">
        <!-- Loop to display each font -->
        <!-- $index is used as an index to add an incremental id to the font, so that they are targeted more easily with JS later -->
        <?php $index = 0 ?>
        <?php foreach ($page->children()->listed()->sortBy('year')->flip() as $font) : ?>
            <?php $index++; ?>

            <div data-order="<?= sprintf('%03d', $index); ?>"
                class="font-element"
                data-tags="<?php foreach (explode(",", $font->tags()) as $tag) {
                                echo Str::slug($tag) . ' ';
                            } ?>"
                data-category="<?php foreach (explode(",", $font->categories()) as $cat) {
                                    echo Str::slug($cat);
                                } ?>"
                id="<?= "font-element_" . makeFontID($font) ?>">

                <div class="font-info">
                    <div class="left"><a href="<?= $font->url(); ?>">
                            <div class="font-name"><?= $font->title() ?></div>
                        </a>
                        <div class="font-styles"></div>
                    </div>

                    <div class="right">
                        <div class="font-designer">
                            <?= $font->name(); ?>
                        </div>
                        <div class="font-year">
                            <?= $font->year(); ?>
                        </div>
                    </div>

                </div>


                <!-- Récupère le nom de la première fonte pour l'affiher dans l'éditeur de texte -->

                <?php
                try {
                    $main_font = makeFontCSSName($font->fonts()->toFiles()->first());
                } catch (Exception $ex) {
                    echo "Pas de fonte par ici";
                    $main_font = "nofont";
                }
                ?>

                <!-- Ajout des styles de chaque graisse -->
                <style>
                    <?php foreach ($font->fonts()->toFiles() as $fontFile) : ?>@font-face {
                        font-family: "<?= makeFontCSSName($fontFile) ?>";
                        src: url("<?= $fontFile->url() ?>");
                    }

                    @keyframes variableFontAnimation {
                        from {
                            font-variation-settings: var(--start-font-variations);
                        }

                        to {
                            font-variation-settings: var(--end-font-variations);
                        }
                    }

                    .variable {
                        /* --start-font-variations: "";
                        --end-font-variations: ""; */
                        animation: none;
                    }

                    .variable:hover {
                        animation: 3s ease-in-out infinite alternate variableFontAnimation;
                    }

                    <?php endforeach ?>
                </style>

                <a href="<?= $font->url(); ?>">
                    <!-- TODO : Ajout des classes pour les filtres -->
                    <h3
                        id="<?= "preview_" . $font->title()->slug() ?>"
                        class="preview"
                        style="font-family: <?= $main_font ?>;">
                        <?php
                        if (null != $font->content()->text2() && $font->content()->text2() != "") {
                            echo $font->content()->text2();
                        } else {
                            echo "un deux un deux test";
                        }
                        ?>
                    </h3>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</section>

<!-- Store font data to be picked up by the JavaScript -->
<script type="module">
    window.fontData = {
        <?php $index = 0 ?>
        <?php foreach ($page->children()->listed()->sortBy('year')->flip() as $font) : ?>
            <?php $index++; ?> "<?= makeFontID($font) ?>": {
                id: "<?= makeFontID($font) ?>",
                title: "<?= $font->title() ?>",
                testString: <?= json_encode($font->text2()->value()) ?>,
                fonts: {
                    <?php foreach ($font->fonts()->toFiles() as $fontFile) : ?> "<?= makeFontCSSName($fontFile) ?>": {
                            url: "<?= $fontFile->url() ?>"
                        },
                    <?php endforeach ?>
                },
                <?php if (!$font->defaultFont()->isEmpty()) : ?>
                    defaultFont: "<?= $font->defaultFont()->toFile()->url() ?>",
                <?php endif ?>
                <?php if (!$font->preserveFontsOrder()->isEmpty()) : ?>
                    preserveFontsOrder: <?= $font->preserveFontsOrder() ?>,
                <?php endif ?>
            },
        <?php endforeach ?>
    }
</script>

<!-- Load js only on home page -->
<?= js([
    'assets/js/index.js',
], ['type' => 'module']) ?>

<?php snippet('footer') ?>