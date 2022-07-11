<template>
  <div id="app_component">
    <HeaderComponent />
    <router-view></router-view>
    <FooterComponent />
    <ToTop />
  </div>
</template>

<script>
import HeaderComponent from "../components/HeaderComponent.vue";
import FooterComponent from "../components/FooterComponent.vue";
import ToTop from "../components/ToTop.vue";

export default {
  name: "AppComponent",
  components: {
    HeaderComponent,
    FooterComponent,
    ToTop,
  },
};
</script>

<style lang="scss">
@import "/resources/sass/_variables.scss";

#app_component {
  background: linear-gradient(to right, $tortora, white, $tortora);
}
</style>
