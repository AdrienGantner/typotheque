<?php

Kirby::plugin('fontsregistering/fontswow', [
  'fileTypes' => [
    'woff' => [
      'mime' => 'fonts/woff',
      'type' => 'document',
    ],
    'woff2' => [
      'mime' => 'fonts/woff2',
      'type' => 'document',
    ],
    'ttf' => [
      'mime' => 'fonts/sfnt',
      'type' => 'document',
    ],
    'zip' => [
      'type' => 'document',
    ],
  ]
]);
