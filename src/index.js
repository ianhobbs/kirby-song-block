import Song from './components/Song.vue';

panel.plugin("ianhobbs/song-block", {
  blocks: {
    song: Song
  },
  icons: {
    // the Panel icon set has no pause icon
    "song-pause": '<path d="M6 5h2v14H6V5zm10 0h2v14h-2V5z"/>'
  }
});