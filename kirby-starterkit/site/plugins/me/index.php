<?php

Kirby::plugin('me/page-methods', [
 'pageMethods' => [
    'taglist' => function () {
        $tags = site()->index()->pluck('tags', ',', true);
        $list = '<ul>';
        foreach($tags as $tag) {
            $list .= '<li>' .  $tag . '</li>';
        }
        $list .= '</ul>';
        return $list;
    }
  ]
]);
