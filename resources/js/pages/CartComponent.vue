<template>
  <section class="h-100 h-custom" style="background-color: #eee">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-lg-7">
                  <h5 class="mb-3">
                    <a onclick="history.back()" class="text-body"
                      ><i class="fas fa-long-arrow-alt-left mr-2"></i>Continua
                      lo shopping</a
                    >
                  </h5>
                  <hr />

                  <div class="mb-4">
                    <p class="mb-1">Il tuo Carrello</p>
                  </div>

                  <div
                    v-for="plate in cart"
                    :key="plate.id"
                    class="card mb-3 mb-lg-0"
                  >
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div class="wrapper_image">
                            <img
                              :src="'/storage/' + plate.image"
                              class="h-100 w-100 rounded-3"
                              :alt="plate.name"
                              style="width: 65px"
                            />
                          </div>
                          <div class="ml-3">
                            <h5>{{ plate.name }}</h5>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <i
                              @click="reduceQuantity(plate.quantity, plate.id)"
                              class="fa-solid fa-lg fa-circle-minus"
                            ></i>
                          </div>
                          <h5 class="fw-normal mx-2 mb-0">
                            {{ plate.quantity }}
                          </h5>
                          <div>
                            <i
                              @click="addQuantity(plate.id)"
                              class="fa-solid fa-lg fa-circle-plus"
                            ></i>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 80px">
                            <h5 class="mb-0">
                              {{ totalPrice(plate.price, plate.quantity) }}€
                            </h5>
                          </div>
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
                </div>
                <div class="col-lg-5">
                  <div class="card bg-primary text-white rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Subtotale</p>
                        <p class="mb-2">€ {{ getSubtotal() }}</p>
                      </div>

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Costo di spedizione</p>
                        <p class="mb-2">€ {{ getShippingPrice() }}</p>
                      </div>

                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-2">Totale</p>
                        <p class="mb-2">€ {{ getTotal() }}</p>
                      </div>

                      <button
                        type="button"
                        class="btn btn-info btn-block btn-lg"
                      >
                        <div class="d-flex justify-content-between">
                          <span>€ {{ getTotal() }}</span>
                          <span
                            >Checkout
                            <i class="fas fa-long-arrow-alt-right ml-2"></i
                          ></span>
                        </div>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "CartComponent",
  data() {
    return {
      cart: [],
      shippingPrice: 0,
    };
  },
  mounted() {
    this.cart = JSON.parse(localStorage.getItem("cart"));
    this.axiosCallShippingPrice();
  },
  methods: {
    totalPrice(price, quantity) {
      return price * quantity;
    },
    deletePlate(id) {
      this.cart = this.cart.filter((plate) => plate.id !== id);
      localStorage.setItem("cart", JSON.stringify(this.cart));
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
    getSubtotal() {
      this.subTotal = 0;
      this.cart.forEach((plate) => {
        this.subTotal += this.totalPrice(plate.price, plate.quantity);
      });
      return this.subTotal;
    },
    getShippingPrice() {
      if (this.cart.length == 0) {
        return 0;
      }
      return this.shippingPrice;
    },
    getTotal() {
      return (this.getSubtotal() + this.getShippingPrice()).toFixed(2);
    },
    axiosCallShippingPrice() {
      axios
        .get("/api/shipping-price/" + this.cart[0].user_id)
        .then((result) => {
          this.shippingPrice = result.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.wrapper_image {
  height: 30px;
}
</style>