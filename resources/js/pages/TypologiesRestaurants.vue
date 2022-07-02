<template>
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-12 text-center my-4">
        <h3>SELZIONA IL RISTORANTE</h3>
        <p>Seleziona il ritorante più adatto alle tue esigenze!</p>
      </div>
      <div
        v-for="(restaurant, index) in arrayRestaurants"
        :key="index"
        class="card my-4"
        style="width: 20rem"
      >
        <img
          :src="'/storage/' + restaurant.image"
          class="card-img-top"
          :alt="restaurant.business_name"
        />
        <div class="card-body">
          <h5 class="card-title">{{ restaurant.business_name }}</h5>
          <p class="card-text my-2">
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
