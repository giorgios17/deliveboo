<template>
  <!--Jumbotron-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 d-flex justify-content-center align-items-center jb">
        <h1 v-scrollAnimation class="h1_jumbo">DELIVEBOO</h1>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "JumboComponent",
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

.jb {
  background-image: url("../img/jumbotron.png");
  background-position: top;
  background-size: cover;
  background-blend-mode: multiply;
  background-color: rgba(0, 0, 0, 0.2);
  h1.h1_jumbo {
    font-size: 60px;
    font-weight: 900;
    color: $blue;
    padding: 350px 0;
  }
  @media screen and (max-width: 768px) {
    h1.h1_jumbo {
      font-size: 40px;
      padding: 200px 0;
    }
  }
  @media screen and (max-width: 300px) {
    h1.h1_jumbo {
      font-size: 25px;
      padding: 200px 0;
    }
  }
  @media screen and (max-width: 200px) {
    h1.h1_jumbo {
      font-size: 15px;
      padding: 200px 0;
    }
  }
  .before-enter {
    opacity: 0;
    transform: translateX(50%);
    transition: all 1.5s ease-in-out;
  }
  .enter {
    opacity: 1;
    transform: translateX(0);
  }
}
</style>