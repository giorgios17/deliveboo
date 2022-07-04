<template>
  <!--Sezione download-->
  <div class="container my-5">
    <div class="row justify-content-around align-items-center">
      <div class="col-md-6 d-flex flex-column">
        <h3 class="mb-3">SCARICA LA NOSTRA APP!</h3>
        <p class="mb-5">
          Scaricala ora la nostra app e ordina i tuoi pitti preferiti
          comodamente a casa tua! - disponibile su Apple store e Google Play
        </p>
        <div class="row justify-content-around">
          <a
            class="mb-3"
            href="https://apps.apple.com/it/app/deliveroo-consegna-di-cibo/id1001501844"
            ><img
              class="h-100"
              src="../img/App_Store_Badge.svg"
              alt="app store"
            />
          </a>

          <a
            href="https://play.google.com/store/apps/details?id=com.deliveroo.orderapp&hl=it&gl=US"
          >
            <img
              class="h-100"
              src="../img/Google_Play_Store_badge.svg"
              alt="play store"
            />
          </a>
        </div>
      </div>
      <div class="col-md-5 d-none d-md-block">
        <img class="w-100" src="../img/Deliveroo-app_.png" alt="download" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DownloadComponent",
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

h3 {
  @include h3($blue);
}
p {
  @include p($blue);
}
a {
  transition: all 0.5s;
  height: 50px;
}
a:hover {
  transform: scale(1.1);
}

@media screen and (max-width: 350px) {
  a {
    height: 40px;
  }
}
@media screen and (max-width: 200px) {
  a {
    height: 25px;
  }
}
</style>