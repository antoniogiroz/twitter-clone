<template>
  <div
    class="inline-block w-full p-4 border-b border-gray-800 hover:bg-gray-800"
  >
    <component
      :is="`app-tweet-variant-${tweet.type}`"
      :tweet="tweet"
    ></component>
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
