<template>
  <form @submit.prevent="submit" class="flex">
    <div class="mr-3">
      <img :src="$user.avatar" class="w-12 rounded-full" />
    </div>
    <div class="flex-grow">
      <app-tweet-compose-textarea
        v-model="form.body"
      ></app-tweet-compose-textarea>

      <div class="flex justify-between">
        <div>actions</div>
        <div>
          <button
            type="submit"
            class="px-4 py-3 font-bold leading-none text-center text-gray-300 bg-blue-500 rounded-full"
          >
            Tweet
          </button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      form: {},
    };
  },

  methods: {
    async submit() {
      await axios.post("/api/tweets", this.form);
      this.form.body = "";
    },
  },
};
</script>
