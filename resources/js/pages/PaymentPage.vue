<template>
  <div>
    <div id="payment" class="">
      <div class="left-payment">
        <h1>Stai ordinando da: {{ userSelected }}</h1>

        <!-- {{cart[0]}} -->
        <!-- {{userEmail}} -->

        <!-- form dati utente -->
        <div v-if="!formComplete" class="form">
          <p>Inserisci i dati della consegna</p>

          <div class="action">
            <div class="input-box mb-2">
              <label for="name">Nome *</label>
              <br />
              <input
                type="text"
                name="name"
                placeholder="Nome..."
                v-model="name"
                value=""
                class="form-control"
                required
              />
              <div v-if="!validation.name.success" class="alert alert-danger">
                {{ validation.name.message }}
              </div>
            </div>
            <div class="input-box mb-2">
              <label for="surname">Cognome *</label>
              <br />
              <input
                type="text"
                name="surname"
                placeholder="Cognome..."
                v-model="surname"
                value=""
                class="form-control"
                required
              />
              <div
                v-if="!validation.surname.success"
                class="alert alert-danger"
              >
                {{ validation.surname.message }}
              </div>
            </div>
            <div class="input-box mb-2">
              <label for="address">Indirizzo di consegna *</label>
              <br />
              <input
                type="text"
                name="address"
                placeholder="Indirizzo..."
                v-model="address"
                value=""
                class="form-control"
                required
              />
              <div
                v-if="!validation.address.success"
                class="alert alert-danger"
              >
                {{ validation.address.message }}
              </div>
            </div>

            <div class="input-box mb-2">
              <label for="phone">Numero di telefono *</label>
              <br />
              <input
                type="number"
                name="phone"
                placeholder="+39...."
                v-model="phone"
                value=""
                class="form-control"
                required
              />
              <div v-if="!validation.phone.success" class="alert alert-danger">
                {{ validation.phone.message }}
              </div>
            </div>

            <div class="input-box mb-2">
              <label for="email">Email *</label>
              <br />
              <input
                type="email"
                name="email"
                placeholder="user@gmail.com"
                v-model="email"
                value=""
                class="form-control"
                required
              />
              <div v-if="!validation.email.success" class="alert alert-danger">
                {{ validation.email.message }}
              </div>
            </div>

            <div class="input-box mb-2">
              <label for="special_request">Richieste particolari</label>
              <br />
              <textarea
                v-model="special_request"
                name="special_request"
                id=""
                cols="30"
                rows="5"
                placeholder="Rischieste particolari..."
                class="form-control"
                required
              ></textarea>
            </div>

            <!-- ...content... -->

            <div class="d-flex justify-content-end">
              <button @click="validateForm()" class="form-btn btn">
                Conferma i Dati
              </button>
              <!-- <input id="createDish" type="submit" value="Salva" class="btn btn-outline-info text-decoration-none mr-2"> -->
              <!-- <a href="{{ route('user.user.index') }}" class="btn btn-outline-danger text-decoration-none">Annulla</a> -->
            </div>
          </div>
        </div>

        <div v-else class="payment-part">
          <p>Inserisci i dati del pagamento</p>
          <div class="dati-forniti">
            <p>{{ formData.surname }} {{ formData.name }}</p>
            <p>{{ formData.address }}</p>
            <p>+39 {{ formData.phone }}</p>
            <p>{{ formData.email }}</p>
          </div>
          <Payment :formData="formData" :cart="cart" />
          <!-- <button @click="beforeBuy()">Procedi con l'acquisto 🎉</button> -->
        </div>
      </div>
      <!-- <div class="right-payment">
        <h2>Riepilogo ordine</h2>
        <div class="cart">
          <div class="cart-card" v-for="plate in cart" :key="plate.id">
            <div class="plate-name">
              {{ plate.name }}
            </div>
            <div class="plate-specs">
              <span>x{{ plate.quantity }}</span>
              <span>&euro; {{ plate.price.toFixed(2) }}</span>
            </div>
          </div>
        </div>
        <div class="totale">
          <p>Totale:</p>
          <p>&euro; {{ checkoutPrice() }}</p>
        </div>
      </div> -->
    </div>
  </div>
</template>

<script>
import Payment from "./Payment.vue";
export default {
  name: "PaymentPage",
  // props: {
  //   cart:Array
  // },
  components: {
    Payment,
  },
  data() {
    return {
      cart: [],
      userSelected: "",
      userId: "",
      userEmail: "",
      formComplete: false,
      // payed: false,
      name: null,
      surname: null,
      email: null,
      phone: null,
      address: null,
      special_request: null,
      formData: {
        name: null,
        surname: null,
        email: null,
        phone: null,
        address: null,
        status: null,
        total: null,
        special_request: null,
        plates: null,
        user_id: null,
        user_email: null,
      },
      validation: {
        name: {
          success: true,
          message: "",
        },
        surname: {
          success: true,
          message: "",
        },
        email: {
          success: true,
          message: "",
        },
        address: {
          success: true,
          message: "",
        },
        phone: {
          success: true,
          message: "",
        },
      },
    };
  },
  methods: {
    validateForm() {
      console.log("validation...");
      if (!this.name) {
        this.validation.name.success = false;
        this.validation.name.message = "Il nome non può essere vuoto";
      } else if (this.name.length > 30) {
        this.validation.name.success = false;
        this.validation.name.message =
          "Il nome non può superare i 30 caratteri";
      } else {
        this.validation.name.success = true;
        this.validation.name.message = "";
      }
      // validazione cognome
      if (!this.surname) {
        this.validation.surname.success = false;
        this.validation.surname.message = "Il cognome non può essere vuoto";
      } else if (this.surname.length > 30) {
        this.validation.surname.success = false;
        this.validation.surname.message =
          "Il cognome non può superare i 30 caratteri";
      } else {
        this.validation.surname.success = true;
        this.validation.surname.message = "";
      }
      // validazione email
      if (!this.email) {
        this.validation.email.success = false;
        this.validation.email.message = "La mail non può essere vuota";
      } else if (this.email.length > 255) {
        this.validation.email.success = false;
        this.validation.email.message =
          "La mail non può superare i 255 caratteri";
      } else if (
        !this.email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)
      ) {
        this.validation.email.success = false;
        this.validation.email.message = "Formato della mail non valido";
      } else {
        this.validation.email.success = true;
        this.validation.email.message = "";
      }
      //validazione indirizzo
      if (!this.address) {
        this.validation.address.success = false;
        this.validation.address.message = "L'indirizzo non può essere vuoto";
      } else if (this.address.length > 255) {
        this.validation.address.success = false;
        this.validation.address.message =
          "L'indirizzo non può superare i 255 caratteri";
      } else {
        this.validation.address.success = true;
        this.validation.address.message = "";
      }
      // validazione telefono
      if (!this.phone) {
        this.validation.phone.success = false;
        this.validation.phone.message = "Inserire il numero di telefono";
      } else if (isNaN(this.phone)) {
        this.validation.phone.success = false;
        this.validation.phone.message =
          "Il telefono deve essere composto da numeri";
      } else if (this.phone.length < 8 || this.phone.length > 11) {
        this.validation.phone.success = false;
        this.validation.phone.message =
          "Il telefono deve essere compreso tra gli 8 e gli 11 caratteri";
      } else {
        this.validation.phone.success = true;
        this.validation.phone.message = "";
      }

      this.isValidate();
    },
    isValidate() {
      let control = true;
      for (let i in this.validation)
        if (!this.validation[i].success) control = false;

      if (!control) return;
      //se tutto va bene
      // this.waitToken = true;
      this.formData.name = this.name;
      this.formData.surname = this.surname;
      this.formData.email = this.email;
      this.formData.phone = this.phone;
      this.formData.address = this.address;
      this.formData.status = 0;
      //   this.formData.total = this.checkoutPrice();
      this.formData.plates = this.cart;
      this.formData.special_request = this.special_request;

      this.formData.user_id = this.userId;
      this.formData.user_email = this.userEmail;
      this.formComplete = true;
    },
    // beforeBuy(){
    //   this.$refs.paymentRef.$refs.paymentBtnRef.click()
    // },
    // checkoutPrice() {
    //   let total = 0;
    //   this.cart.forEach((plate) => {
    //     total += plate.price * plate.quantity;
    //     this.userSelected = plate.user.name;
    //     this.userId = plate.user.id;
    //   });
    //   return total.toFixed(2);
    // },
  },
  mounted() {
    console.log("console ok mounted payment");
    if (localStorage.cart) {
      this.cart = JSON.parse(localStorage.cart);
      window.axios
        .get("http://127.0.0.1:8000/api/user/" + this.cart[0].user_id)
        .then(({ data, status }) => {
          if (status === 200 && data.success) {
            // console.log('result', data.results.email)
            this.userEmail = data.results.email;
          }
        })
        .catch((e) => console.log(e));
      // console.log('cart', this.cart[0])
    } else {
      this.cart = [];
    }
  },
};
</script>

<style scoped lang='scss'>
@import "../../sass/_variables.scss";

#payment {
  color: $blue;
  margin-top: 1rem;
  width: min(80%, 1400px);
  margin-inline: auto;
  display: flex;
  gap: 3rem;
  h1 {
    margin-bottom: 2rem;
  }
  .left-payment {
    flex-basis: 70%;
    .form {
      & > p {
        font-size: 1rem;
      }
      padding: 1rem;
      border: 2px solid $blue;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba($color: #000000, $alpha: 0.2);
      .form-btn {
        color: #fff;
        background-color: $yellow;
        border-color: $yellow;
        &:hover {
          background-color: $blue;
          border-color: $blue;
        }
      }
    }
    .payment-part {
      & > p {
        font-size: 1rem;
      }
      .dati-forniti {
        width: 15rem;
        margin-inline: auto;
        // text-align: center;
        padding: 1rem;
        border: 2px solid $blue;
        border-radius: 5px;
        p:last-child {
          margin-bottom: 0;
        }
      }
    }
  }
  .right-payment {
    color: $blue;
    margin: 8rem auto 0;
    margin-inline-end: 0;
    min-width: 18rem;
    padding: 1rem;
    border: 2px solid $blue;
    height: fit-content;
    border-radius: 5px;
    .cart {
      font-size: 0.9rem;
      padding: 0.5rem 0 1rem;
      border-bottom: 1px solid lightgrey;
    }
    .cart-card {
      color: $blue;
      display: flex;
      justify-content: space-between;
      gap: 1rem;
    }
    .totale {
      margin-top: 1rem;
      font-weight: bold;
      text-align: end;
      font-size: 1.1rem;
      display: flex;
      justify-content: space-between;
      gap: 1rem;
      p {
        margin: 0;
      }
    }
  }
}
</style>
