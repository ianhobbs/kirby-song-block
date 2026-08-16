<?php

Kirby::plugin('ianhobbs/song-block', [
  'blueprints' => [
    'blocks/song' => __DIR__ . '/blueprints/blocks/song.yml',
    'files/audio'  => __DIR__ . '/blueprints/files/audio.yml',
    'files/poster' => __DIR__ . '/blueprints/files/poster.yml',
  ],
  'snippets' => [
    'blocks/song' => __DIR__ . '/snippets/blocks/song.php',
  ],
]);