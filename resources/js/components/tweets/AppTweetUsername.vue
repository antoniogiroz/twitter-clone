<template>
  <span class="text-gray-300 font-bold">
    {{ user.name }}
    <span class="text-gray-600 font-normal">@{{ user.username }}</span>
  </span>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
      required: true
    }
  }
};
</script>
