<template>
  <div>
    <div class="container">
      <div class="row my-5">
        <div class="col-6">
          <img
            class="w-100"
            :src="'/storage/' + restaurant.image"
            :alt="restaurant.name"
          />
        </div>
        <div class="col-6">
          <h2 class="mb-2">{{ restaurant.business_name }}</h2>
          <p>ORARIO DI APERTURA: {{ restaurant.opening_time }}</p>
          <p>ORARIO DI CHIUSURA: {{ restaurant.closing_time }}</p>
          <p>GIORNO DI CHIUSURA: {{ restaurant.closing_day }}</p>
          <p>COSTO DI SPEDIZIONE: {{ restaurant.opening_time }}</p>
          <p v-if="restaurant.shipping_price != 0">
            COSTO DI SPEDIZIONE: € {{ restaurant.shipping_price }}
          </p>
          <p v-else>COSTO DI SPEDIZIONE: Spedizione Gratuita</p>
          <p>{{ restaurant.description }}</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-3 col-sm-3 col-12 card my-3 p-4 bg">
          <p class="text-center">Seleziona il tuo piatto preferito</p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row my-5">
        <div class="row col-9 px-3">
          <div v-for="(plate, index) in restaurant.plate" :key="index">
            <div v-if="plate.visible" class="card m-1" style="width: 18rem">
              <div class="wrapper_img p-3">
                <img
                  :src="'/storage/' + plate.image"
                  class="card-img-top h-100 w-100"
                  :alt="plate.name"
                />
              </div>
              <div class="card-body">
                <h4 class="card-title">{{ plate.name }}</h4>
                <p class="card-text mb-2">{{ plate.description }}</p>
                <p class="card-text mb-3">Prezzo: {{ plate.price }}€</p>
                <button @click="addToCart(plate)" class="btn btn-primary">
                  Aggiungi al Carrello
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <!-- inizio carrello -->
          <div v-if="cart.length > 0" class="col-12 cart_style">
            <div v-for="plate in cart" :key="plate.id" class="plate_row mb-3">
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
                            @click="reduceQuantity(plate.quantity, plate.id)"
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
            <a class="go_checkout" href="/cart">Vai al Checkout</a>
          </div>
          <p v-else class="col-12 py-3">Il tuo carrello è vuoto</p>
          <!-- fine carrello -->
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
      // console.log("parametro slug" + slug);
      window.axios
        .get("/api/users/" + slug)
        .then(({ data }) => {
          // console.log(data);
          this.restaurant = data;
          // console.log(this.restaurant);
        })
        .catch((e) => console.log(e));
    },
    addToCart(plate) {
      if (this.cart.length > 0 && plate.user_id != this.cart[0].user_id) {
        alert("Puoi comprare i piatti solo da un singolo ristorante");
      } else {
        if (this.cart.find((item) => item.id === plate.id)) {
          this.cart.find((item) => item.id === plate.id).quantity++;
        } else {
          this.cart.push({
            id: plate.id,
            name: plate.name,
            image: plate.image,
            price: plate.price,
            user_id: plate.user_id,
            quantity: 1,
          });
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

h2 {
  @include h2($blue);
}

p {
  @include p($blue);
}

.bg {
  background-color: $blue;
  p.text-center {
    @include p($tortora);
  }
}
.wrapper_img {
  height: 180px;
  background-color: $tortora;

  img {
    object-fit: cover;
    object-position: top;
  }
}
.cart_style {
  border: 10px solid $blue;
  background-color: $yellow;
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
</style>
