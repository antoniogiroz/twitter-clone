<template>
  <div>
    <app-tweet
      v-for="tweet in tweets"
      :key="tweet.id"
      :tweet="tweet"
    ></app-tweet>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tweets: []
    };
  },

  mounted() {
    this.getTweets();
  },

  methods: {
    async getTweets() {
      const { data } = await axios.get("/api/timeline");
      this.tweets = data.data;
    }
  }
};
</script>
