<?php

// Colours picked in the Panel are exposed as --song-bg / --song-text on
// the wrapper; style them in your own CSS. Values are checked against a
// colour-safe character allowlist before going into the style attribute.
$color = function ($field): ?string {
  $value = trim($field->value() ?? '');
  return preg_match('/^[#a-zA-Z0-9(),.%\s\/-]+$/', $value) === 1 ? $value : null;
};

$styles  = [];
$classes = ['block-' . $block->type()];

if ($bg = $color($block->bgcolor())) {
  $styles[] = '--song-bg: ' . $bg;
}

if ($tx = $color($block->textcolor())) {
  $styles[] = '--song-text: ' . $tx;
}

$poster     = $block->poster()->toFile();
$background = $poster !== null && $block->layout()->value() === 'background';

if ($background === true) {
  // SVG and other non-resizable images are used as-is
  $url       = $poster->isResizable() ? $poster->resize(1200)->url() : $poster->url();
  $classes[] = 'block-song--background';
  $styles[]  = "background-image: url('" . str_replace("'", '%27', $url) . "')";
}

?>
<?php if ($file = $block->source()->toFile()): ?>
<div <?= attr(['class' => implode(' ', $classes), 'style' => $styles !== [] ? implode('; ', $styles) : null]) ?>>
  <?php if ($poster !== null && $background === false): ?>
  <figure class="song-poster">
    <?= $poster->isResizable() ? $poster->crop(200, 200) : $poster ?>
  </figure>
  <?php endif ?>
  <div class="song-info">
    <h1 class="song-title"><?= $block->title() ?></h1>
    <h2 class="song-subtitle"><?= $block->subtitle() ?></h2>
    <div class="song-description">
      <?= $block->description() ?>
    </div>
    <audio class="song-element"
      <?= $block->controls()->isTrue() ? 'controls' : '' ?>
      <?= $block->autoplay()->isTrue() ? 'autoplay' : '' ?>
    >
      <source src="<?= $file->url() ?>" type="<?= $file->mime() ?>">
      Your browser does not support the <code>audio</code> element.
    </audio>
  </div>
</div>
<?php endif ?>
