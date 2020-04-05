<template>
  <div>
    <app-tweet
      v-for="tweet in tweets"
      :key="tweet.id"
      :tweet="tweet"
    ></app-tweet>
    <div v-if="tweets.length" v-observe-visibility="handleScrolledToBottomOfTimeline"></div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  data() {
    return {
      page: 1,
      lastPage: 1
    }
  },

  computed: {
    ...mapGetters({
      tweets: 'timeline/tweets'
    })
  },

  mounted() {
    this.loadTweets();
  },

  methods: {
    ...mapActions({
      getTweets: 'timeline/getTweets'
    }),

    handleScrolledToBottomOfTimeline(isVisible) {
      if (!isVisible) {
        return;
      }

      if (this.lastPage === this.page) {
        return;
      }

      this.page++;

      this.loadTweets();
    },

    async loadTweets() {
      const { meta } = await this.getTweets({ page: this.page });
      this.lastPage = meta.last_page;
    }
  }
};
</script>
