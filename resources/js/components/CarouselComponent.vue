<template>
  <!-- carousel -->
  <div class="container-fluid bg py-5">
    <div class="row justify-content-center align-items-center">
      <!-- Controllo sx -->
      <div
        class="col-md-1 col-sm-2 text-center prev"
        @click="toggleImg('prev')"
      >
        <i class="fa-solid fa-2x fa-circle-chevron-left"> </i>
      </div>
      <div class="wrapper_img">
        <img class="w-100" :src="'/storage' + review" />
      </div>
      <!-- Controllo dx -->
      <div
        class="col-md-2 col-sm-2 text-center next"
        @click="toggleImg('next')"
      >
        <i class="fa-solid fa-2x fa-circle-chevron-right"> </i>
      </div>
    </div>
    <div class="row justify-content-center"></div>
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
  width: 350px;
}

.fa-circle-chevron-left,
.fa-circle-chevron-right {
  color: $tortora;
  cursor: pointer;
  transition: transform 0.25s ease-in-out;
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
