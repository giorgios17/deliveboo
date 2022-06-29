<template>
  <div class="mt-5">Pagina ristoranti</div>
</template>

<script>
export default {
  name: "RestaurantsComponent",
  data() {
    return {
      arrayUsers: [],
      arrayTypologies: [],
    };
  },
  mounted() {
    this.axiosCall("/api/users", this.arrayUsers);
    this.axiosCall("/api/typologies", this.arrayTypologies);
  },
  methods: {
    axiosCall(url, array) {
      window.axios
        .get(url)
        .then((result) => {
          array = result.data.response;
          console.log(array);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
