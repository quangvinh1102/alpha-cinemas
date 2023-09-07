<template>
  <form @submit.prevent="updateUser" :form="user">
    <a-card title="Tạo mới tài khoản" style="width: 100%;">
      <div class="row">
        <div class="col-12 col-sm-4">

          <div class="row">
            <div class="col-12 d-flex justify-content-center mb-3">
              <a-avatar shape="square" :size="200">
                <template #icon>
                  <UserOutlined />
                </template>
              </a-avatar>
            </div>
            <div class="col-12 d-flex justify-content-center">
              <a-button type="primary">
                <i class="fa-solid fa-plus me-2"></i>
                <span>Thêm ảnh</span>
              </a-button>
            </div>
          </div>
        </div>
        <!-- input hiden -->
        <input type="hidden" v-model="user.id">
        <!-- input hiden end -->
        <div class="col-12 col-sm-8">
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Họ và tên: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Họ và tên" v-model:value="user.fullname" allow-clear />
              <span v-if="errors.fullname" class="text-danger">{{ errors.fullname[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Email: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Email" v-model:value="user.email" allow-clear />
              <span v-if="errors.email" class="text-danger">{{ errors.email[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Đổi Mật Khẩu: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-checkbox v-model:checked="checked"></a-checkbox>
            </div>
          </div>
          <div class="row mb-3" v-if="checked == true">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Mật khẩu: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input-password placeholder="Mật khẩu" v-model:value="user.password" />
              <span v-if="errors.password" class="text-danger">{{ errors.password[0] }}</span>
            </div>
          </div>
          <div class="row mb-3" v-if="checked == true">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Xác nhận mật khẩu: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input-password placeholder="Xác nhận mật khẩu" v-model:value="user.password_confinmation" />
              <span v-if="errors.password_confinmation" class="text-danger">{{ errors.password_confinmation[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Số điện thoại: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Nhập số điện thoại" v-model:value="user.phone" />
              <span v-if="errors.phone" class="text-danger">{{ errors.phone[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Giới tính: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-radio-group v-model:value="user.gender">
                <a-radio :value="0">Nam</a-radio>
                <a-radio :value="1">Nữ</a-radio>
              </a-radio-group>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Ngày sinh: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-space direction="vertical" :size="12">
                <a-date-picker v-model:value="user.birthday" :format="dateFormatList" />
                <span v-if="errors.dateFormatList" class="text-danger">{{ errors.dateFormatList[0] }}</span>
              </a-space>
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
              <span>NHập lại</span>
            </router-link>
          </a-button>
        </div>
      </div>
    </a-card>
  </form>
</template>
  
<script>
import dayjs from 'dayjs';
import { useMenu } from '../../../stores/use-menu';
import { useRoute } from 'vue-router';
import { defineComponent, reactive, ref, toRef } from 'vue';
import axios from 'axios';
export default defineComponent({

  setup() {

    const route = useRoute();
    const store = useMenu();
    store.onSelectKeys(['admin-create']);

    const dateFormatList = 'DD/MM/YYYY';

    const errors = ref({});
    // const changePassword = ref({});
    const user = reactive({
      id: '',
      fullname: '',
      email: '',
      password: '',
      password_confinmation: '',
      phone: '',
      gender: 1,
      birthday: '',
    });
    
    const getUser = async () => {
      axios.get(`/api/user/${route.params.id}/edit`)
      .then((response) => {
        user.id = response.data.id
        user.fullname = response.data.fullname
        user.email = response.data.email
        user.phone = response.data.phone
        user.birthday = dayjs(response.data.birthday)
      })
      .catch((err) => {
        console.log(err);
      });
    }

    const updateUser = async () => {
      axios.put(`/api/user/${route.params.id}`, user)
      .then((response) => {
        window.location.href= 'http://127.0.0.1:8000/admin/users'
      })
      .catch((err) => {
        if (err.response.status === 422) {
            errors.value = err.response.data.errors;
          }
          console.log(errors.value); 
      })
    }
    getUser();
    return {
      birthday: ref(dayjs('01/01/2015', dateFormatList)),
      dateFormatList,
      errors,
      user,
      checked: ref(false),
      getUser,
      updateUser,
    };
  }
})
</script>
