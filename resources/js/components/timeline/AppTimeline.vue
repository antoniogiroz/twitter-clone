<template>
  <div>
    <div class="p-4 border-b-8 border-gray-800">
      <app-tweet-compose></app-tweet-compose>
    </div>
    <app-tweet
      v-for="tweet in tweets"
      :key="tweet.id"
      :tweet="tweet"
    ></app-tweet>
    <div
      v-if="tweets.length"
      v-observe-visibility="handleScrolledToBottomOfTimeline"
    ></div>
  </div>
</template>

<script>
import { mapGetters, mapMutations, mapActions } from "vuex";

export default {
  data() {
    return {
      page: 1,
      lastPage: 1,
    };
  },

  computed: {
    ...mapGetters({
      tweets: "timeline/tweets",
    }),
  },

  mounted() {
    this.loadTweets();

    Echo.private(`timeline.${this.$user.id}`).listen(
      ".TweetCreated",
      (tweet) => {
        this.pushTweets([tweet]);
      }
    );
  },

  methods: {
    ...mapMutations({
      pushTweets: "timeline/pushTweets",
    }),

    ...mapActions({
      getTweets: "timeline/getTweets",
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
    },
  },
};
</script>
