<template>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form @submit.prevent="login" :form="admin">
                        <div class="d-flex flex-row align-items-center justify-content-center mb-3">
                            <p class="lead fw-normal mb-0 me-3 ">Đăng Nhập</p>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="email" id="email" class="form-control form-control-lg" placeholder="Nhập email"
                                v-model="admin.email" />
                            <label class="form-label" for="form3Example3">Email</label>
                        </div>

                        <div class="form-outline mb-3">
                            <input type="password" id="password" class="form-control form-control-lg"
                                placeholder="Nhập mật khẩu" v-model="admin.password" />
                            <label class="form-label" for="form3Example4">Mật khẩu</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" v-model="admin.remmeber"
                                    id="remmeber" />
                                <label class="form-check-label" for="form2Example3">
                                    Ghi nhớ
                                </label>
                            </div>
                            <a href="#!" class="text-body">Quên mật khẩu?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <div class="text-white mb-3 mb-md-0">
                Mario @ 2023 - alpha cinemas.
            </div>
        </div>
    </section>
</template>
<script>
import axios from 'axios';
import { reactive } from 'vue';
import { useRouter } from 'vue-router';

export default {
    setup() {
        const router = useRouter();

        const admin = reactive({
            email: '',
            password: '',
            remmeber: false,
        });

        const login = async () => {
            // console.log(admin);
            axios.post('api/admin/login', admin)
                .then((response) => {
                    console.log(response);
                    if (response.status == 200 && response.data.status_code == 200) {
                        localStorage.setItem("admin_token", JSON.stringify(response.data.access_token));
                        router.push({ name: 'admin-home' });
                    }
                })
        }

        return {
            admin,
            login,
        };
    }

}
</script>
<style scoped>
.h-custom {
    height: calc(100% - 73px);
}

@media (max-width: 450px) {
    .h-custom {
        height: 100%;
    }
}
</style>

