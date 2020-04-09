<template>
  <div class="flex w-full">
    <img :src="tweet.user.avatar" class="w-12 h-12 rounded-full" />
    <div class="mr-3"></div>
    <div>
      <app-tweet-username :user="tweet.user"></app-tweet-username>
      <p class="text-gray-300 whitespace-pre-wrap">{{ tweet.body }}</p>
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
