<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen.
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */

return [
    'debug' => true,
    'session' => [
        'durationNormal' => 7200,            // default: 2 hours
        'durationLong'   => 1209600,         // default: 2 weeks
        'timeout'        => 1800,            // default: half an hour
        'cookieName'     => 'kirby_session',
        'gcInterval'     => 100
    ],
    'routes' => [
        [
            'pattern' => 'batch-update-content',
            'action' => function () {

                // authorized personnel only
                if (kirby()->user() && kirby()->user()->isAdmin()) {
                    // defining the loop
                    $collection = site()->index(true);
                    foreach ($collection as $page) {
                        if ($page->parent() == "home" && (!$page->isDraft()) && (!$page->content()->fontes()->isEmpty() && $page->content()->fonts()->isEmpty())) {
                            // $newFonts = new Files();
                            $newFonts = array();

                            // turn current value into an array
                            $oldFonts = $page->content()->fontes()->yaml();

                            // change some fields inside the array (NB. the ampersand)
                            foreach ($oldFonts as &$font) {
                                // echo gettype($item['fichier'][0]);
                                $newFonts[] = $font['fichier'][0];
                            }

                            $page->update([
                                'fonts' => $newFonts
                            ]);
                        }
                    }
                }
            }
        ],
    ]
];
