<template>
  <!-- Card Ristoranti -->
  <div class="container" v-if="arrayRestaurants.length > 0">
    <div v-scrollAnimation class="row justify-content-center">
      <div class="col-md-6 text-center">
        <h3 class="p-4 mb-3 shadow">RISTORANTI</h3>
        <p>Seleziona il ritorante più adatto alle tue esigenze!</p>
      </div>
    </div>

    <div class="row justify-content-center my-5">
      <div
        v-scrollAnimation
        v-for="restaurant in arrayRestaurants"
        :key="restaurant.id"
        class="card m-3"
        style="width: 18rem"
      >
        <div class="wrapper_img p-3">
          <img
            :src="'/storage/' + restaurant.image"
            class="card-img-top h-100 w-100"
            :alt="restaurant.business_name"
          />
        </div>
        <div class="card-body d-flex flex-wrap">
          <h4 class="card-title mb-2 col-12">{{ restaurant.business_name }}</h4>
          <h6 class="col-12">Categorie:</h6>
          <div
            class="d-inline-block mb-2"
            v-for="(typology, index) in restaurant.typology"
            :key="index"
          >
            <p
              class="d-inline-block"
              v-if="index != restaurant.typology.length - 1"
            >
              {{ typology.name }},
            </p>
            <p
              class="d-inline-block"
              v-if="index == restaurant.typology.length - 1"
            >
              {{ typology.name }}.
            </p>
          </div>

          <p class="card-text mb-3 col-12">{{ restaurant.description }}</p>
          <router-link
            @click.native="scrollTop()"
            tag="button"
            :to="{ name: 'restaurant', params: { slug: restaurant.slug } }"
            class="btn btn-primary col-12 align-self-end"
            >Vai al ristorante
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantCard",
  props: {
    arrayRestaurants: Array,
  },
  methods: {
    scrollTop() {
      window.scrollTo(0, 0);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_resets";
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

.col-md-6 {
  h3 {
    border-radius: 10px;
    background-color: $tortora;
    @include h3($blue);
  }
  p {
    @include p($blue);
  }
}

.wrapper_img {
  height: 180px;
  background-color: $tortora;

  img {
    object-fit: cover;
    object-position: top;
  }
}

.card-body {
  h4 {
    @include h4($blue);
  }
  h6 {
    @include h6($blue);
  }
  p {
    @include p($blue);
  }
  button {
    @include button(
      none,
      $tortora,
      $tortora,
      1rem,
      600,
      0.4rem 1.5rem,
      $yellow,
      $blue
    );
  }
}

@media screen and (max-width: 250px) {
  h3 {
    font-size: 1rem !important;
  }
}
@media screen and (max-width: 190px) {
  h3 {
    font-size: 0.6rem !important;
  }
}

.before-enter {
  opacity: 0;
  transform: translateY(50%) scale(0.5);
  transition: all 1.5s ease-in-out;
}
.enter {
  opacity: 1;
  transform: translateY(0) scale(1);
}
</style>
