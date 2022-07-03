<template>
   <div id="not_found" class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
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
</template>

<script>
export default {
  name: "NotFound",
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
}
</style>