<template>
  <footer>
    <div class="container">
      <div class="row pl-3">
        <!--logo deliveboo-->
        <a href="">
          <img src="../img/deliveboo-logo-yellow.svg" alt="deliveboo-logo" />
        </a>
      </div>
    </div>

    <div class="container">
      <div class="row pl-3 justify-content-between">
        <!--Sezione Contatti-->
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 pd">
          <h5>CONTATTI</h5>
          <ul>
            <li>
              <i class="fa-solid fa-headset"></i><a href="">0555-010101</a>
            </li>
            <li>
              <i class="fa-solid fa-envelope"></i>
              <a href="">deliveboo@live.it</a>
            </li>
          </ul>
        </div>

        <!--Sezione About Us-->
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 pd">
          <h5>ABOUT US</h5>
          <ul>
            <li>
              <i class="fa-solid fa-people-roof"></i><a href="">Chi siamo</a>
            </li>
          </ul>
        </div>

        <!--Sezione Download-->
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 pd">
          <h5>SCARICA APP</h5>
          <ul>
            <li>
              <i class="fa-brands fa-app-store-ios"></i
              ><a
                href="https://apps.apple.com/it/app/deliveroo-consegna-di-cibo/id1001501844"
                >App Store</a
              >
            </li>
            <li>
              <i class="fa-brands fa-google-play"></i
              ><a
                href="https://play.google.com/store/apps/details?id=com.deliveroo.orderapp&hl=it&gl=US"
                >Google Play</a
              >
            </li>
          </ul>
        </div>

        <!--Sezione Social-->
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 pd">
          <h5>SEGUICI</h5>
          <ul>
            <li>
              <i class="fa-brands fa-facebook"></i
              ><a href="https://it-it.facebook.com/DeliverooIT/">Facebook</a>
            </li>
            <li>
              <i class="fa-brands fa-twitter"></i
              ><a href="https://twitter.com/deliveroo_italy">Twitter</a>
            </li>
            <li>
              <i class="fa-brands fa-instagram"></i
              ><a href="https://www.instagram.com/deliveroo_italy/?hl=it"
                >Instagram</a
              >
            </li>
          </ul>
        </div>

        <!--Sezione Pagamenti-->
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 pd">
          <h5>PAGAMENTI</h5>
          <ul>
            <li>
              <i class="fa-brands fa-cc-mastercard"></i
              ><a href="">Mastercard</a>
            </li>
            <li><i class="fa-brands fa-cc-visa"></i><a href="">Visa</a></li>
            <li><i class="fa-brands fa-paypal"></i><a href="">PayPal</a></li>
            <li>
              <i class="fa-brands fa-cc-apple-pay"></i><a href="">Apple Pay</a>
            </li>
          </ul>
        </div>

        <div class="col-md-4 pd"></div>
      </div>
    </div>

    <!--sezione copyright-->
    <div class="container">
      <div class="row pl-3">
        <div class="col-12 pd">
          <h5>COPYRIGHT BY</h5>
          <ul>
            <li>
              <i class="fa-brands fa-github"></i
              ><a href="https://github.com/Lucavit9">Luca</a>
            </li>
            <li>
              <i class="fa-brands fa-github"></i
              ><a href="https://github.com/Ciro97cu">Ciro</a>
            </li>
            <li>
              <i class="fa-brands fa-github"></i
              ><a href="https://github.com/giorgios17">Giorgio</a>
            </li>
            <li>
              <i class="fa-brands fa-github"></i
              ><a href="https://github.com/emicif">Emanuela</a>
            </li>
            <li>
              <i class="fa-brands fa-github"></i
              ><a href="https://github.com/DavideVenturelli12">Davide</a>
            </li>
          </ul>
        </div>

        <!--sezione termini e condizioni-->
        <div class="col-12 terms-privacy">
          <ul id="privacy">
            <li><a href="">Privacy Policy</a></li>
            <li><a href="">Terms e Condiction</a></li>
            <li><a href="">Cookies Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>


<script>
export default {
  name: "FooterComponent",
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

footer {
  background-color: hsl(201deg 100% 14%);
  color: white;
  img {
    width: 70%;
    margin: 40px 0;
  }
  h5 {
    @include h5(white);
    padding-top: 10px;
  }
  .pd {
    padding: 0;
  }
  ul {
    list-style: none;
    padding: 0;
    li {
      margin-top: 5px;
      a {
        text-decoration: none;
        color: hsl(53deg 37% 77%);
      }
      a:hover {
        text-decoration: underline;
      }
      i {
        margin-right: 10px;
      }
    }
  }

  .terms-privacy {
    text-align: center;

    li {
      display: inline-block;
      padding: 20px;
      a {
        text-decoration: none;
        color: gray;
        font-size: 12px;
        padding-bottom: 20px;
      }
    }
  }

  @media screen and (max-width: 250px) {
    ul > li > a {
      font-size: 0.75rem;
    }
  }
  @media screen and (max-width: 175px) {
    ul > li > a {
      font-size: 0.65rem;
    }
  }
}
</style>
