<template>
  <textarea
    class="w-full mb-2 text-lg text-gray-300 bg-gray-900 outline-none resize-none"
    placeholder="What's happening?"
    autofocus
    :value="value"
    @input="onInput"
  ></textarea>
</template>

<script>
export default {
  props: {
    value: {
      type: null,
    },
  },

  methods: {
    onInput({ target }) {
      this.$emit("input", target.value);
      this.resize(target);
    },

    resize(element) {
      element.style.height = "auto";
      element.style.height = `${element.scrollHeight}px`;
    },
  },
};
</script>
