<template>
  <!-- carousel -->
  <div class="container-fluid bg py-3">
    <div class="row">
      <!-- Controllo sx -->
      <div
        class="col-2 d-flex justify-content-center align-items-center prev"
        @click="toggleImg('prev')"
      >
        <i class="fa-solid fa-4x fa-circle-chevron-left"></i>
      </div>
      <div class="col-8 d-flex justify-content-center">
        <img :src="'/storage' + review" />
      </div>
      <!-- Controllo dx -->
      <div
        class="col-2 d-flex justify-content-center align-items-center next"
        @click="toggleImg('next')"
      >
        <i class="fa-solid fa-4x fa-circle-chevron-right"></i>
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
.fa-circle-chevron-left,
.fa-circle-chevron-right {
  cursor: pointer;
  transition: transform 0.1s linear;
  &:hover {
    transform: scale(1.2);
  }
}
</style>
