<template>
  <div class="container">
    <div class="row py-5">
      <div class="col-6">
        <img
          class="w-100"
          :src="'/storage/' + restaurant.image"
          :alt="restaurant.name"
        />
      </div>
      <div class="col-6">
        <h1>{{ restaurant.business_name }}</h1>
        <div class="d-flex my-2">
          <p class="font-weight-bold mr-2">ORARIO DI APERTURA</p>
          <p>{{ restaurant.opening_time }}</p>
        </div>
        <div class="d-flex my-2">
          <p class="font-weight-bold mr-2">ORARIO DI CHIUSURA</p>
          <p>{{ restaurant.closing_time }}</p>
        </div>
        <div class="d-flex my-2">
          <p class="font-weight-bold mr-2">GIORNO DI CHIUSURA:</p>
          <p>{{ restaurant.closing_day }}</p>
        </div>
        <div class="d-flex my-2">
          <p class="font-weight-bold mr-2">COSTO DI SPEDIZIONE:</p>
          <p v-if="restaurant.shipping_price != 0">
            {{ restaurant.shipping_price }}
          </p>
          <p v-else>Spedizione Gratuita</p>
        </div>
        <p>{{ restaurant.description }}</p>
      </div>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-3 col-sm-3 col-12 card my-3 p-4 bg">
            <p>Seleziona il tuo piatto preferito</p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row justify-content-center my-5">
          <div v-for="(plate, index) in restaurant.plate" :key="index">
            <div v-if="plate.visible" class="card m-3" style="width: 18rem">
              <div class="wrapper_img p-3">
                <img
                  :src="'/storage/' + plate.image"
                  class="card-img-top h-100 w-100"
                  :alt="plate.name"
                />
              </div>
              <div class="card-body">
                <h4 class="card-title">{{ plate.name }}</h4>
                <p class="card-text">{{ plate.description }}</p>
                <p class="card-text">Prezzo: {{ plate.price }}€</p>
                <button @click="addToCart(plate)" class="btn btn-primary">
                  Aggiungi al Carrello
                </button>
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
  },
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables.scss";

.bg {
  background-color: #003049;
  color: hsl(53deg 37% 77%);
}
.wrapper_img {
  height: 180px;
  background-color: $tortora;

  img {
    object-fit: cover;
    object-position: top;
  }
}
</style>
