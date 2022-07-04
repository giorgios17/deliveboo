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

    <!--Sezione download-->
    <div class="container my-5">
      <div class="row justify-content-between">
        <div class="col-12 col-md-5 px-5">
          <h3 class="mb-3">SCARICA LA NOSTRA APP!</h3>
          <p>
            Scaricala ora la nostra app e ordina i tuoi pitti preferiti
            comodamente a casa tua! - disponibile su Apple store e Google Play
          </p>
          <div class="row">
            <div class="col-12 col-md-6 d-flex justify-content-center py-5">
              <a
                href="https://apps.apple.com/it/app/deliveroo-consegna-di-cibo/id1001501844"
                ><img
                  class="download_logo"
                  src="../img/App_Store_Badge.svg"
                  alt="app store"
                />
              </a>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center py-5">
              <a
                href="https://play.google.com/store/apps/details?id=com.deliveroo.orderapp&hl=it&gl=US"
              >
                <img
                  class="download_logo"
                  src="../img/Google_Play_Store_badge.svg"
                  alt="play store"
                />
              </a>
            </div>
          </div>
        </div>
        <div class="col-5 d-none d-md-block d-lg-block">
          <img
            class="download_cover"
            src="../img/Deliveroo-app_.png"
            alt="download"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TypologyCard from "../components/TypologyCard.vue";
import CarouselComponent from "../components/CarouselComponent.vue";
import JumboComponent from "../components/JumboComponent.vue";
import SuggestionComponent from "../components/SuggestionComponent.vue";
import RestaurantCard from "../components/RestaurantCard.vue";

export default {
  name: "HomepageComponent",
  components: {
    TypologyCard,
    CarouselComponent,
    JumboComponent,
    SuggestionComponent,
    RestaurantCard,
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

<style lang="scss" scoped>
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

.bg {
  background-color: #003049;
  color: hsl(53deg 37% 77%);
}
.download_logo {
  width: 100%;
}
a {
  transition: all 0.5s;
}
a:hover {
  transform: scale(1.1);
}
.download_cover {
  width: 100%;
  border-radius: 10px;
}
</style>
