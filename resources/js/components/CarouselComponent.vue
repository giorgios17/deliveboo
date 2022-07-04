<template>
  <!-- carousel -->
  <div class="container-fluid bg py-5">
    <div class="row justify-content-center mb-5">
      <div class="wrapper_img">
        <img class="w-100" :src="'/storage' + review" />
      </div>
    </div>
    <div class="row justify-content-center">
      <!-- Controllo sx -->
      <div
        class="col-md-2 col-sm-4 text-center prev mb-4"
        @click="toggleImg('prev')"
      >
        <i class="fa-solid fa-2x fa-circle-chevron-left">
          <p class="mt-2">Precedente</p>
        </i>
      </div>
      <!-- Controllo dx -->
      <div
        class="col-md-2 col-sm-4 text-center next"
        @click="toggleImg('next')"
      >
        <i class="fa-solid fa-2x fa-circle-chevron-right">
          <p class="mt-2">Successivo</p>
        </i>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      reviewList: [
        {
          id: 1,
          src: "/images/reviews/review1.png",
        },
        {
          id: 2,
          src: "/images/reviews/review2.png",
        },
        {
          id: 3,
          src: "/images/reviews/review3.png",
        },
      ],

      position: 0,
    };
  },
  computed: {
    review() {
      return this.reviewList[this.position].src;
    },
  },

  methods: {
    toggleImg(type) {
      if (type === "prev") {
        this.position === 0
          ? (this.position = this.reviewList.length - 1)
          : this.position--;
      } else {
        this.position === this.reviewList.length - 1
          ? (this.position = 0)
          : this.position++;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/resources/sass/_resets";
@import "/resources/sass/_variables";
@import "/resources/sass/_mixin";

.bg {
  background-color: $blue;
}

.wrapper_img {
  width: 250px;
}

.fa-circle-chevron-left,
.fa-circle-chevron-right {
  color: $tortora;
  cursor: pointer;
  transition: transform 0.1s linear;
  &:hover {
    transform: scale(1.2);
  }
}

p {
  @include p($tortora);
}

@media screen and (max-width: 300px) {
  .wrapper_img {
    width: 150px;
  }
  .fa-circle-chevron-left,
  .fa-circle-chevron-right {
    font-size: 1.25rem;
  }
  p.mt-2 {
    font-size: 0.75rem;
  }
}

@media screen and (max-width: 200px) {
  .wrapper_img {
    width: 100px;
  }
  .fa-circle-chevron-left,
  .fa-circle-chevron-right {
    font-size: 1rem;
  }
  p.mt-2 {
    font-size: 0.5rem;
  }
}
</style>
