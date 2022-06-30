<template>
  <div class="row m-top100 mb-5 justify-content-between g-5">
    <div
      v-for="(restaurant, index) in arrayRestaurants"
      :key="index"
      class="card mb-3"
      style="width: 18rem"
    >
      <img
        :src="'storage' + restaurant.image"
        class="card-img-top"
        :alt="restaurant.business_name"
      />
      <div class="card-body">
        <h5 class="card-title">{{ restaurant.business_name }}</h5>
        <p class="card-text">
          {{ restaurant.description }}
        </p>
        <router-link
          :to="{ name: 'restaurant', params: { slug: restaurant.slug } }"
          class="btn btn-primary"
          >Vai al ristorante
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TypologiesRestaurants",
  data() {
    return {
      arrayRestaurants: [],
    };
  },
  mounted() {
    this.axiosCall();
  },
  methods: {
    axiosCall() {
      const id = this.$route.params.id;
      window.axios
        .get("/api/filtered/" + id)
        .then((result) => {
          this.arrayRestaurants = result.data.response[0].user;
          console.log(this.arrayRestaurants);
        })
        .catch((e) => console.log(e));
    },
  },
};
</script>

<style lang="scss" scoped>
</style>