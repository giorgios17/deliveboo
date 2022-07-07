<template>
  <div id="paybox" v-if="tokenGenerate" class="payment-box">
    <v-braintree
      class="brain"
      :authorization="Token"
      @success="onSuccess"
      @error="onError"
    >
      <template #button="slotProps">
        <button
          ref="paymentBtnRef"
          @click="slotProps.submit"
          style="display: none"
        ></button>
        <button class="btnPay btn mb-2" @click="beforeBuy()">
          Procedi con l'acquisto 🎉
        </button>
        <button class="btnPay btn">Modifica i tuoi dati</button>
      </template>
    </v-braintree>
    <!-- <div class="checkout">
                            <div class="total-price">
                                Totale: &euro; {{checkoutPrice()}}

                                <router-link v-if="checkoutPrice()>0" class="btn checkout-btn" :to="{name: 'payment'}">Checkout</router-link>

                                <button v-else class="btn checkout-btn">Checkout</button>
                            </div>
                                                    .checkout-btn{
                            color: #fff;
                            background-color: $secondary-color;
                            border-color: $secondary-color;
                            &:hover{
                            background-color: $primary-color;
                            border-color: $primary-color;
                            }
                        }
     -->
  </div>
</template>

<script>
export default {
  name: "Paybox",
  data() {
    return {
      Token: null,
      tokenGenerate: false,
    };
  },
  props: {
    // user: Object,
    // tot: Number,
    formData: Object,
    cart: Array,
  },
  mounted() {
    window.axios
      .get("http://127.0.0.1:8000/api/orders/generate")
      .then((response) => {
        this.Token = response.data.token;
        console.log(response.data, "genera token");
        this.tokenGenerate = true;
      })
      .catch((e) => console.log(e));
  },
  methods: {
    beforeBuy() {
      this.$refs.paymentBtnRef.click();
    },
    checkoutPrice() {
      let total = 0;
      this.cart.forEach((dish) => {
        total += dish.price * dish.quantity;
      });
      return total.toFixed(2);
    },
    onSuccess(payload) {
      let nonce = payload.nonce;
      console.log(nonce);
      window.axios
        .post(
          "http://127.0.0.1:8000/api/orders/make/payment",
          {},
          {
            params: {
              token: nonce,
              amount: this.checkoutPrice(),
            },
          }
        )
        .then((response) => {
          // console.log('nonce', nonce)
          console.log(response, "response dopo pagamento");
          if (response.data.success) {
            // console.log(this.formData)
            this.sendOrder();
          }
        })
        .catch((e) => console.log(e));
    },
    onError(error) {
      let message = error.message;
      // Whoops, an error has occured while trying to get the nonce
      console.log(message, "errore di mess in paybox");
    },
    sendOrder() {
      // window.axios.post('http://127.0.0.1:8000/api/payment')
      window.axios
        .post("http://127.0.0.1:8000/api/payment", {
          total: this.formData.total,
          customer_address: this.formData.address,
          customer_name: this.formData.name,
          customer_surname: this.formData.surname,
          customer_phone: this.formData.phone,
          special_request: this.formData.special_request,
          payment_approval: this.formData.status,
          user_id: this.formData.user_id,
          customer_email: this.formData.email,
          user_email: this.formData.user_email,
          plates: this.formData.plates,
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
@import "../../sass/_variables.scss";
#paybox {
  .brain {
    width: 50%;
    margin-inline: auto;
    .btnPay {
      color: #fff;
      background-color: $blue;
      border-color: $yellow;
      &:hover {
        background-color: $blue;
        border-color: $yellow;
      }
    }
  }
}
</style>
