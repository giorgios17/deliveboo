<template>
  <section class="h-100 h-custom" style="background-color: #eee">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col">
                  <div
                    class="
                      d-flex
                      justify-content-between
                      align-items-center
                      mb-4
                    "
                  >
                    <div>
                      <p class="mb-1">Carrello</p>
                      <p class="mb-0">Hai articoli nel carrello</p>
                    </div>
                    <div></div>
                  </div>

                  <div class="card mb-3">
                    <div
                      class="card-body"
                      v-for="(item, index) in cart"
                      :key="index"
                    >
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <img
                              :src="'/storage/' + item.image"
                              class="rounded-3"
                              alt="Shopping item"
                              style="width: 65px"
                            />
                          </div>
                          <div class="ms-3">
                            <h5>{{ item.name }}</h5>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 50px">
                            <!-- bottone per rimuovere quantità -->
                            <button @click="removeQuantity()">-</button>

                            <h5 class="fw-normal mb-0">{{ count }}</h5>

                            <!-- bottone per aggiungere quantità -->
                            <button @click="addQuantity()">+</button>
                          </div>
                          <div style="width: 80px">
                            <h5 class="mb-0">${{ item.price }}</h5>
                          </div>
                          <!-- rimuovi dal carrello -->
                          <button @click="removeCart()">
                            <i class="fas fa-trash-alt"></i>
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

      count: 1,
    };
  },
  mounted() {
    if (localStorage.plate) {
      this.cart = JSON.parse(localStorage.getItem("plate"));
      //console.log(this.cart);
    }
  },
  methods: {
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
</style>
