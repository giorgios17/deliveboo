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
          <li class="nav-item active">
            <a class="nav-link text-center" href="/"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link text-center" href="/about-us">Chi siamo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center" href="/work-with-us"
              >Lavora con noi</a
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
            <a href="/cart"> <i class="fa-solid fa-lg fa-cart-shopping"></i></a>
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
  data() {
    return {
      cart: [],
    };
  },
  mounted() {
    this.getCart();
  },
  methods: {
    getCart() {
      this.cart = JSON.parse(localStorage.getItem("cart"));
    },
    reduceQuantity(quantity, id) {
      if (quantity > 1) {
        this.cart.forEach((plate) => {
          if (plate.id === id) {
            plate.quantity--;
          }
        });
        localStorage.setItem("cart", JSON.stringify(this.cart));
      }
    },
    addQuantity(id) {
      this.cart.forEach((plate) => {
        if (plate.id === id) {
          plate.quantity++;
        }
      });
      localStorage.setItem("cart", JSON.stringify(this.cart));
    },
    deletePlate(id) {
      this.cart = this.cart.filter((plate) => plate.id !== id);
      localStorage.setItem("cart", JSON.stringify(this.cart));
    },
  },
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

  .col-3 > .btn-danger {
    padding: 2.5px 8px;
  }

  a {
    font-weight: 700;
    font-size: 17.5px;
    color: $blue !important;
  }

  a.d-inline-block {
    @include p($blue);
    padding: 0px !important;
  }

  a.go_checkout {
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 5px;
    transition: all 0.2s ease-in-out;
    &:hover {
      background-color: $blue;
      color: $yellow !important;
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
