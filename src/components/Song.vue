<template>
  <k-block-figure
    :is-empty="!source.url"
    empty-icon="audio-file"
    empty-text="No file selected yet …"
    @open="open"
    @update="update"
  >
    <div class="k-block-type-song-wrapper">
      <div>
        <k-frame
          class="k-block-type-song-poster"
          :cover="true"
          ratio="1/1"
        >
          <img
            v-if="poster.url"
            :src="poster.url"
            alt=""
          >
        </k-frame>
      </div>
      <div @dblclick.stop>
        <k-writer
          :inline="true"
          :marks="false"
          :placeholder="field('title').placeholder"
          :value="content.title"
          class="k-block-type-song-title"
          @input="update({ title: $event })"
        />
        <k-writer
          :inline="true"
          :marks="false"
          :placeholder="field('subtitle').placeholder"
          :value="content.subtitle"
          class="k-block-type-song-subtitle"
          @input="update({ subtitle: $event })"
        />
        <k-writer
          :inline="true"
          :marks="false"
          :placeholder="field('description').placeholder"
          :value="content.description"
          class="k-block-type-song-description"
          @input="update({ description: $event })"
        />
        <audio class="k-block-type-song-element" controls>
          <source :src="source.url" :type="mime">
        </audio>
      </div>
    </div>
  </k-block-figure>
</template>

<script>
export default {
  data() {
    return {
      mime: null
    };
  },
  computed: {
    poster() {
      return this.content.poster[0] || {};
    },
    source() {
      return this.content.source[0] || {};
    }
  },
  watch: {
    "source.link": {
      handler (link) {
        if (link) {
          this.$api.get(link).then(file => {
            this.mime = file.mime;
          });
        }
      },
      immediate: true
    }
  }
};
</script>

<style lang="scss">
.k-block-type-song-wrapper {
  display: flex;
  padding: 1rem;
  background: black;
  color: white;
}
.k-block-type-song-poster {
  width: 12rem;
  margin-right: 1rem;
  background: #333;
}
.k-block-type-song-title,
.k-block-type-song-subtitle {
  font-size: 1.5rem;
}
.k-block-type-song-title {
  font-weight: 600;
}
.k-block-type-song-subtitle {
  margin-bottom: 1rem;
  color: #999;
}
.k-block-type-song-description {
  line-height: 1.5;
}
.k-block-type-song-element {
  margin-top: 2rem;
  height: 2rem;
}
</style>