<template>
  <header class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light pt-2">
      <div class="container_img">
        <img class="w-100" src="../img/deliveboo-logo-blue.png" alt="" />
      </div>
      <button
        class="navbar-toggler box_hamburgher"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon hamburgher_menu"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Chi siamo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Lavora con noi</a>
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link" href="#">Carrello</a>
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link" href="/login">Accedi</a>
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link" href="/register">Registrati</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link">
              <div class="d-lg-none d-xl-none">Carrello</div>
              <div class="d-none d-lg-block d-xl-block">
                <i class="fa-solid fa-cart-shopping"></i></div
            ></a>
          </li>
          <li class="nav-item">
            <a href="/login" class="nav-link d-inline-block">Accedi</a>
            /
            <a href="/register" class="nav-link d-inline-block">Registrati</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: "HeaderComponent",
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables.scss";

header {
  background-color: $yellow;

  a {
    font-weight: 700;
    font-size: 17.5px;
    color: $blue !important;
  }
  .container_img {
    width: 100px;
  }
  @media screen and (max-width: 250px) {
    // Sfondo dashboard lato ristoratore
    .container_img {
      width: 75px;
    }
    .box_hamburgher {
      padding: 0rem 0.3rem;
    }

    .hamburgher_menu {
      width: 15px !important;
    }
  }
}
</style>
