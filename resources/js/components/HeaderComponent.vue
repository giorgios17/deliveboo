<template>
  <header>
    <nav class="container navbar navbar-expand-lg navbar-light pt-2">
      <a class="container_img d-block" href="/">
        <img class="w-100" src="../img/deliveboo-logo-blue.png" alt="" />
      </a>
      <!-- inizio hamburger menu -->
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
          <li class="nav-item">
            <router-link class="nav-link text-center" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link text-center" to="/about-us"
              >Chi siamo</router-link
            >
          </li>
          <li class="nav-item">
            <router-link class="nav-link text-center" to="/work-with-us"
              >Lavora con noi</router-link
            >
          </li>
          <li class="nav-item d-lg-none">
            <router-link class="nav-link text-center" :to="{ name: 'cart' }"
              >Carrello</router-link
            >
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link text-center" href="/login">Accedi</a>
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link text-center" href="/register">Registrati</a>
          </li>
        </ul>
      </div>
      <!-- fine hamburger menu -->
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item d-flex align-items-center">
            <router-link to="/cart"
              ><i class="fa-solid fa-lg fa-cart-shopping"></i
            ></router-link>
          </li>
          <li
            class="
              ml-4
              nav-item
              d-flex
              flex-wrap flex-column
              align-items-center
            "
          >
            <p>Sei un ristoratore?</p>
            <p>
              <a href="/login" class="nav-link d-inline-block">Accedi</a>
              /
              <a href="/register" class="nav-link d-inline-block">Registrati</a>
            </p>
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
@import "/resources/sass/_mixin.scss";

header {
  background-color: $yellow;

  h5 {
    @include h5($blue);
  }

  h6 {
    @include h6($blue);
    font-size: 1rem;
  }

  p {
    @include p($blue);
    font-size: 0.75rem;
  }

  a {
    font-weight: 700;
    font-size: 17.5px;
    color: $blue !important;
  }

  .fa-cart-shopping {
    transition: all 0.25s ease-in-out;
    &:hover {
      transform: scale(1.3);
      text-shadow: 0 0 0.5rem $orange;
    }
  }

  a.d-inline-block {
    @include p($blue);
    padding: 0px !important;
  }

  a.router-link-exact-active {
    font-weight: 900;
    color: $orange !important;
  }

  .nav-link {
    transition: all 0.25s ease-in-out;

    &:hover {
      transform: translateY(-10%);
    }
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
