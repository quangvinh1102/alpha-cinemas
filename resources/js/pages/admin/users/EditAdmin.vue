<template>
  <form @submit.prevent="updateAdmin" :form="admin">
    <a-card title="Sửa tài khoản" style="width: 100%;">
      <div class="row">
        <div class="col-12 col-sm-4">

          <div class="row">
            <div class="col-12 d-flex justify-content-center mb-3">
              <label for="input-img" class="preview">
              </label>
            </div>
            <div class="col-12 d-flex justify-content-center">
              <label class="custom-file-upload primary-color bg-info">
                <input type="file" @change="handleFileUpload" id="input-img" />
                <i class="fa fa-cloud-upload"></i> Thêm Ảnh
              </label>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-8">
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Họ và tên: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Họ và tên" v-model:value="admin.fullname" allow-clear />
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
              <a-input placeholder="Email" v-model:value="admin.email" allow-clear />
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
              <input type="checkbox" v-model="admin.change_password" />
            </div>
          </div>
          <template v-if="admin.change_password == true">
            <div class="row mb-3" >
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Mật khẩu: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input-password placeholder="Mật khẩu" v-model:value="admin.password" />
              <span v-if="errors.password" class="text-danger">{{ errors.password[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Xác nhận mật khẩu: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input-password placeholder="Xác nhận mật khẩu" v-model:value="admin.password_confinmation" />
              <span v-if="errors.password_confinmation" class="text-danger">{{ errors.password_confinmation[0] }}</span>
            </div>
          </div>
          </template>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Số điện thoại: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Nhập số điện thoại" v-model:value="admin.phone" />
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
              <a-radio-group v-model:value="admin.gender">
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
                <a-date-picker v-model:value="admin.birthday" :format="dateFormatList" />
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
          <a-button type="secondary">
            <router-link :to="{ name: 'admin' }">
              <span>Hủy</span>
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
import { defineComponent, reactive, ref, toRef, toRefs } from 'vue';
import axios from 'axios';
export default defineComponent({

  setup() {
    const route = useRoute();
    const store = useMenu();
    store.onSelectKeys(['admin-create']);

    const dateFormatList = 'DD/MM/YYYY';
    const errors = ref({});

    const admin = reactive({
      fullname: '',
      email: '',
      avatar: null,
      password: '',
      password_confinmation: '',
      change_password: false,
      phone: '',
      gender: 1,
      birthday: '',
    });

    const handleFileUpload = (event) => {
      admin.avatar = event.target.files[0];

      let img = document.createElement('img')
      img.src = URL.createObjectURL(admin.avatar)
      document.querySelector('.preview').appendChild(img)
      document.getElementsByTagName('img')[0].style = "width: 100%; height: 100%;"
    };

    const getAdmin = () => axios.get(`/api/admin/${route.params.id}/edit`)
      .then((response) => {
        admin.id = response.data.id
        admin.fullname = response.data.fullname
        admin.email = response.data.email
        admin.phone = response.data.phone
        admin.gender = response.data.gender
        admin.birthday = dayjs(response.data.birthday)
      })
      .catch((err) => {
        console.log(err);
      });
    getAdmin();


    const updateAdmin = async () => {
      const formData = new FormData();
      formData.append('fullname', admin.fullname);
      formData.append('email', admin.email);
      formData.append('avatar', admin.avatar);
      formData.append('password', admin.password);
      formData.append('password_confinmation', admin.password_confinmation);
      formData.append('change_password', admin.change_password);
      formData.append('phone', admin.phone);
      formData.append('gender', admin.gender);
      formData.append('birthday', admin.birthday);

      // console.log(admin);

      axios.put(`/api/admin/${route.params.id}`, admin, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      }) 
        .then((response) => {
          // window.location.href = 'http://127.0.0.1:8000/admin/account'
          console.log(response);
        })
        .catch((err) => {
          if (err.response.status === 422) {
            errors.value = err.response.data.errors;
          }
          console.log(errors.value);
        })
    }
    return {
      birthday: ref(dayjs('01/01/2015', dateFormatList)),
      dateFormatList,
      errors,
      admin,
      // ...toRefs(admin),
      updateAdmin,
      handleFileUpload
    };
  }
})
</script>
<style scoped>
input[type="file"] {
  display: none;
}

.custom-file-upload {
  border: 1px solid #ccc;
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
}

.preview {
  border: 2px dashed #ccc;
  width: 70%;
  display: block;
  position: relative;
  height: 250px;
  color: white;
  font-size: 22px;
  position: relative;
  border-radius: 6px;
  overflow: hidden;
  flex-direction: column;
  cursor: pointer;
}

</style>
