<template>
  <header class="container-fluid">
    <div class="d-md-none">
      <ul
        class="
          d-flex
          justify-content-between
          p-2
          text-center
          align-items-center
          m-0
        "
      >
        <div class="dropdown">
          <button
            class="btn"
            type="button"
            id="dropdownMenuButton"
            data-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fa-solid fa-bars"></i>
          </button>
          <div
            class="dropdown-menu bg_yellow"
            aria-labelledby="dropdownMenuButton"
          >
            <router-link class="dropdown-item" to="/">Home</router-link>
            <a class="dropdown-item" href="#">Chi siamo</a>
            <a class="dropdown-item" href="#">Lavora con noi</a>
          </div>
        </div>

        <img class="w-50" src="../img/deliveboo-logo-blue.svg" alt="" />

        <li class="col-4 d-flex justify-content-center">
          <a href="/admin"><i class="fa-solid fa-user fa-xl mx-3"></i></a>

          <a href=""><i class="fa-solid fa-cart-shopping fa-xl"></i></a>
        </li>
      </ul>
    </div>
    <div class="d-none d-md-block d-lg-block">
      <ul
        class="
          nav
          justify-content-evenly
          p-2
          text-center
          align-items-center
          nav_link
        "
      >
        <img class="col-2" src="../img/deliveboo-logo-blue.svg" alt="" />

        <li class="col-2"><router-link to="/">HOME</router-link></li>
        <li class="col-2"><a href="">CHI SIAMO</a></li>
        <li class="col-2"><a href="">LAVORA CON NOI</a></li>
        <a class="col-1" href=""
          ><i class="fa-solid fa-cart-shopping fa-xl"></i
        ></a>

        <li class="col-2">
          <a class="p-1" href="/admin"> Sei un ristoratore? REGISTRATI/LOGIN</a>
        </li>
      </ul>
    </div>
  </header>
</template>

<script>
export default {
  name: "HeaderComponent",
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

header {
  background-color: $yellow;
  font-weight: 700;
  ul {
    list-style-type: none;
  }
  .bg_yellow {
    background-color: $yellow;
    a {
      background-color: $yellow;
      font-weight: 700;
    }
  }
}
</style>>
