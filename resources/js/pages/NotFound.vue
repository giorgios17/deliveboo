<template>
  <div>
    <JumboComponent />
    <div id="not_found" class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-6 col-lg-5 col-xl-4">
                <div v-scrollAnimation class="card">
                    <div class="card-header">
                        <h5 class="card-title">404 Not Found</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <!-- box alert pagina non trovata -->
                            <div class="alert alert-danger" role="alert">
                                La pagina che stai cercando non esiste.
                            </div>
                        </p>
                        <a href="/" class="btn btn-danger">Torna alla Home</a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
  </div>
</template>

<script>
import JumboComponent from "../components/JumboComponent.vue";
export default {
  name: "NotFound",
  components: {
    JumboComponent,
  },
};
</script>

<style lang="scss" scoped>
// importato file parziali scss
@import "/resources/sass/_resets";
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

#not_found {
  .card-header {
    background-color: $red;
    color: $tortora;

    h5 {
      @include h5($tortora);

      margin: 0 !important;
    }
  }

  margin: 100px 0;

  .enter {
    animation: trill 1s ease-in-out;
  }

  @keyframes trill {
    0% {
      transform: rotate(0deg);
    }
    10% {
      transform: rotate(10deg);
    }
    20% {
      transform: rotate(-10deg);
    }
    30% {
      transform: rotate(10deg);
    }
    40% {
      transform: rotate(-10deg);
    }
    50% {
      transform: rotate(10deg);
    }
    60% {
      transform: rotate(-10deg);
    }
    70% {
      transform: rotate(10deg);
    }
    80% {
      transform: rotate(-10deg);
    }
    90% {
      transform: rotate(10deg);
    }
    100% {
      transform: rotate(0deg);
    }
  }
}
</style>