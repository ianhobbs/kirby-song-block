# Song Block for Kirby

An extended audio block for [Kirby](https://getkirby.com): an audio player with a poster image, title, subtitle and rich-text description — with a live preview in the Panel.

## Features

- 🎵 Audio file picker/upload (mp3, m4a, ogg, wav)
- 🖼 Square poster image with automatic cropping
- ✏️ Inline-editable title, subtitle and description directly in the Panel preview
- ⚙️ Settings for player controls and autoplay
- 🧩 Frontend snippet included — override it in your site to customize markup

## Requirements

- Kirby 4 or Kirby 5

## Installation

### Composer

```bash
composer require ianhobbs/song-block
```

### Git submodule

```bash
git submodule add https://github.com/ian-hobbs/song-block.git site/plugins/song-block
```

### Manual

Download and copy this repository to `/site/plugins/song-block`.

## Usage

Add the block to a `blocks` field in your blueprint:

```yml
fields:
  text:
    type: blocks
    fieldsets:
      - song
      # ... your other blocks
```

The block renders on the frontend via the bundled snippet (`snippets/blocks/song.php`). To customize the markup, copy it to `site/snippets/blocks/song.php` and edit it there — your version takes precedence.

### Fields

| Field | Type | Notes |
| --- | --- | --- |
| `source` | files | Audio file (uses the `audio` file blueprint) |
| `poster` | files | Poster image (uses the `poster` file blueprint) |
| `title` | text | Song title |
| `subtitle` | text | e.g. artist or album |
| `description` | writer | Supports bold and italic |
| `controls` | toggle | Show player controls (default: on) |
| `autoplay` | toggle | Add the `autoplay` attribute (default: off) |

> **Note on autoplay:** modern browsers block audio autoplay with sound until the user has interacted with the page. Treat the autoplay setting as a hint — playback may not start automatically.

## Development

```bash
npm install
npm run dev    # watch mode
npm run build  # production build (index.js / index.css)
```

Built with [kirbyup](https://github.com/johannschopplich/kirbyup).

## License

[MIT](LICENSE) © Ian Hobbs
