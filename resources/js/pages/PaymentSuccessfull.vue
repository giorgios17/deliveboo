<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading mb-2">Ordine Effettuato!!</h4>
          <p>
            Grazie per aver acquistato con noi. Il riepilogo del tuo è stato
            inviato all'indirizzo email che hai indicato.
          </p>
          <hr />
          <a href="/" class="btn btn-success">Torna alla Home</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PaymentSuccessfull",
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

.container {
  margin: 15rem auto;

  h4 {
    @include h4(#155724);
  }
  p {
    @include p(#155724);
  }
}
</style>