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
        "
      >
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <a href=""><i class="fa-solid fa-bars"></i></a>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Home</a></li>
            <li><a class="dropdown-item" href="#">Chi siamo</a></li>
            <li><a class="dropdown-item" href="#">Lavora con noi</a></li>
          </ul>
        </li>

        <img class="w-50" src="../img/deliveboo-logo-green.png" alt="" />

        <li></li>
        <li class="col"><a href=""></a></li>

        <li class="col-3">
          <a href=""><i class="fa-solid fa-user"></i></a>

          <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
        </li>
      </ul>
    </div>
    <div class="d-none d-md-block d-lg-block">
      <ul class="nav justify-content-center p-2 text-center align-items-center">
        <img class="col-2" src="../img/deliveboo-logo-green.png" alt="" />

        <li class="col-2"><a href="">HOME</a></li>
        <li class="col-2"><a href="">CHI SIAMO</a></li>
        <li class="col-2"><a href="">LAVORA CON NOI</a></li>
        <a class="col-1" href=""><i class="fa-solid fa-cart-shopping"></i></a>

        <li class="col-2">
          <a class="p-2" href=""> Sei un ristoratore? REGISTRATI/LOGIN</a>
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
  ul {
    list-style-type: none;
  }
}
</style>>
