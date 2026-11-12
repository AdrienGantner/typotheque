<?php

Kirby::plugin('fontsregistering/fontswow', [
    'fileTypes' => [
        'woff' => [
            'mime' => 'font/woff',
            'type' => 'document',
        ],
        'woff2' => [
            'mime' => 'font/woff2',
            'type' => 'document',
        ],
        'ttf' => [
            'mime' => 'font/ttf',
            'type' => 'document',
        ],
        'otf' => [
            'mime' => 'font/otf',
            'type' => 'document',
        ],
        'zip' => [
            'type' => 'document',
        ],
    ]
]);
