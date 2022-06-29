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
        <div class="col-12">
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

    <TypologyCard :arrayTypologies="arrayTypologies" />

    <!--Sezione recensioni-->
    <div class="container-fluid py-5 text-center bg">
      <h1>SLIDER RECENSIONI</h1>
    </div>

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
            <div class="col-6 d-flex justify-content-center py-5">
              <img
                class="download_logo"
                src="../img/App_Store_Badge.svg"
                alt="app store"
              />
            </div>
            <div class="col-6 d-flex justify-content-center py-5">
              <img
                class="download_logo"
                src="../img/Google_Play_Store_badge.svg"
                alt="play store"
              />
            </div>
          </div>
        </div>
        <div class="col-5 d-none d-md-block d-lg-block">
          <img
            class="download_cover"
            src="../img/download-cover.png"
            alt="download"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TypologyCard from "../components/TypologyCard.vue";

export default {
  name: "HomepageComponent",
  components: {
    TypologyCard,
  },
  data() {
    return {
      arrayTypologies: [],
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
  },
};
</script>

<style lang="scss" scoped>
.jb {
  background-image: url(../img/background-hp.jpg);
  background-position: bottom;
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
  //background-color: #fcbf49;
  //color: #003049;
}
.download_logo {
  width: 80%;
}
.download_cover {
  width: 100%;
  height: 100%;
  border-radius: 10px;
}
</style>
