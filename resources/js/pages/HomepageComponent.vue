<template>
  <div>
    <!--Jumbotron-->
    <JumboComponent />
    <!--Sezione tipologie ristoranti-->
    <SuggestionComponent />

    <!-- Card Tipologie -->
    <TypologyCard
      @getTypologies="getTypologies"
      :arrayTypologies="arrayTypologies"
    />

    <!-- Card Ristoranti -->
    <RestaurantCard :arrayRestaurants="arrayRestaurants" />

    <!--Sezione recensioni-->
    <CarouselComponent />
    <!-- <CarouselComponent class="d-sm-none d-md-block" /> -->

    <!--Sezione download-->
    <DownloadComponent />
  </div>
</template>

<script>
import TypologyCard from "../components/TypologyCard.vue";
import CarouselComponent from "../components/CarouselComponent.vue";
import JumboComponent from "../components/JumboComponent.vue";
import SuggestionComponent from "../components/SuggestionComponent.vue";
import RestaurantCard from "../components/RestaurantCard.vue";
import DownloadComponent from "../components/DownloadComponent.vue";

export default {
  name: "HomepageComponent",
  components: {
    TypologyCard,
    CarouselComponent,
    JumboComponent,
    SuggestionComponent,
    RestaurantCard,
    DownloadComponent,
  },
  data() {
    return {
      arrayTypologies: [],
      arrayRestaurants: [],
    };
  },
  mounted() {
    this.axiosCall("/api/typologies");
  },
  methods: {
    axiosCall(url) {
      window.axios
        .get(url)
        .then((result) => {
          this.arrayTypologies = result.data.response;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getTypologies: function (typologies) {
      if (typologies) {
        this.axiosCallFilterRestaurants(typologies);
      } else {
        this.arrayRestaurants = [];
      }
    },
    axiosCallFilterRestaurants(typologies) {
      let params = JSON.stringify(typologies);
      window.axios
        .get("/api/restaurants/filter/" + params)
        .then((result) => {
          this.arrayRestaurants = result.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
