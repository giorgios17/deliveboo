<template>
  <div class="container">
    <div class="row m-top100 mb-5 justify-content-between g-5">
      <div
        v-for="(restaurant, index) in arrayUsers"
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
          <a href="#" class="btn btn-primary">Vai al ristorante</a>
        </div>
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
    this.callRestaurants("/api/users");
    this.callTypologies("/api/typologies");
  },
  methods: {
    //chiamata axios ristoranti
    callRestaurants(url) {
      window.axios
        .get(url)
        .then((result) => {
          this.arrayUsers = result.data.response;
          //   this.arrayUsers = restaurants.filter((restaurant) =>
          //     restaurant.typol.includes("food")
          //   );
          console.log(this.arrayUsers);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    //chiamata axios tipologie
    callTypologies(url) {
      window.axios
        .get(url)
        .then((result) => {
          this.arrayTypologies = result.data.response;
          console.log(this.arrayTypologies);
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
