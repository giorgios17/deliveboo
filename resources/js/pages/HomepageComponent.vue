<template>
  <div>
    <!--Jumbotron-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center jb">
          <h1>DELIVEBOO</h1>
        </div>
      </div>
    </div>

    <!--Sezione tipologie ristoranti-->
    <div class="container my-5">
      <div class="row">
        <div class="col-12 text-center">
          <h3>Le cucine più amate</h3>
          <p>
            Trova le cucine più amate dei nostri ristoranti e ordina online a
            domicilio
          </p>
        </div>
      </div>

      <div class="container mt-5">
        <div class="row justify-content-around flex-wrap">
          <div class="col-md-3 col-sm-3 col-12 text-center card p-2 mt-2 bg">
            <p>Scegli i tui piatti dal menù!</p>
          </div>
          <div class="col-md-3 col-sm-3 col-12 text-center card p-2 mt-2 bg">
            Ordina da tuo ristorante preferito.
          </div>
          <div class="col-md-3 col-sm-3 col-12 text-center card p-2 mt-2 bg">
            Prepara il tavolo, arriviamo!
          </div>
        </div>
      </div>
    </div>

    <TypologyCard
      @getTypologies="getTypologies"
      :arrayTypologies="arrayTypologies"
    />

    <div class="container" v-if="arrayRestaurants.length > 0">
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

export default {
  name: "HomepageComponent",
  components: {
    TypologyCard,
    CarouselComponent,
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
.jb {
  background-image: url("../img/jumbotron.png");
  background-position: top;
  background-size: cover;
  h1 {
    font-size: 60px;
    font-weight: 800;
    padding: 350px 0;
  }
}
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
