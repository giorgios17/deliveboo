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
            <router-link class="nav-link" :to="{ name: 'cart' }"
              >Carrello</router-link
            >
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
          <li class="nav-item d-flex align-items-center">
            <router-link class="nav-link" :to="{ name: 'cart' }">
              <div class="d-lg-none d-xl-none">Carrello</div>
            </router-link>
            <a
              class="d-none d-lg-block d-xl-block"
              data-toggle="collapse"
              href="#collapse_cart"
              role="button"
              aria-expanded="false"
              aria-controls="collapse_cart"
            >
              <i class="fa-solid fa-lg fa-cart-shopping"></i>
            </a>
            <div class="collapse row px-4 pt-3 pb-4" id="collapse_cart">
              <div class="col-12">
                <div
                  class="row align-items-center justify-content-between mb-3"
                >
                  <h5>CARRELLO</h5>
                  <i
                    data-toggle="collapse"
                    href="#collapse_cart"
                    class="fa-solid text-danger fa-xl fa-circle-xmark"
                  ></i>
                </div>
              </div>
              <div v-if="cart.length > 0" class="col-12">
                <div
                  v-for="plate in cart"
                  :key="plate.id"
                  class="plate_row mb-3"
                >
                  <div class="row align-items-center">
                    <h6 class="col-3">
                      {{ plate.name }}
                    </h6>
                    <div class="col-6">
                      <div class="d-flex flex-column">
                        <div class="col-12 text-center">
                          <p>Quantità</p>
                        </div>
                        <div class="col-12">
                          <div class="row justify-content-center">
                            <div>
                              <i
                                @click="
                                  reduceQuantity(plate.quantity, plate.id)
                                "
                                class="fa-solid fa-circle-minus"
                              ></i>
                            </div>
                            <span class="mx-2">{{ plate.quantity }}</span>
                            <div>
                              <i
                                @click="addQuantity(plate.id)"
                                class="fa-solid fa-circle-plus"
                              ></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <button
                        class="btn btn-danger"
                        @click="deletePlate(plate.id)"
                        href="#!"
                        style="color: #ffffff"
                      >
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <p v-else class="col-12 py-3">Compra qualcosa Taccagno</p>
              <a class="go_checkout" href="/cart">Vai al Checkout</a>
            </div>
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

  #collapse_cart {
    position: absolute;
    top: 120%;
    right: 1%;
    z-index: 2;
    background-color: $yellow;
    width: 400px;
    max-height: 500px;
    overflow-y: auto;
    border-radius: 10px;
    border: 10px solid $blue;
    &::-webkit-scrollbar {
      width: 0px;
    }
  }

  .plate_row {
    border-bottom: 1px solid $blue;
    padding: 1rem;
  }

  .fa-circle-minus,
  .fa-circle-plus,
  .fa-circle-xmark {
    cursor: pointer;
  }

  .col-3 > .btn-danger {
    padding: 2.5px 8px;
  }
  a {
    font-weight: 700;
    font-size: 17.5px;
    color: $blue !important;
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
