<template>
  <div
    id="to_top"
    class="
      position-fixed
      d-flex
      justify-content-center
      align-items-center
      rounded-circle
    "
    @click="toTheMoon()"
  >
    <i class="fa-solid fa-arrow-up"></i>
  </div>
</template>

<script>
export default {
  name: "ToTop",
  methods: {
    toTheMoon() {
      if (window.pageYOffset > 0) {
        window.scrollTo(0, 0);
      } else {
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
          icon: "info",
          title: "Sei già in cima alla pagina!",
        });
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables.scss";

#to_top {
  z-index: 10;
  bottom: 2.5%;
  right: 2.5%;
  width: 3rem;
  height: 3rem;
  background-color: $yellow;
  transition: all 0.25s ease-in-out;
  border: 1px solid $blue;

  &:hover {
    transform: scale(1.2) rotate(360deg);
    cursor: pointer;
    border: 3px solid $yellow;
    background-color: $blue;

    & i {
      color: $yellow;
    }
  }

  & i {
    font-size: 1.5rem;
    color: $blue;
  }

  @media screen and (max-width: 250px) {
    width: 2rem;
    height: 2rem;
    & i {
      font-size: 1rem;
    }
  }
}
</style>