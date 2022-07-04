<template>
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
</template>

<script>
export default {
  name: "DownloadComponent",
};
</script>

<style lang="scss" scoped>
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