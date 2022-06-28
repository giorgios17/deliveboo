<template>
  <div>
    <TypologyCard :arrayTypologies="arrayTypologies" />
  </div>
</template>

<script>
import TypologyCard from "../components/TypologyCard.vue";

export default {
  name: "HomepageComponent",
  components: {
    TypologyCard,
  },
  data() {
    return {
      arrayTypologies: [],
    };
  },
  mounted() {
    this.axiosCall("/api/typologies");
  },
  methods: {
    axiosCall(url) {
      window.axios
        .get(url)
        .then((result) => {
          this.arrayTypologies = result.data.response;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style>
</style>
