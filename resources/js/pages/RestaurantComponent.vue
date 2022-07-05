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
        <p>{{ restaurant.description }}</p>
      </div>
      <!-- INIZIO CARRELLO -->
      <CartComponent />
      <!-- FINE CARRELLO -->
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-3 col-sm-3 col-12 card my-3 p-4 bg">
            <p>Seleziona il tuo piatto preferito</p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row justify-content-center my-5">
          <div
            v-for="(plate, index) in restaurant.plate"
            :key="index"
            class="card m-3"
            style="width: 18rem"
          >
            <img
              :src="'/storage/' + plate.image"
              class="card-img-top"
              :alt="plate.name"
            />
            <div class="card-body">
              <h4 class="card-title">{{ plate.name }}</h4>
              <p class="card-text">{{ plate.description }}</p>
              <p class="card-text">Prezzo: {{ plate.price }}€</p>
              <button class="btn btn-primary mt-2" @click="AddCart(plate)">
                Aggiungi al carrello
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CartComponent from "../pages/CartComponent.vue";

export default {
  name: "RestaurantComponent",
  data() {
    return {
      restaurant: [],
      cart: [],
    };
  },
  components: {
    CartComponent,
  },
  mounted() {
    this.getRestaurant();

    //localstorage per dati (carrello)
    if (localStorage.getItem("cart")) {
      try {
        this.cart = JSON.parse(localStorage.getItem("cart"));
      } catch (e) {
        localStorage.removeItem("cart");
      }
    }
  },
  methods: {
    getRestaurant() {
      const slug = this.$route.params.slug;
      console.log("parametro slug" + slug);
      window.axios
        .get("/api/users/" + slug)
        .then(({ data }) => {
          console.log(data);
          this.restaurant = data;
          console.log(this.restaurant);
        })
        .catch((e) => console.log(e));
    },

    //funzione per aggiunta al carrello
    AddCart(data) {
      this.cart.push(data);
      this.saveCart();
      //   console.log(this.cart);
    },
    saveCart() {
      const parsed = JSON.stringify(this.cart);
      localStorage.setItem("plate", parsed);
    },
    removeCart(x) {
      this.cart.splice(x, 1);
      this.saveCart();
    },

    addQuantity() {
      this.count++;
      return this.count;
      console.log(this.count);
    },
    removeQuantity() {
      if (this.count > 1) {
        this.count--;

        return this.count;
        console.log(this.count);
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.bg {
  background-color: #003049;
  color: hsl(53deg 37% 77%);
}
</style>
