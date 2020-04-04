<template>
  <div class="container">
    {{ user }}
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: null
    }
  },

  mounted() {
    this.getUser();
  },

  methods: {
    async getUser() {
      const response = await axios.get('api/user');
      this.user = response.data;
    }
  }
};
</script>
