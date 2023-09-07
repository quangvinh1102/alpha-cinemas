<template>
  <TheSlider />
  <TheMovie />
</template>

<script>
import TheMovie from '../../components/client/TheMovie.vue'
import TheSlider from '../../components/client/TheSlider.vue'
import { pageTitle } from '../../stores/helper';
export default {
  components: { TheSlider, TheMovie },
  setup(){
    const title = pageTitle();
    title.setPageTitle('Trang chủ (Alpha Cinemas)');

    return {
      title,
    }
  }

}
</script>

<style>

</style>