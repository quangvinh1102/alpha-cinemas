<template>
    <div id="register">
        <div class="container col-lg-5 py-5 "
            style="background-color: #f8f8f8;">
            <h2 class="text-center mb-4">
                ĐĂNG KÝ TÀI KHOẢN
            </h2>
            <a-form @submit.prevent="createUser" :form="user">
                <div class="row px-2">
                    <div class="col-12 col-md-6 mb-3">
                        <label for=""><span class="error">*</span>Họ và tên</label>
                        <a-input v-model:value="user.fullname" placeholder="Họ và tên">
                            <template #prefix>
                                <i class="fa-solid fa-user"></i>
                            </template>
                        </a-input>
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label> <span class="error">*</span>Mật khẩu</label>
                        <a-input-password v-model:value="user.password" placeholder="Mật khẩu">
                            <template #prefix>
                                <i class="fa-solid fa-lock"></i>
                            </template>
                        </a-input-password>
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label> <span class="error">*</span>Email </label>
                        <a-input v-model:value="user.email" placeholder="Email">
                            <template #prefix>
                                <i class="fa-solid fa-envelope"></i>
                            </template>
                        </a-input>

                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label> <span class="error">*</span>Nhập lại mật khẩu</label>
                        <a-input-password v-model:value="user.password_confinmation" placeholder="Nhập lại mật khẩu">
                            <template #prefix>
                                <i class="fa-solid fa-lock"></i>
                            </template>
                        </a-input-password>

                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label> <span class="error">*</span>Ngày sinh</label>
                        <a-date-picker :format="dateFormatList" v-model:value="user.birthday" placeholder="Ngày Sinh"
                            style="width: 100%;" />

                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label> <span class="error">*</span>Số điện thoại</label>
                        <a-input v-model:value="user.phone" placeholder="Nhập số điện thoại">
                            <template #prefix>
                                <i class="fa-solid fa-phone"></i>
                            </template>
                        </a-input>

                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label> <span class="error">*</span>Giới tính</label>
                        <a-select v-model:value="user.gender" style="width: 100%;">
                            <a-select-option :value="0">Nam</a-select-option>
                            <a-select-option :value="1">Nữ</a-select-option>
                        </a-select>
                    </div>



                    <div class="w-100 d-flex justify-content-center">
                        <button type="submit" class="btn btn-2 text-white center px-5">Đăng ký</button>
                    </div>
                </div>
            </a-form>
        </div>
    </div>
</template>
 
<script>
import dayjs from 'dayjs';
import { message } from 'ant-design-vue';
import { useRoute } from 'vue-router';
import { reactive, ref } from 'vue';
import axios from 'axios';
export default {
    setup() {

        const router = useRoute();
        const errors = ref({});
        const dateFormatList = 'DD/MM/YYYY';
        const user = reactive({
            fullname: '',
            email: '',
            password: '',
            password_confinmation: '',
            phone: '',
            gender: 0,
            birthday: '',
        });

        const createUser = async () => {
            axios.post('http://127.0.0.1:8000/api/user/create', user)
                .then((response) => {
                    if (response.status == 200) {
                        Object.assign(user, {
                            fullname: '',
                            email: '',
                            password: '',
                            password_confinmation: '',
                            phone: '',
                            gender: 1,
                            birthday: '',
                        })
                        errors.value = '';
                        message.success("Đăng ký thành công");
                        router.push({ path: "/Login" });
                    }
                    // console.log(response);
                })
                .catch((error) => {
                    if (error.status === 422) {
                        errors.value = error.response.data.errors;
                    }
                })
        }

        return {
            birthday: ref(dayjs('01/01/2015', dateFormatList)),
            dateFormatList,
            errors,
            user,
            createUser,
        };
    },

}
</script>

<style>
#register {
    margin: 100px 0;
}

.error {
    color: red !important;
    margin: 0 10px;
}
</style>