<template>
  <div class="container my-5">
    <div class="row">
      <div
        class="col-lg-3 col-md-4 col-sm-6 col-12 text-center my-3"
        v-for="(restaurant, index) in arrayUsers"
        :key="index"
      >
        <h1>{{ restaurant.business_name }}</h1>
      </div>
    </div>
  </div>
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
