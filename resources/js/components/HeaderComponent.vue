<template>
  <header class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse justify-content-center"
        id="navbarNav"
      >
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Chi siamo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Lavora con noi </a>
          </li>
        </ul>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link disabled">
                <div class="d-lg-none d-xl-none">Carrello</div>
                <div class="d-none d-lg-block d-xl-block">
                  <i class="fa-solid fa-cart-shopping"></i></div
              ></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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
}
</style>>
