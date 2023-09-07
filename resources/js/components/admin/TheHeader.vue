<template>
    <div class="row p-3 d-flex align-items-center" style="background-color: aquamarine">
        <div class="col-4 d-md-none d-flex justify-content-start" @click="showDrawer()">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="col-4 col-md-12 d-flex justify-content-center justify-content-sm-start">
            <a-avatar :src="admin.avatar" :size="32" />
            <span class="p-1">{{ admin.fullname }}</span>
            <a-button type="primary"  @click="logout">
                Logout
            </a-button>
        </div>
        <div class="col-4 d-md-none d-flex justify-content-end">
            <i class="fa-solid fa-gear"></i>
        </div>
    </div>
    <a-drawer v-model:visible="visible" class="custom-class" style="color: black" title="Menu" placement="left">
        <TheMenu />
    </a-drawer>
</template>

<script>
import { defineComponent, ref } from "vue";
import { UserOutlined } from "@ant-design/icons-vue";
import TheMenu from "./TheMenu.vue";
import axios from "axios";
import { useRouter } from "vue-router"; 
export default defineComponent({
    setup() {
        const visible = ref(false);
        const showDrawer = () => {
            visible.value = true;
        };
        const admin = ref([]);
        const router = useRouter();

        const getAdminInfo = () => {
            axios.get('api/admin')
                .then((response) => {
                    // console.log(response);
                    if (response.status == 200 && response.data.status_code == 200) {
                        admin.value = response.data.admin;
                        // console.log(admin.value.id);
                    }
                    return response.data.message;
                })
        }
        getAdminInfo();
        // console.log(admin);

        const logout = () => {
            axios.get('api/admin/logout')
            .then((response)=>{
                console.log(response);
                if(response.status == 200 && response.data.status_code == 200){
                    localStorage.removeItem('admin_token');
                    router.push({ name: 'admin-login' });
                }
            })
        }
        return {
            visible,
            showDrawer,
            admin,
            logout
        };
    },
    components: {
        UserOutlined,
        TheMenu,
    },
});
</script>
