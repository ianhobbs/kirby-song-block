<?php if ($file = $block->source()->toFile()): ?>
<div class="block-<?= $block->type() ?>">
  <?php if ($poster = $block->poster()->toFile()): ?>
  <figure class="song-poster">
    <?= $poster->crop(200, 200) ?>
  </figure>
  <?php endif ?>
  <div class="song-info">
    <h1 class="song-title"><?= $block->title()->html() ?></h1>
    <h2 class="song-subtitle"><?= $block->subtitle()->html() ?></h2>
    <div class="song-description">
      <?= $block->description() ?>
    </div>
    <audio class="song-element"
      <?= $block->controls()->isTrue() ? 'controls' : '' ?>
      <?= $block->autoplay()->isTrue() ? 'autoplay' : '' ?>
    >
      <source src="<?= $file->url()?>" type="<?= $file->mime() ?>">
      Your browser does not support the <code>audio</code> element.
    </audio>
  </div>
</div>
<?php endif ?>