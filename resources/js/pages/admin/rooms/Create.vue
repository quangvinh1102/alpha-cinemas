<template>
  <form @submit.prevent="createRoom" :form="room">
    <a-card title="Thêm phòng mới" style="width: 100%;">
      <div class="row">
        <div class="col-12 col-sm-8">
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Tên Phòng: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Tên Phòng" v-model:value="room.name" allow-clear />
              <span v-if="errors.name" class="text-danger">{{ errors.name[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Địa Chỉ: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Địa chỉ" v-model:value="room.address" allow-clear />
              <span v-if="errors.address" class="text-danger">{{ errors.address[0] }}</span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
          <a-button type="primary" html-type="submit" class="me-0 me-sm-3 mb-3 mb-sm-0">
            <span>Lưu</span>
          </a-button>
          <a-button type="primary">
            <router-link :to="{ name: 'admin-login' }">
              <span>Nhập lại</span>
            </router-link>
          </a-button>
        </div>
      </div>
    </a-card>
  </form>
</template>

<script>
import { useMenu } from '../../../stores/use-menu';
import { defineComponent, reactive, ref, toRef } from 'vue';
import axios from 'axios';
export default {
  setup() {
    const store = useMenu();
    store.onSelectKeys(['admin-rooms-create']);


    const errors = ref({});

    const room = reactive({
      name: '',
      address: '',
    });

    const createRoom = async () => {
      axios.post('/api/room/create', room)
        .then((response) => {
          if (response.status == 200) {
            Object.assign(room, {
              name: '',
              address: '',
            })
            errors.value = ''
          }
          console.log(response);
        })
        .catch((error) => {
          if (error.response.status === 422) {
            errors.value = error.response.data.errors;
          }
          console.log(errors.value);
        });
    }

    return {
      room,
      createRoom,
      errors,
    }

  }

}
</script>

<style></style>
