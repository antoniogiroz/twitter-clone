<template>
  <ul class="flex justify-between mt-4">
    <li>
      <app-tweet-reply-action :tweet="tweet"></app-tweet-reply-action>
    </li>
    <li>
      <app-tweet-retweet-action :tweet="tweet"></app-tweet-retweet-action>
    </li>
    <li>
      <app-tweet-like-action :tweet="tweet"></app-tweet-like-action>
    </li>
  </ul>
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
