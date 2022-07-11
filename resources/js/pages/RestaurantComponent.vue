<template>
  <div>
    <!-- info ristorante -->
    <div class="card card_top_info shadow">
      <div class="container">
        <div class="row my-5 align-items-center">
          <div class="col-md-7 col-lg-8 mb-4 mb-md-0">
            <img
              v-scrollAnimation
              class="w-100 restaurant_img"
              style="border-radius: 5px"
              :src="'/storage/' + restaurant.image"
              :alt="restaurant.name"
            />
          </div>
          <div class="col-md-5 col-lg-4 restaurant_info">
            <h2 v-scrollAnimation class="mb-2 h2_info">
              {{ restaurant.business_name }}
            </h2>
            <p v-scrollAnimation class="my-2 p_info p-2 rounded">
              <i class="fa-solid mr-2 fa-clock"></i>
              ORARIO DI APERTURA: {{ restaurant.opening_time }}
            </p>
            <p v-scrollAnimation class="my-2 p_info p-2 rounded">
              <i class="fa-solid mr-2 fa-clock"></i>
              ORARIO DI CHIUSURA: {{ restaurant.closing_time }}
            </p>
            <p v-scrollAnimation class="my-2 p_info p-2 rounded">
              <i class="fa-solid mr-2 fa-door-closed"></i>
              GIORNO DI CHIUSURA: {{ restaurant.closing_day }}
            </p>
            <p
              v-scrollAnimation
              class="my-2 p_info p-2 rounded"
              v-if="restaurant.shipping_price != 0"
            >
              <i class="fa-solid mr-2 fa-shipping-fast"></i>
              COSTO DI SPEDIZIONE: € {{ restaurant.shipping_price }}
            </p>
            <p v-scrollAnimation class="my-2 p_info p-2 rounded" v-else>
              <i class="fa-solid mr-2 fa-truck-fast"></i>
              COSTO DI SPEDIZIONE: Spedizione Gratuita
            </p>
            <p v-scrollAnimation class="my-2 p_info p-2 rounded">
              <i class="fa-solid mr-2 fa-file-lines"></i>
              {{ restaurant.description }}
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container my-5">
      <!-- tag seleziona piatto -->
      <div class="row justify-content-center mb-5">
        <div class="col-sm-7 col-md-5 col-lg-4 col-xl-3 card p-4 bg">
          <p class="text-center">Seleziona il tuo piatto preferito</p>
        </div>
      </div>
      <!-- card piatto -->
      <div class="row justify-content-around p-0 p-xl-5">
        <div class="col-lg-7">
          <div class="row align-items-center justify-content-center">
            <div
              v-for="(plate, index) in restaurant.plate"
              :key="index"
              class="col-12 col-sm-9 col-md-12 mb-5"
            >
              <div
                v-scrollAnimation
                v-if="plate.visible"
                class="card plate_card"
              >
                <div class="row justify-content-around align-items-center">
                  <div class="col-md-6 wrapper_plate_img">
                    <div class="row justify-content-center">
                      <img
                        :src="'/storage/' + plate.image"
                        class="w-100 p-3"
                        :alt="plate.name"
                      />
                    </div>
                  </div>
                  <div class="col-md-6 p-3 text-center">
                    <h5>{{ plate.name }}</h5>
                    <p class="card-text mb-2 plate_description">
                      {{ plate.description }}
                    </p>
                    <p class="card-text mb-3">Prezzo: {{ plate.price }}€</p>
                    <button
                      @click="addToCart(plate)"
                      class="btn btn_add_to_cart"
                    >
                      Aggiungi al Carrello
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- inizio carrello -->
        <div class="col-sm-9 col-lg-5 col-xl-4">
          <div class="row">
            <div v-scrollAnimation class="col-12 cart_animation">
              <div
                v-if="cart.length > 0"
                class="card card_scrollbar cart_style pt-2 pb-4 px-4"
              >
                <h5 class="full-cart mb-3 py-3">Carrello</h5>
                <div v-for="plate in cart" :key="plate.id" class="mb-3">
                  <div
                    v-scrollAnimation
                    class="row align-items-center py-2 added_plate"
                  >
                    <div class="col-8">
                      <div class="d-flex flex-column">
                        <h6 class="mb-2">
                          {{ plate.name }}
                        </h6>
                        <div>
                          <p class="d-inline-block mr-2">Quantità:</p>
                          <div class="d-inline-block">
                            <i
                              @click="reduceQuantity(plate.quantity, plate.id)"
                              class="fa-solid fa-circle-minus"
                            ></i>
                          </div>
                          <p class="d-inline-block mx-2">
                            {{ plate.quantity }}
                          </p>
                          <div class="d-inline-block">
                            <i
                              @click="addQuantity(plate.id)"
                              class="fa-solid fa-circle-plus"
                            ></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-4 text-right">
                      <button
                        class="btn btn-danger"
                        @click="deletePlate(plate.id)"
                        style="color: #ffffff"
                      >
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="ck_border text-center mt-3 pt-4">
                  <p class="mb-4">Totale: {{ getTotal() }}€</p>
                  <a class="go_checkout py-2" href="/cart">
                    <i class="fa-solid fa-md fa-arrow-right-long mr-2"></i
                    >Checkout
                  </a>
                </div>
              </div>
              <div
                v-scrollAnimation
                v-else
                class="card text-center empty_cart pt-5 pb-4 px-4"
              >
                <div class="d-flex flex-column mb-3">
                  <i class="fa-solid fa-2x fa-cart-shopping mb-3"></i>
                  <p>Il carrello è vuoto</p>
                </div>
                <div class="ck_border mt-3 pt-4">
                  <a
                    @click="preventCheckout($event)"
                    class="go_checkout py-2"
                    href="/cart"
                    ><i class="fa-solid fa-md fa-arrow-right-long mr-2"></i
                    >Checkout
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantComponent",
  data() {
    return {
      restaurant: [],
      cart: [],
    };
  },
  mounted() {
    this.getRestaurant();
    this.getCart();
  },
  methods: {
    getRestaurant() {
      const slug = this.$route.params.slug;
      window.axios
        .get("/api/users/" + slug)
        .then(({ data }) => {
          this.restaurant = data;
        })
        .catch((e) => console.log(e));
    },
    addToCart(plate) {
      if (this.cart.length > 0 && plate.user_id != this.cart[0].user_id) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Puoi comprare da un solo ristoratore per volta!",
          showCloseButton: true,
        });
      } else {
        if (this.cart.find((item) => item.id === plate.id)) {
          this.cart.find((item) => item.id === plate.id).quantity++;
          this.toastAlertSuccess("Incrementata quantità!!");
        } else {
          this.cart.push({
            id: plate.id,
            name: plate.name,
            image: plate.image,
            price: plate.price,
            user_id: plate.user_id,
            quantity: 1,
          });
          this.toastAlertSuccess("Aggiunto al carrello!!");
        }
      }
      localStorage.setItem("cart", JSON.stringify(this.cart));
    },
    getCart() {
      if (localStorage.getItem("cart")) {
        this.cart = JSON.parse(localStorage.getItem("cart"));
      }
    },
    reduceQuantity(quantity, id) {
      if (quantity > 1) {
        this.cart.forEach((plate) => {
          if (plate.id === id) {
            plate.quantity--;
            this.toastAlertSuccess("Ridotta quantità :(");
          }
        });
        localStorage.setItem("cart", JSON.stringify(this.cart));
      }
    },
    addQuantity(id) {
      this.cart.forEach((plate) => {
        if (plate.id === id) {
          plate.quantity++;
          this.toastAlertSuccess("Incrementata quantità!!");
        }
      });
      localStorage.setItem("cart", JSON.stringify(this.cart));
    },
    deletePlate(id) {
      this.cart = this.cart.filter((plate) => plate.id !== id);
      this.toastAlertSuccess("Rimosso dal carrello :(");
      localStorage.setItem("cart", JSON.stringify(this.cart));
    },
    toastAlertSuccess(message) {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", Swal.stopTimer);
          toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
      });
      Toast.fire({
        icon: "success",
        title: message,
      });
    },
    preventCheckout(e) {
      e.preventDefault();
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Devi avere almeno un piatto nel carrello per poter procedere al checkout!",
        showCloseButton: true,
      });
    },
    getTotal() {
      let total = 0;
      this.cart.forEach((plate) => {
        total += plate.price * plate.quantity;
      });
      return total.toFixed(2);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables.scss";
@import "/resources/sass/_mixin.scss";

h2 {
  @include h2($blue);
}

h5 {
  @include h5($blue);
}

h6 {
  @include h6($blue);
}

p.plate_description {
  @include label($blue);
}

p {
  @include p($blue);
}

p.p_info {
  @include p($blue);
  background-color: $yellow;
}

.bg {
  background-color: $blue;
  p.text-center {
    @include p($tortora);
  }
}

.card.card_top_info {
  background-color: $tortora;
}

img.restaurant_img {
  &.before-enter {
    opacity: 0;
    transform: translateX(50%) scale(0.5);
    transition: all 1.5s ease-in-out;
  }
  &.enter {
    opacity: 1;
    transform: translateX(0) scale(1);
  }
}

.h2_info {
  &.before-enter {
    opacity: 0;
    transform: translateX(25%);
    transition: all 1.5s ease-in-out;
    transition-delay: 0.5s;
  }
  &.enter {
    opacity: 1;
    transform: translateX(0);
  }
}
p.p_info:nth-child(2) {
  @extend .h2_info;
  &.before-enter {
    transition-delay: 0.75s;
  }
}
p.p_info:nth-child(3) {
  @extend .h2_info;
  &.before-enter {
    transition-delay: 1s;
  }
}
p.p_info:nth-child(4) {
  @extend .h2_info;
  &.before-enter {
    transition-delay: 1.25s;
  }
}
p.p_info:nth-child(5) {
  @extend .h2_info;
  &.before-enter {
    transition-delay: 1.5s;
  }
}
p.p_info:nth-child(6) {
  @extend .h2_info;
  &.before-enter {
    transition-delay: 1.75s;
  }
}

.card.plate_card {
  background-color: $tortora;

  .wrapper_plate_img {
    max-width: 230px;
  }

  &.before-enter {
    opacity: 0;
    transform: translateY(100%);
    transition: all 1s ease-in-out;
  }
  &.enter {
    opacity: 1;
    transform: translateY(0);
  }
}

.card_scrollbar {
  &::-webkit-scrollbar {
    width: 2px;
  }
}

.btn_add_to_cart {
  @include button(
    $blue,
    $tortora,
    $tortora,
    1rem,
    600,
    0.4rem 1.5rem,
    $yellow,
    $blue
  );
}

.cart_style {
  background-color: $yellow;
  overflow-y: auto;
  max-height: 500px;
  border-radius: 5px;
}

.full-cart {
  border-bottom: 2px solid $blue;
}

.empty_cart {
  color: $blue;
  background-color: $yellow;
  border-radius: 5px;
}

.cart_animation {
  &.before-enter {
    opacity: 0;
    transform: translatey(100%) scale(0.1);
    transition: all 1.5s ease-in-out;
  }
  &.enter {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

.added_plate {
  &.before-enter {
    opacity: 0;
    transform: translateX(-50%);
    transition: all 0.5s ease-in-out;
  }
  &.enter {
    opacity: 1;
    transform: translateX(0);
  }
}

.ck_border {
  border-top: 2px solid $blue;
}

.fa-circle-plus,
.fa-circle-minus {
  transition: transform 0.25s ease-in-out;
  &:hover {
    cursor: pointer;
    transform: scale(1.3);
  }
}

a.go_checkout {
  border: 2px solid $blue;
  text-decoration: none;
  padding: 5px 10px;
  border-radius: 5px;
  transition: all 0.2s ease-in-out;

  &:hover {
    background-color: $blue;
    color: $yellow !important;
  }
}

.partial_checkout {
  display: none;
}

@media screen and (max-width: 350px) {
  button.btn-danger {
    padding: 0.15rem 0.5rem;
    & .fa-trash-alt {
      font-size: 0.75rem;
    }
  }

  a.go_checkout {
    font-size: 0.75rem;
    border: none;
    & i {
      display: none;
    }
  }
}
</style>
