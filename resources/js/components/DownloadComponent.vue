<template>
  <!--Sezione download-->
  <div class="container my-5">
    <div class="row justify-content-around align-items-center">
      <div class="col-md-6 d-flex flex-column">
        <h3 v-scrollAnimation class="mb-3">SCARICA LA NOSTRA APP!</h3>
        <p v-scrollAnimation class="mb-5">
          Scaricala ora la nostra app e ordina i tuoi pitti preferiti
          comodamente a casa tua! - disponibile su Apple store e Google Play
        </p>
        <div class="row justify-content-around">
          <a
            v-scrollAnimation
            class="mb-3"
            href="https://apps.apple.com/it/app/deliveroo-consegna-di-cibo/id1001501844"
            ><img
              class="h-100"
              src="../img/App_Store_Badge.svg"
              alt="app store"
            />
          </a>

          <a
            v-scrollAnimation
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
        <img
          v-scrollAnimation
          class="w-100"
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
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

h3 {
  @include h3($blue);
}
p {
  @include p($blue);
}

h3,
p {
  &.before-enter {
    opacity: 0;
    transform: translateY(50%) scale(0.5);
    transition: all 1.5s ease-in-out;
  }
  &.enter {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

a {
  transition: all 0.5s ease-in-out;
  height: 50px;

  &.before-enter {
    opacity: 0;
    transform: translateY(25%) rotateX(270deg) scale(0.5);
    transition: all 1.5s ease-in-out;
  }
  &.enter {
    opacity: 1;
    transform: translateY(0) rotateX(0deg) scale(1);
  }
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

img {
  &.before-enter {
    opacity: 0;
    transform: translateX(25%) rotateZ(270deg);
    transition: all 1.5s ease-in-out;
  }
  &.enter {
    opacity: 1;
    transform: translateX(0) rotateZ(0deg);
  }
}
</style>