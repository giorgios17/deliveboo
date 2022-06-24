<template>
  <div>
    <HeaderComponent />
    <router-view></router-view>
    <FooterComponent />
  </div>
</template>

<script>
import HeaderComponent from "../components/HeaderComponent.vue";
import FooterComponent from "../components/FooterComponent.vue";

export default {
  name: "AppComponent",
  components: {
    HeaderComponent,
    FooterComponent,
  },
};
</script>

<style lang="scss">
@import "../../sass/_variables.scss";
</style>
