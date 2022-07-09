<template>
  <div>
    <div class="container my-5">
      <div class="row justify-content-center">
        <div
          v-scrollAnimation
          class="my-3 rotate-scale-up"
          v-for="(typology, index) in arrayTypologies"
          :key="index"
        >
          <label class="option_item shadow">
            <input
              @click="addTypology(typology.id)"
              type="checkbox"
              class="checkbox"
            />
            <div class="option_inner food">
              <div class="tickmark"></div>
              <div class="icon">
                <img
                  class="w-75 rounded-3"
                  :src="typology.image"
                  :alt="typology.name"
                />
              </div>
              <h6 class="name">{{ typology.name }}</h6>
            </div>
          </label>
        </div>
      </div>
      <div class="row justify-content-center">
        <button class="btn my-3" @click="$emit('getTypologies', getData())">
          Vai ai Ristoranti
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TypologyCard",
  props: {
    arrayTypologies: Array,
  },
  data() {
    return {
      selectedTypologies: [],
    };
  },
  methods: {
    addTypology(id) {
      if (this.selectedTypologies.includes(id)) {
        this.selectedTypologies.splice(this.selectedTypologies.indexOf(id), 1);
      } else {
        this.selectedTypologies.push(id);
      }
    },
    getData() {
      if (this.selectedTypologies.length > 0) {
        return this.selectedTypologies;
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Seleziona almeno una tipologia!",
          showCloseButton: true,
        });
        return false;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

h6 {
  @include h6($blue);
}

button {
  background-color: $blue;
  @include button($tortora, $tortora, 1rem, 600, 0.4rem 1.5rem, $yellow, $blue);
}

.container .option_item {
  display: block;
  position: relative;
  width: 175px;
  height: 175px;
  margin: 10px;
}

.container .option_item .checkbox {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
  opacity: 0;
}

.option_item .option_inner {
  width: 100%;
  height: 100%;
  background: $tortora;
  border-radius: 5px;
  text-align: center;
  cursor: pointer;
  display: block;
  border: 5px solid transparent;
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: transform 0.25s ease-in-out;
  &:hover {
    transform: scale(1.1);
  }
}

.option_item .option_inner .icon {
  margin-bottom: 10px;
}

.option_item .option_inner .name {
  user-select: none;
}

.option_item .checkbox:checked ~ .option_inner.food {
  border-color: $blue;
  color: $blue;
}

.option_item .option_inner .tickmark {
  position: absolute;
  top: -1px;
  left: -1px;
  border: 20px solid;
  border-color: $blue transparent transparent $blue;
  display: none;
}

.option_item .option_inner .tickmark:before {
  content: "";
  position: absolute;
  top: -15px;
  left: -15px;
  width: 15px;
  height: 7.5px;
  border: 3px solid;
  border-color: transparent transparent $tortora $tortora;
  transform: rotate(-45deg);
}

.option_item .checkbox:checked ~ .option_inner .tickmark {
  display: block;
}

.option_item .option_inner.food .tickmark {
  border-color: $blue transparent transparent $blue;
}

@media screen and (max-width: 250px) {
  .container .option_item {
    width: 100px;
    height: 100px;
  }
}

.before-enter {
  opacity: 0;
  transform: translateY(50%) scale(0.5);
  transition: all 1.5s ease-in-out;
}
.enter {
  opacity: 1;
  transform: translateY(0) scale(1);
}
</style>
