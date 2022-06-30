<template>
  <div>
    <img :src="'storage' + restaurant.image" :alt="restaurant.name" />
    <h1>{{ restaurant.business_name }}</h1>
    <p>Orario apertura {{ restaurant.opening_time }}</p>
    <p>Orario chiusura {{ restaurant.closing_time }}</p>
    <p>Giorno di chiusura: {{ restaurant.closing_day }}</p>
    <p>{{ restaurant.description }}</p>
    <div class="col-md-3 col-sm-3 col-12 text-center card p-2 mt-2 bg">
      <p>Seleziona il tuo piatto preferito</p>
    </div>
    <div class="row justify-content-center my-5">
      <div
        v-for="(plate, index) in restaurant.plate"
        :key="index"
        class="card m-3"
        style="width: 18rem"
      >
        <img :src="plate.image" class="card-img-top" :alt="plate.name" />
        <div class="card-body">
          <h4 class="card-title">{{ plate.name }}</h4>
          <p class="card-text">{{ plate.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantComponent",
  data() {
    return {
      restaurant: [],
    };
  },
  mounted() {
    this.getRestaurant();
  },
  methods: {
    getRestaurant() {
      const slug = this.$route.params.slug;
      console.log("parametro slug" + slug);
      window.axios
        .get("/api/users/" + slug)
        .then(({ data }) => {
          console.log(data);
          this.restaurant = data;
          console.log(this.restaurant);
        })
        .catch((e) => console.log(e));
    },
  },
};
</script>

<style lang="scss" scoped>
.bg {
  background-color: #003049;
  color: hsl(53deg 37% 77%);
}
</style>
