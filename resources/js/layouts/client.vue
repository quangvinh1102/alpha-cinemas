<template>
  <TheHeader />
  <router-view />
  <TheFooter />
</template>

<script>
import TheFooter from '../components/client/TheFooter.vue'
import TheHeader from '../components/client/TheHeader.vue'
import TheSlider from '../components/client/TheSlider.vue'
export default {
  components: { TheHeader, TheSlider, TheFooter },
}
</script>

<style>

</style>