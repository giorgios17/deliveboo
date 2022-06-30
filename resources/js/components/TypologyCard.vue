<template>
  <div>
    <div class="container my-5">
      <div class="row">
        <div
          class="
            col-lg-3 col-md-4 col-sm-6 col-12
            text-center
            my-3
            typology_card
          "
          v-for="(typology, index) in arrayTypologies"
          :key="index"
        >
          <router-link
            :to="{
              name: 'typologies_restaurants',
              params: { id: typology.id },
            }"
          >
            <img :src="typology.image" :alt="typology.name" />
            <h4>{{ typology.name }}</h4>
          </router-link>
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
};
</script>

<style lang="scss" scoped>
img {
  width: 100%;
  border-radius: 10px;
}
a:hover {
  text-decoration: none;
}
.typology_card {
  transition: all 0.5s;
  &:hover {
    transform: scale(1.05);
  }
}
</style>
