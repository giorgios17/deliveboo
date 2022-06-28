<template>
  <div>
    <div class="container">
      <div class="d-flex flex-wrap">
        <div v-for="(typology, index) in arrayTypologies" :key="index">
          <img :src="typology.image" :alt="typology.name" />
          <h1>{{ typology.name }}</h1>
        </div>
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
      typologySelected: "",
    };
  },
};
</script>

<style>
</style>
