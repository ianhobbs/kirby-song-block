# Song Block for Kirby CMS

A song block for [Kirby](https://getkirby.com): an audio player with a poster image, title, subtitle, rich-text description and colours — with a live preview in the Panel.

Registered as the block type `song`. For a general-purpose audio player block with a shipped stylesheet and design tokens, see [ianhobbs/audio-block](https://github.com/ianhobbs/kirby-audio-block) (block type `audio-player`). The two plugins are independent and can be installed side by side.

## Features

- 🎵 Audio file picker/upload (mp3, m4a, ogg, wav)
- 🖼 Poster image (jpg, png, webp, svg), shown beside the text or as a full background behind the player
- 🎨 Optional background and text colour per block
- ✏️ Inline-editable title, subtitle and description directly in the Panel preview
- ⚙️ Settings for poster layout, player controls and autoplay
- 🧩 Frontend snippet included — override it in your site to customize markup

## Requirements

- Kirby 4 or Kirby 5
- PHP 8.1+

## Installation

### Composer

```bash
composer require ianhobbs/song-block
```

### Git submodule

```bash
git submodule add https://github.com/ianhobbs/kirby-song-block.git site/plugins/song-block
```

### Manual

Download and copy this repository to `/site/plugins/song-block`.

## Usage

Add the block to a `blocks` or `layout` field in your blueprint:

```yml
fields:
  text:
    type: blocks
    fieldsets:
      - song
      # ... your other blocks
```

The block renders on the frontend via the bundled snippet (`snippets/blocks/song.php`). To customize the markup, copy it to `site/snippets/blocks/song.php` and edit it there — your version takes precedence. The same goes for the blueprint: `site/blueprints/blocks/song.yml` overrides the plugin's.

### Fields

| Field | Type | Notes |
| --- | --- | --- |
| `source` | files | Audio file (uses the `audio` file blueprint) |
| `poster` | files | Poster image (uses the `poster` file blueprint) |
| `title` | writer | Song title (inline, no marks) |
| `subtitle` | writer | e.g. artist or album (inline, no marks) |
| `description` | writer | Supports bold and italic |
| `bgcolor` | color | Optional background colour |
| `textcolor` | color | Optional text colour |
| `layout` | toggles | Poster `side` (default) or `background` |
| `controls` | toggle | Show player controls (default: on) |
| `autoplay` | toggle | Add the `autoplay` attribute (default: off) |

> **Note on autoplay:** modern browsers block audio autoplay with sound until the user has interacted with the page. Treat the autoplay setting as a hint — playback may not start automatically.

### Styling

The plugin ships no front-end CSS. The snippet outputs these hooks for your stylesheet:

- Wrapper `.block-song`; with the background layout also `.block-song--background` and an inline `background-image` (resizable images scaled to 1200px wide, SVG used as-is). Add `background-size: cover` etc. in your CSS.
- Colours picked in the Panel as inline custom properties `--song-bg` and `--song-text` on the wrapper, only when set.
- `.song-poster`, `.song-info`, `.song-title`, `.song-subtitle`, `.song-description`, `.song-element`.

To make `background` the default layout on your site, override the blueprint and set `default: background` on the `layout` field. Blocks saved before the option existed have no stored value and follow the blueprint default, in the Panel preview too.

## Changelog

- **1.1.0** – Maintained again (no longer marked abandoned). Poster layout option (beside text or background) in the snippet and Panel preview, optional background/text colours, SVG posters, colour sanitising, Kirby 4–5 constraint.
- **1.0.3** – Marked abandoned in favour of ianhobbs/audio-block (reverted in 1.1.0).

## Development

```bash
npm install
npm run dev    # watch mode
npm run build  # production build (index.js / index.css)
```

Built with [kirbyup](https://github.com/johannschopplich/kirbyup). The build output `index.js` / `index.css` is committed, so installing the plugin needs no build step.

## License

[MIT](LICENSE) © Ian Hobbs
