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
        <li class="nav-item dropdown">
          <a
            class="nav-link"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fa-solid fa-bars fa-xl"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Home</a></li>
            <li><a class="dropdown-item" href="#">Chi siamo</a></li>
            <li><a class="dropdown-item" href="#">Lavora con noi</a></li>
          </ul>
        </li>

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

        <li class="col-2"><a href="/home">HOME</a></li>
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
}
</style>>
