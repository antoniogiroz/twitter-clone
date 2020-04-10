<template>
  <div class="flex w-full">
    <img :src="tweet.user.avatar" class="w-12 h-12 mr-3 rounded-full" />

    <div class="flex-grow">
      <app-tweet-username :user="tweet.user"></app-tweet-username>
      <p class="text-gray-300 whitespace-pre-wrap">{{ tweet.body }}</p>

      <app-tweet-action-group></app-tweet-action-group>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    tweet: {
      type: Object,
      required: true,
    },
  },
};
</script>
