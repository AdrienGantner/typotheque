<?php
/*
    Font project presentation page.
*/

$licensesPageLink = $pages->get("licences")->url();
$allRightsReservedLink = $licensesPageLink . "#tous-droits-reserves";
$oflLicenseLink = $licensesPageLink . "#sil-ofl";
$cuteLicenseLink = $licensesPageLink . "#cute-conditions-d-utilisations-typographiques-engageantes";
$ccLicenseLink = $licensesPageLink . "#ccbyncsa";

?>
<?php snippet('font-functions') ?>
<?php snippet('header') ?>

<!-- Charge toutes les graisses de la fonte -->
<style>
    <?php foreach ($page->fonts()->toFiles() as $font) : ?>@font-face {
        font-family: "<?= makeFontCSSName($font) ?>";
        src: url("<?= $font->url() ?>");
    }

    <?php endforeach ?>
</style>

<?php snippet('main-menu') ?>

<section id="font-project">

    <!--   FONT NAME   -->
    <div id="title-container">
        <h1 id="font-name"><?= $page->title()->esc() ?></h1>
        <?php if (!($page->tags()->isEmpty())) : ?>
            <div id="tags-container">
                <?php foreach ($page->tags()->split() as $category) : ?>
                    <div class="tag"><?= $category ?></div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>

    <?php
    // Separate images from documents
    $allowedImageExtensions = array("jpeg", "jpg", "jfif", "pjpeg", "pjp", "gif", "png", "avif", "apng", "svg", "webp");
    $images = array();
    $documents = array();
    foreach ($page->content()->get('images')->toFiles() as $file) {
        if (in_array($file->extension(), $allowedImageExtensions)) {
            $images[] = $file;
        } else {
            $documents[] = $file;
        }
    }
    ?>

    <?php if ($images || !$page->description()->isEmpty()) : ?>
        <div id="presentation">
            <?php if (!($page->description()->isEmpty()) || $documents) : ?>
                <div class="left">
                    <?php if (!($page->description()->isEmpty())) : ?>
                        <p class="description"><?= $page->description() ?></p>
                    <?php endif ?>
                    <?php if ($documents) : ?>
                        <div class="document-links">
                            <?php foreach ($documents as $document) : ?>
                                <a class="link" href="<?= $document ?>"><?= $document->filename() ?></a>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                </div>
            <?php endif ?>
            <?php if ($images) : ?>
                <div class="images-container">
                    <div class="images">
                        <?php foreach ($images as $image) : ?>
                            <?= $image ?>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    <?php endif ?>

    <div id="font-testers"></div>

    <div id="glyphset">
        <div class="settings-container">
            <div class="glyph-count"></div>
            <select name="" id="glyphset-style-select" class="style-select"></select>
        </div>
        <div class="glyphs-container"></div>
    </div>

    <div id="info">
        <div class="left">
            <p class="license"><?= $page->title() ?> est sous licence&nbsp;<u><?php if ($page->licence() == "autre"): ?><a target="_blank" rel="noopener" href="<?= $page->lienLicence() ?>"><?= $page->licenceAutre()->trim() ?></a>
                    <?php elseif ($page->licence() == "tous-droits"): ?><a target="_blank" rel="noopener" href=<?= $allRightsReservedLink ?>>tous droits réservés</a><?php elseif ($page->licence() == "ofl"): ?><a target="_blank" rel="noopener" href=<?= $oflLicenseLink ?>>OFL</a><?php elseif ($page->licence() == "cute"): ?><a target="_blank" rel="noopener" href=<?= $cuteLicenseLink ?>>CUTE</a><?php elseif ($page->licence() == "ccbyncsa"): ?><a target="_blank" rel="noopener" href=<?= $ccLicenseLink ?>">CC-BY-NC-SA</a><?php endif ?></u>.</p>

            <p class="designer">Elle a été dessinée par <u><?= str_replace(" ", "&nbsp;", $page->name()) ?></u> en&nbsp;<u><?= $page->year() ?></u>.</p>

            <div class="contact">
                <?php if (!$page->website()->isEmpty()) : ?>
                    <a target="_blank" rel="noopener" href="<?= $page->website() ?>">Site</a>
                <?php endif ?>
                <?php if (!$page->email()->isEmpty()) : ?>
                    <a target="_blank" rel="noopener" href="mailto:<?= $page->email() ?>">E-mail</a>
                <?php endif ?>
                <?php if (!$page->socials()->isEmpty()) : ?>
                    <a target="_blank" rel="noopener" href="<?= $page->socials() ?>">Médias sociaux</a>
                <?php endif ?>
            </div>
        </div>

        <div class="right">
            <?php if (!$page->dossierfonte()->isEmpty() && $page->downloadType() == "downloadable") : ?>
                <div id="download-button">
                    <div class="container"><span class="text">Télécharger...</span><span class="file-size"><?= $page->dossierfonte()->toFile()->niceSize() ?></span></div>

                    <div class="popup">
                        <div class="license-message">
                            <?php if ($page->licence() == "ofl") : ?>
                                <p>Cette fonte est téléchargeable sous&nbsp;la&nbsp;licence&nbsp;<a href=<?= $oflLicenseLink ?> target="_blank"><u>OFL</u></a>.<br />Vous pouvez utiliser la fonte pour un projet personnel. Vous ne pouvez pas l'utiliser pour un usage commercial.</p>

                            <?php elseif ($page->licence() == "cute") : ?>
                                <p>Cette fonte est téléchargeable sous&nbsp;la&nbsp;licence&nbsp;<a href=<?= $cuteLicenseLink ?> target="_blank"><u>CUTE</u></a>.</p>

                            <?php elseif ($page->licence() == "ccbyncsa") : ?>
                                <p>Cette fonte est téléchargeable sous&nbsp;la&nbsp;licence&nbsp;<a href=<?= $ccLicenseLink ?> target="_blank"><u>CC-BY-NC-SA</u></a>.</p>

                            <?php elseif ($page->licence() == "tous-droits") : ?>
                                <p>Cette fonte est sous&nbsp;la&nbsp;licence&nbsp;<a href=<?= $allRightsReservedLink ?>><u>tous droits réservés</u></a></p>

                            <?php else : ?>
                                <p>Cette fonte est téléchargeable sous&nbsp;la&nbsp;licence&nbsp;<a href="<?= $page->lienlicence() ?>" target="_blank"><u><?= $page->licenceautre() ?></u></a>.</p>

                            <?php endif ?>
                        </div>

                        <div class="contact-message">
                            <p>Pour plus d'informations, contactez <?= $page->name() ?>&thinsp;:
                                <a href="mailto:<?= $page->email() ?>"><?= $page->email() ?></a>
                            </p>
                        </div>

                        <?php if ($page->downloadType() == "downloadable") :  ?>
                            <div class="download-section">
                                <div class="conditions">
                                    <input type="checkbox" id="download-conditions-checkbox">
                                    <label for="download-conditions-checkbox">J'accepte les conditions d'utilisation</label>
                                </div>
                                <a id="popup-download-button" class="disabled" href="<?= $page->dossierfonte()->toFile() ?>"
                                    download>
                                    Télécharger <u><?= $page->dossierfonte()->toFile()->filename() ?></u>
                                </a>

                            </div>
                        <?php endif ?>
                    </div>
                </div>
            <?php endif ?>

            <?php if ($page->specimen() == "SpecimenPDF" && !$page->specimenPDF()->isEmpty()) : ?>
                <a href='<?= $page->specimenPDF()->toFile() ?>' target="_blank" class="links" id="specimen-button">Specimen</a>
            <?php elseif ($page->specimen() == "SpecimenURL" && !$page->specimenURL()->isEmpty()) : ?>
                <a href='<?= $page->specimenURL() ?>' target="_blank" class="links" id="specimen-button">Specimen</a>
            <?php endif ?>
        </div>
    </div>
</section>

<!-- Store font data to be picked up by JavaScript -->
<script type="module">
    window.fontProjectData = {
        id: "<?= makeFontID($page) ?>",
        title: "<?= $page->title() ?>",
        testString: <?= json_encode($page->text2()->value()) ?>,
        fonts: {
            <?php foreach ($page->fonts()->toFiles() as $font) : ?> "<?= makeFontCSSName($font) ?>": {
                    url: "<?= $font ?>"
                },
            <?php endforeach ?>
        },
        <?php if (!$page->defaultFont()->isEmpty()) : ?>
            defaultFont: "<?= $page->defaultFont()->toFile()->url() ?>",
        <?php endif ?>
        <?php if (!$page->preserveFontsOrder()->isEmpty()) : ?>
            preserveFontsOrder: <?= $page->preserveFontsOrder() ?>,
        <?php endif ?>
    }
</script>

<!-- Load js only on font template -->
<?= js([
    'assets/js/font.js',
], ['type' => 'module']) ?>

<?php snippet('footer') ?>