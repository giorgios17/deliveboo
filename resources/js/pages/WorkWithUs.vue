<template>
  <div class="container p-0">
    <h1 class="py-3 work-title font-weight-bold text-center">
      {{ lavoraConDelivebooTitle }}
    </h1>
    <ul
      class="
        card-container
        w-100
        d-flex
        align-items-center
        justify-content-between
        mb-5
        mt-4
        p-0
      "
    >
      <li class="cardBox">
        <div class="card" :style="rider">
          <h2>Rider</h2>
          <div class="content" id="card_1">
            <p class="mb-2">
              Diventa un rider: flessibità, ottimi guadagni e un mondo di
              vantaggi per te.
            </p>
            <button @click="comingSoon()">Unisciti a noi</button>
          </div>
        </div>
      </li>
      <li class="cardBox">
        <div class="card" :style="ristorante">
          <h2>Ristorante</h2>
          <div class="content" id="card_1">
            <p class="mb-2">
              Diventa partner di Deliveboo e raggiungi sempre più clienti. Ci
              occupiamo noi della consegna, così che la tua unica preoccupazione
              sia continuare a preparare il miglior cibo.
            </p>
            <a href="/register"> <button>Diventa nostro partner</button></a>
          </div>
        </div>
      </li>
      <li class="cardBox">
        <div class="card" :style="lavoraConNoi">
          <h2>Lavora con noi</h2>
          <div class="content" id="card_1">
            <p class="mb-2">
              La nostra missione è trasformare il modo in cui le persone
              mangiano. E' un obbiettivo molto ambizioso, come noi, e ci servono
              persone che ci aiutino a raggiungerlo.
            </p>
            <button @click="comingSoon()">Scopri di più</button>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "workwithus",
  data() {
    return {
      rider: {
        backgroundImage:
          "url(https://cwa.roocdn.com/_next/static/riders.90e61988.jpg)",
      },
      ristorante: {
        backgroundImage:
          "url(https://cwa.roocdn.com/_next/static/restaurants.3db91a35.jpg)",
      },
      lavoraConNoi: {
        backgroundImage:
          "url(https://www.ijobs.it/wp-content/uploads/2021/08/Barilla-Lavora-con-noi-1280x720.jpg)",
      },
      lavoraConDelivebooTitle: "Lavora con Deliveboo",
    };
  },
  methods: {
    comingSoon() {
      Swal.fire({
        icon: "info",
        title: "Coming soon",
        text: "Presto disponibile!",
        showCloseButton: true,
      });
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables.scss";

h1 {
  @media screen and (max-width: 991px) {
    text-align: center;
  }
}
.card-container {
  .cardBox {
    width: 31%;
    height: 400px;
    position: relative;
    display: grid;
    place-items: center;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 10px 0px,
      rgba(0, 0, 0, 0.5) 0px 2px 25px 0px;
    .card {
      position: absolute;
      width: 95%;
      height: 95%;
      background: #000814;
      border-radius: 20px;
      z-index: 5;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
      color: black;
      overflow: hidden;
      // padding: 20px;
      cursor: pointer;
      box-shadow: rgba(0, 0, 0, 0.4) 0px 30px 60px -12px inset,
        rgba(0, 0, 0, 0.5) 0px 18px 36px -18px inset;
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      h2,
      span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2rem;
        font-weight: 800;
        pointer-events: none;
        opacity: 0.9;
        color: $blue;
        border-radius: 15px;
      }
      &:hover h2 {
        display: none;
      }
      .content p {
        font-size: 1.6rem;
        line-height: 25px;
        color: $tortora;
        padding: 0px 10px;
      }
      .content {
        transform: translateY(100%);
        opacity: 0;
        transition: 1s ease-in-out;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        button {
          font-weight: 700;
          color: white;
          font-size: 14px;
          padding: 10px;
          background-color: $blue;
          border: none;
          border-radius: 5px;
          opacity: 1;
          &:hover {
            transition: ease-in-out 0.5s;
            opacity: 0.8;
          }
        }
      }
      &:hover .content {
        transform: translateY(0);
        opacity: 1;
        background-color: rgba(0, 0, 0, 0.6);
      }
    }
    span {
      top: 75%;
    }
    @media screen and (max-width: 991px) {
      width: 75%;
    }
  }
  @media screen and (max-width: 991px) {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }
  @media (max-width: 768px) {
    .work-title {
      text-align: center;
    }
  }
}
</style>
