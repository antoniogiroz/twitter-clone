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
import { mapGetters, mapActions } from 'vuex';

export default {
  computed: {
    ...mapGetters({
      tweets: 'timeline/tweets'
    })
  },

  mounted() {
    this.getTweets();
  },

  methods: {
    ...mapActions({
      getTweets: 'timeline/getTweets'
    })
  }
};
</script>
