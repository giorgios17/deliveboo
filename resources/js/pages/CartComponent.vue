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
                    <a
                      onclick="history.back()"
                      class="text-body continue_shopping"
                      ><i class="fas fa-long-arrow-alt-left mr-2"></i>Continua
                      lo shopping</a
                    >
                  </h5>
                  <hr />
                  <div v-if="cart.length > 0">
                    <div class="mb-4">
                      <p class="mb-1">Il tuo Carrello</p>
                    </div>
                    <div
                      v-scrollAnimation
                      v-for="plate in cart"
                      :key="plate.id"
                      class="card mb-3"
                    >
                      <div class="row align-items-center p-3 added_plate">
                        <div class="col-0 col-sm-4 d-none d-sm-block">
                          <img
                            :src="`/storage/${plate.image}`"
                            :alt="plate.name"
                            width="100px"
                            class="d-inline-block"
                          />
                        </div>
                        <div class="col-8 col-sm-6">
                          <div class="d-flex flex-column">
                            <h6 class="mb-2">
                              {{ plate.name }}
                            </h6>
                            <div>
                              <p class="d-inline-block mr-2">Qty:</p>
                              <div class="d-inline-block">
                                <i
                                  @click="
                                    reduceQuantity(plate.quantity, plate.id)
                                  "
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
                              <p
                                class="
                                  my-2
                                  ml-0 ml-sm-2
                                  d-sm-inline-block d-block
                                "
                              >
                                Prezzo:
                                {{ totalPrice(plate.price, plate.quantity) }}€
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-4 col-sm-2 text-right">
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
                  </div>
                  <div v-else class="text-center mt-5">
                    <div class="d-flex flex-column mb-3">
                      <i class="fa-solid fa-2x fa-cart-shopping mb-3"></i>
                      <p>Il carrello è vuoto</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div v-scrollAnimation class="card card_right rounded-3">
                    <div class="card-body">
                      <h6 class="text-center mb-3 bg-primary py-2">CHECKOUT</h6>
                      <!-- box alert campi obbligatori -->
                      <div
                        v-if="!formValidated"
                        class="alert alert-danger mb-1"
                        role="alert"
                      >
                        I campi contrassegnati dall'asterisco (*) sono
                        obbligatori.
                      </div>

                      <div v-if="!formValidated" class="action">
                        <!-- input nome -->
                        <div class="input-box mb-2">
                          <label for="customer_name"
                            >Nome <span class="text-danger">*</span></label
                          >
                          <br />
                          <input
                            type="text"
                            name="customer_name"
                            placeholder="Inserisci il tuo nome"
                            v-model="customer_name"
                            class="form-control"
                            maxlength="50"
                            required
                            autofocus
                          />
                          <div
                            v-if="!validation.customer_name.success"
                            class="alert alert-danger"
                          >
                            {{ validation.customer_name.message }}
                          </div>
                        </div>
                        <!-- input cognome -->
                        <div class="input-box mb-2">
                          <label for="customer_surname"
                            >Cognome <span class="text-danger">*</span></label
                          >
                          <br />
                          <input
                            type="text"
                            name="customer_surname"
                            placeholder="Inserisci il tuo cognome"
                            v-model="customer_surname"
                            class="form-control"
                            required
                            maxlength="50"
                          />
                          <div
                            v-if="!validation.customer_surname.success"
                            class="alert alert-danger"
                          >
                            {{ validation.customer_surname.message }}
                          </div>
                        </div>
                        <!-- input indirizzo di consegna -->
                        <div class="input-box mb-2">
                          <label for="customer_address"
                            >Indirizzo di consegna
                            <span class="text-danger">*</span></label
                          >
                          <br />
                          <input
                            type="text"
                            name="customer_address"
                            placeholder="Inserisci il tuo indirizzo"
                            v-model="customer_address"
                            value=""
                            class="form-control"
                            required
                            maxlength="255"
                          />
                          <div
                            v-if="!validation.customer_address.success"
                            class="alert alert-danger"
                          >
                            {{ validation.customer_address.message }}
                          </div>
                        </div>
                        <!-- input telefono -->
                        <div class="input-box mb-2">
                          <label for="customer_phone"
                            >Inserisci il tuo numero di telefono
                            <span class="text-danger">*</span></label
                          >
                          <br />
                          <input
                            type="tel"
                            name="customer_phone"
                            placeholder="Inserisci il tuo numero di telefono"
                            v-model="customer_phone"
                            class="form-control"
                            required
                          />
                          <small>Formato 346 15 96 524</small>
                          <div
                            v-if="!validation.customer_phone.success"
                            class="alert alert-danger"
                          >
                            {{ validation.customer_phone.message }}
                          </div>
                        </div>
                        <!-- input email -->
                        <div class="input-box mb-2">
                          <label for="customer_email"
                            >Email <span class="text-danger">*</span></label
                          >
                          <br />
                          <input
                            type="email"
                            name="customer_email"
                            placeholder="tuamail@gmail.com"
                            v-model="customer_email"
                            class="form-control"
                            required
                          />
                          <div
                            v-if="!validation.customer_email.success"
                            class="alert alert-danger"
                          >
                            {{ validation.customer_email.message }}
                          </div>
                        </div>
                        <!-- input note -->
                        <div class="input-box mb-2">
                          <label for="customer_note">Note</label>
                          <br />
                          <textarea
                            v-model="customer_note"
                            name="customer_note"
                            cols="30"
                            rows="5"
                            placeholder="Inserisci una nota"
                            class="form-control"
                          ></textarea>
                        </div>
                        <!-- bottone conferma dati -->
                        <div class="d-flex justify-content-center">
                          <button
                            @click="validateForm()"
                            class="btn btn_form_customer mt-2 mb-4"
                          >
                            Conferma i dati
                          </button>
                        </div>
                      </div>

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Subtotale</p>
                        <p class="mb-2">€ {{ getSubtotal() }}</p>
                      </div>

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Costo di spedizione</p>
                        <p class="mb-2">€ {{ getShippingPrice() }}</p>
                      </div>

                      <div class="d-flex justify-content-between mb-2">
                        <p class="mb-2">Totale</p>
                        <p class="mb-2">€ {{ getTotal() }}</p>
                      </div>

                      <div v-if="token && continuePayment">
                        <v-braintree
                          :authorization="token"
                          locale="it"
                          @success="onSuccess"
                          @error="onError"
                          class="d-flex flex-column align-items-center"
                        >
                          <template #button="slotProps">
                            <button
                              ref="paymentBtnRef"
                              @click="slotProps.submit"
                              style="display: none"
                            ></button>
                            <button
                              v-if="!loading"
                              class="btn btn_buy mt-3 mb-3"
                              @click="continueToPayment()"
                            >
                              Procedi con l'acquisto € {{ getTotal() }}
                            </button>
                            <button
                              v-else
                              disabled
                              class="btn btn-primary px-4 mt-3 mb-3"
                            >
                              <i class="fa-solid fa-circle-notch"></i>
                            </button>
                          </template>
                        </v-braintree>
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
      loading: false,
      formValidated: false,
      shippingPrice: 0,
      token: "",
      continuePayment: false,
      customer_name: null,
      customer_surname: null,
      customer_address: null,
      customer_phone: null,
      customer_email: null,
      customer_note: null,
      total_price: null,
      validation: {
        customer_name: {
          success: true,
          message: "",
        },
        customer_surname: {
          success: true,
          message: "",
        },
        customer_address: {
          success: true,
          message: "",
        },
        customer_phone: {
          success: true,
          message: "",
        },
        customer_email: {
          success: true,
          message: "",
        },
      },
    };
  },
  mounted() {
    if (localStorage.getItem("cart")) {
      this.cart = JSON.parse(localStorage.getItem("cart"));
    }
    this.axiosCallShippingPrice();
    this.axiosCallToken();
  },
  methods: {
    totalPrice(price, quantity) {
      return price * quantity;
    },
    deletePlate(id) {
      this.cart = this.cart.filter((plate) => plate.id !== id);
      this.toastAlertSuccess("Rimosso dal carrello :(");
      localStorage.setItem("cart", JSON.stringify(this.cart));
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
    getSubtotal() {
      this.subTotal = 0;
      this.cart.forEach((plate) => {
        this.subTotal += this.totalPrice(plate.price, plate.quantity);
      });
      return this.subTotal;
    },
    getShippingPrice() {
      return this.shippingPrice;
    },
    getTotal() {
      if (this.subTotal === 0) {
        return 0;
      }
      return (this.getSubtotal() + this.getShippingPrice()).toFixed(2);
    },
    axiosCallShippingPrice() {
      if (this.cart.length > 0) {
        axios
          .get("/api/shipping-price/" + this.cart[0].user_id)
          .then((result) => {
            this.shippingPrice = result.data;
          })
          .catch((error) => {
            console.log(error);
          });
      }
      this.shippingPrice = 0;
    },
    axiosCallToken() {
      axios
        .get("/api/orders/generate")
        .then((result) => {
          this.token = result.data.token;
        })
        .catch((error) => {
          console.log(error);
        });
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
    continueToPayment() {
      if (this.getSubtotal() > 0) {
        this.$refs.paymentBtnRef.click();
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Il tuo carrello è vuoto!",
          showCloseButton: true,
        });
      }
    },
    onSuccess(payload) {
      this.loading = true;
      let nonce = payload.nonce;
      window.axios
        .post(
          "http://127.0.0.1:8000/api/orders/make-payment",
          {},
          {
            params: {
              token: nonce,
              amount: this.getTotal(),
            },
          }
        )
        .then((response) => {
          console.log(response, "response dopo pagamento");
          if (response.data) {
            this.sendOrder();
          }
        })
        .catch((e) => console.log(e));
    },
    onError(error) {
      let message = error.message;
      console.log(message, "messaggio d'errore nella paybox");
    },
    validateForm() {
      if (this.cart.length === 0) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Il tuo carrello è vuoto!",
          showCloseButton: true,
        });
      } else {
        // validazione input nome
        if (!this.customer_name) {
          this.validation.customer_name.success = false;
          this.validation.customer_name.message = "Il nome è obbligatorio";
        } else if (this.customer_name.length > 50) {
          this.validation.customer_name.success = false;
          this.validation.customer_name.message =
            "Il nome non può essere più lungo di 50 caratteri";
        } else {
          this.validation.customer_name.success = true;
          this.validation.customer_name.message = "";
        }
        // validazione input cognome
        if (!this.customer_surname) {
          this.validation.customer_surname.success = false;
          this.validation.customer_surname.message =
            "Il cognome è obbligatorio";
        } else if (this.customer_surname.length > 50) {
          this.validation.customer_surname.success = false;
          this.validation.customer_surname.message =
            "Il cognome non può essere più lungo di 50 caratteri";
        } else {
          this.validation.customer_surname.success = true;
          this.validation.customer_surname.message = "";
        }
        // validazione input email
        if (!this.customer_email) {
          this.validation.customer_email.success = false;
          this.validation.customer_email.message = "L'email è obbligatoria";
        } else if (this.customer_email.length > 255) {
          this.validation.customer_email.success = false;
          this.validation.customer_email.message =
            "L'email non può essere più lunga di 255 caratteri";
        } else if (
          !this.customer_email.match(
            /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
          )
        ) {
          this.validation.customer_email.success = false;
          this.validation.customer_email.message =
            "Il formato della mail non valido";
        } else {
          this.validation.customer_email.success = true;
          this.validation.customer_email.message = "";
        }
        // validazione input indirizzo
        if (!this.customer_address) {
          this.validation.customer_address.success = false;
          this.validation.customer_address.message =
            "L'indirizzo è obbligatorio";
        } else if (this.customer_address.length > 255) {
          this.validation.customer_address.success = false;
          this.validation.customer_address.message =
            "L'indirizzo non può essere più lungo di 255 caratteri";
        } else {
          this.validation.customer_address.success = true;
          this.validation.customer_address.message = "";
        }
        // validazione input telefono
        if (!this.customer_phone) {
          this.validation.customer_phone.success = false;
          this.validation.customer_phone.message =
            "Il numero di telefono è obbligatorio";
        } else if (isNaN(this.customer_phone)) {
          this.validation.customer_phone.success = false;
          this.validation.customer_phone.message =
            "Il numero di telefono deve essere composto da numeri";
        } else if (
          this.customer_phone.length < 8 ||
          this.customer_phone.length > 11
        ) {
          this.validation.customer_phone.success = false;
          this.validation.customer_phone.message =
            "Il numero di telefono deve essere compreso tra gli 8 e gli 11 caratteri";
        } else {
          this.validation.customer_phone.success = true;
          this.validation.customer_phone.message = "";
        }

        if (
          this.validation.customer_name.success &&
          this.validation.customer_surname.success &&
          this.validation.customer_email.success &&
          this.validation.customer_address.success &&
          this.validation.customer_phone.success &&
          this.cart.length > 0
        ) {
          this.continuePayment = true;
          this.formValidated = true;
          this.toastAlertSuccess("Dati inseriti correttamente");
        }
      }
    },
    sendOrder() {
      window.axios
        .post("http://127.0.0.1:8000/api/payment", {
          customer_name: this.customer_name,
          customer_surname: this.customer_surname,
          customer_address: this.customer_address,
          customer_phone: this.customer_phone,
          customer_email: this.customer_email,
          customer_note: this.customer_note,
          total_price: this.getTotal(),
          user_id: this.cart[0].user_id,
          plates: this.cart,
        })
        .then((response) => {
          if (response.status === 200) {
            localStorage.clear();
            this.loading = false;
            this.$router.push({
              name: "success",
            });
          }
        })
        .catch((e) => console.log("error payment", e));
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

h5 {
  @include h5($blue);
}
h6 {
  @include h6($blue);
}
p {
  @include p($blue);
}

.continue_shopping {
  padding: 0.5rem 1rem;
  color: $blue !important;
  border-radius: 5px;
  transition: all 0.25s ease-in-out;

  &:hover {
    background-color: $blue;
    color: white !important;
    text-decoration: none;
    cursor: pointer;
    border-radius: 5px;
  }
}

.fa-circle-plus,
.fa-circle-minus {
  transition: transform 0.25s ease-in-out;
  &:hover {
    cursor: pointer;
    transform: scale(1.3);
  }
}

.card_right {
  background-color: $tortora;
  max-height: 750px;
  overflow-y: auto;

  h6 {
    color: $tortora;
    border-radius: 5px;
  }

  &::-webkit-scrollbar {
    width: 0.25rem;
  }

  label {
    margin-top: 0.75rem;
    @include label($blue);
  }

  .btn_buy {
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

  .btn_form_customer {
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

  &.before-enter {
    opacity: 0;
    transform: translateX(75%);
    transition: all 1s ease-in-out;
  }
  &.enter {
    opacity: 1;
    transform: translateX(0);
  }
}

.fa-circle-notch {
  cursor: pointer;
  animation: fa-spin 1s infinite linear;
}

.card.mb-3 {
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

@keyframes fa-spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@media screen and (max-width: 991px) {
  .card_right {
    max-height: none;
  }
}

@media screen and (max-width: 500px) {
  h5 {
    font-size: 1rem !important;
  }
}

@media screen and (max-width: 350px) {
  button.btn-danger {
    padding: 0.15rem 0.5rem;
    & .fa-trash-alt {
      font-size: 0.75rem;
    }
  }

  h5 {
    font-size: 0.75rem !important;
  }
}
</style>
