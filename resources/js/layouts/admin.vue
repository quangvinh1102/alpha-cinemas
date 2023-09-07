<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <TheHeader />
      </div>
      <div class="col-12">
        <div class="row">
          <div class="col-3 d-none d-md-flex  ">
            <a-card title="Menu" style="width: 100%">
              <template #extra> <i class="fa-solid fa-bars"></i></template>
              <TheMenu />
            </a-card>
          </div>
          <div class="col-9">
            <router-view></router-view>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TheHeader from '../components/admin/TheHeader.vue';
import TheMenu from '../components/admin/TheMenu.vue';
export default {
  components: { TheHeader, TheMenu },
  

}
</script>

<style></style>