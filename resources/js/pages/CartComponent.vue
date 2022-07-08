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

                  <div class="mb-4">
                    <p class="mb-1">Il tuo Carrello</p>
                  </div>

                  <div v-if="cart.length > 0">
                    <div
                      v-for="plate in cart"
                      :key="plate.id"
                      class="card mb-3"
                    >
                      <div class="card-body">
                        <div
                          class="
                            d-flex
                            justify-content-between
                            align-items-center
                          "
                        >
                          <div class="col-5 d-flex align-items-center">
                            <div class="wrapper_image">
                              <img
                                :src="'/storage/' + plate.image"
                                class="h-100 w-100 rounded-3"
                                :alt="plate.name"
                              />
                            </div>
                            <div class="ml-3">
                              <p>{{ plate.name }}</p>
                            </div>
                          </div>
                          <div
                            class="
                              col-5
                              d-flex
                              align-items-center
                              justify-content-center
                            "
                          >
                            <div>
                              <i
                                @click="
                                  reduceQuantity(plate.quantity, plate.id)
                                "
                                class="fa-solid fa-circle-minus"
                              ></i>
                            </div>
                            <p class="fw-normal mx-2 mb-0">
                              {{ plate.quantity }}
                            </p>
                            <div>
                              <i
                                @click="addQuantity(plate.id)"
                                class="fa-solid fa-circle-plus"
                              ></i>
                            </div>
                            <p class="ml-3">
                              {{ totalPrice(plate.price, plate.quantity) }}€
                            </p>
                          </div>
                          <div
                            class="
                              col-2
                              d-flex
                              align-items-center
                              justify-content-end
                            "
                          >
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
                  <div v-else>
                    <p class="text-center mb-4">Il tuo carrello è vuoto.</p>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="card card_right rounded-3">
                    <div class="card-body">
                      <!-- -------------------------------------------------- -->
                      <h6 class="text-center mb-3">CHECKOUT</h6>
                      <!-- box alert campi obbligatori -->
                      <div class="alert alert-danger mb-1" role="alert">
                        I campi contrassegnati dall'asterisco (*) sono
                        obbligatori.
                      </div>

                      <div class="action">
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
                          <!-- <input id="createDish" type="submit" value="Salva" class="btn btn-outline-info text-decoration-none mr-2"> -->
                          <!-- <a href="{{ route('user.user.index') }}" class="btn btn-outline-danger text-decoration-none">Annulla</a> -->
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
                              class="btn btn_buy mt-2 mb-3"
                              @click="continueToPayment()"
                            >
                              Procedi con l'acquisto € {{ getTotal() }}
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
      if (this.getTotal() > 0) {
        this.$refs.paymentBtnRef.click();
      }
      alert("Non ci sono più prodotti nel carrello");
    },
    onSuccess(payload) {
      let nonce = payload.nonce;
      console.log(nonce);
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
          // console.log('nonce', nonce)
          console.log(response, "response dopo pagamento");
          if (response.data) {
            // console.log(this.formData)
            this.sendOrder();
          }
        })
        .catch((e) => console.log(e));
    },
    onError(error) {
      let message = error.message;
      console.log(message, "errore di mess in paybox");
    },
    validateForm() {
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
        this.validation.customer_surname.message = "Il cognome è obbligatorio";
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
        this.validation.customer_address.message = "L'indirizzo è obbligatorio";
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
      }
    },
    sendOrder() {
      console.log(this.customer_name);
      console.log(this.customer_surname);
      console.log(this.customer_address);
      console.log(this.customer_email);
      console.log(this.customer_phone);
      console.log(this.cart[0].user_id);
      console.log(this.getTotal());
      console.log(this.cart);
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
          // 'restaurant_email': this.formData.restaurant_email,
          plates: this.cart,
        })
        .then((response) => {
          // handle success
          console.log("chiamata axios post per payment");
          console.log(response, "response axios");
          // alert(response)
          if (response.status === 200) {
            localStorage.clear();
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

.card_right {
  background-color: $tortora;
  max-height: 750px;
  overflow-y: auto;

  &::-webkit-scrollbar {
    width: 0.25rem;
  }

  label {
    margin-top: 0.75rem;
    @include label($blue);
  }

  .btn_buy {
    background-color: $blue;
    @include button(
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
    background-color: $blue;
    @include button(
      $tortora,
      $tortora,
      1rem,
      600,
      0.4rem 1.5rem,
      $yellow,
      $blue
    );
  }
}

.wrapper_image {
  width: 50px;
}
.fa-circle-minus,
.fa-circle-plus {
  cursor: pointer;
}
</style>