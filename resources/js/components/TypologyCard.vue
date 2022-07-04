<template>
  <div>
    <div class="container my-5">
      <div class="row justify-content-center">
        <div
          class="my-3"
          v-for="(typology, index) in arrayTypologies"
          :key="index"
        >
          <label class="option_item">
            <input
              @click="addTypology(typology.id)"
              type="checkbox"
              class="checkbox"
            />
            <div class="option_inner facebook">
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
      console.log(this.selectedTypologies);
    },
    getData() {
      return this.selectedTypologies;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

// codice style

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
  background: #fff;
  border-radius: 5px;
  text-align: center;
  padding: 58px 40px;
  cursor: pointer;
  color: #585c68;
  display: block;
  border: 5px solid transparent;
  position: relative;
}

.option_item .option_inner .icon {
  margin-bottom: 10px;
}

.option_item .option_inner .name {
  user-select: none;
}

.option_item .checkbox:checked ~ .option_inner.facebook {
  border-color: $blue;
  color: $blue;
}

.option_item .option_inner .tickmark {
  position: absolute;
  top: -1px;
  left: -1px;
  border: 20px solid;
  border-color: #000 transparent transparent #000;
  display: none;
}

.option_item .option_inner .tickmark:before {
  content: "";
  position: absolute;
  top: -18px;
  left: -18px;
  width: 15px;
  height: 5px;
  border: 3px solid;
  border-color: transparent transparent #fff #fff;
  transform: rotate(-45deg);
}

.option_item .checkbox:checked ~ .option_inner .tickmark {
  display: block;
}

.option_item .option_inner.facebook .tickmark {
  border-color: $blue transparent transparent $blue;
}
</style>
