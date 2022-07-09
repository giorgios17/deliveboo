<template>
  <!--Sezione tipologie ristoranti-->
  <div id="suggestion_typologies" class="container my-5">
    <div class="row">
      <div v-scrollAnimation class="col-12 text-center">
        <h3>Le cucine più amate</h3>
        <p>
          Trova le cucine più amate dei nostri ristoranti e ordina online a
          domicilio
        </p>
      </div>
    </div>
    <div class="container mt-5">
      <div v-scrollAnimation class="row justify-content-around flex-wrap">
        <div
          class="col-md-3 col-sm-3 col-12 text-center card p-2 mt-2 bg shadow"
        >
          <p class="box_paragraph">Scegli i tui piatti dal menù!</p>
        </div>
        <div
          class="col-md-3 col-sm-3 col-12 text-center card p-2 mt-2 bg shadow"
        >
          <p class="box_paragraph">Ordina da tuo ristorante preferito.</p>
        </div>
        <div
          class="col-md-3 col-sm-3 col-12 text-center card p-2 mt-2 bg shadow"
        >
          <p class="box_paragraph">Prepara il tavolo, arriviamo!</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SuggestionComponent",
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

#suggestion_typologies {
  h3 {
    @include h3($blue);
  }

  p {
    @include p($blue);
  }
  .bg {
    background-color: $blue;
    p.box_paragraph {
      @include p($tortora);
    }
  }
  .before-enter {
    opacity: 0;
    transform: translateY(100%) scale(0.5);
    transition: all 1.5s ease-in-out;
  }
  .enter {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}
</style>