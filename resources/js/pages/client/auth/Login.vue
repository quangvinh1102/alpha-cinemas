<template>
<div id="login">
        <div class="container col-lg-5  py-5 "
            style="background-color: #f8f8f8;">
            <h2 class="text-center mb-4">
                ĐĂNG NHẬP
            </h2>
            <a-form @submit.prevent="login" :form="user">
                <div class="row px-2">
                    <div class="col-12 mb-3">
                        <label for=""><span class="error">*</span>Email</label>
                        <a-input v-model:value="user.email" placeholder="Email">
                            <template #prefix>
                                <i class="fa-solid fa-envelope"></i>
                            </template>
                        </a-input>
                    </div>

                    <div class="col-12 mb-3">
                        <label> <span class="error">*</span>Mật khẩu</label>
                        <a-input-password v-model:value="user.password" placeholder="Mật khẩu">
                            <template #prefix>
                                <i class="fa-solid fa-lock"></i>
                            </template>
                        </a-input-password>
                    </div>

                    <div class="w-100 d-flex justify-content-center mb-3">
                        <button type="submit" class="btn btn-2 text-white center px-5">Đăng nhập</button>
                    </div>
                    <div class="w-100 d-flex justify-content-center">
                        <button type="submit" class="btn btn-2 text-white center px-5">Đăng nhập với tài khoản facebook</button>
                    </div>
                </div>
            </a-form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import {  reactive } from 'vue';
import { useRouter } from 'vue-router';
import { SaveInfoLogin } from '../../../stores/helper';
export default {
    setup() {
        const router = useRouter();
        const info = SaveInfoLogin();
        const user = reactive({
            email: '',
            password: '',
            // remeber: false,
        });

        const login = async ()=>{
            console.log(user);
            axios.post('api/client/login', user)
            .then((response)=>{ 
                if(response.status == 200 && response.data.status_code == 200){
                    localStorage.setItem("user_token", JSON.stringify(response.data.access_token));
                    info.onLoginUser(response.data.user);
                    router.push({ name: 'home' }); 
                }
            })
        }

        return {
            user,
            login,
        };
    }

}
</script>

<style>
#login {
    margin: 100px 0;
}

.error {
    color: red !important;
    margin: 0 10px;
}
</style>