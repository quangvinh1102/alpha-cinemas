<template>
    <a-menu v-model:openKeys="openKeys" v-model:selectedKeys="selectedKeys" mode="inline">
        <a-menu-item key="admin-home">
            <template #icon>
                <i class="fa-solid fa-house"></i>
            </template>
            <router-link :to="{ name: 'admin-home' }" class="text-decoration-none">
                <span>Trang chủ</span>
            </router-link>
        </a-menu-item>
        <a-sub-menu >
            <template #icon>
                <i class="fa-solid fa-user"></i>
            </template>
            <template #title>Quản lý tài khoản</template>
            <a-menu-item-group key="g1">
                <template #title>Khách hàng</template>
                <a-menu-item key="users">
                    <router-link :to="{ name: 'admin-users' }" class="text-decoration-none">
                        <span>Danh sách tài khoản</span>
                    </router-link>
                </a-menu-item>
            </a-menu-item-group>
            <a-menu-item-group key="g2">
                <template #title>Quản trị viên</template>
                <a-menu-item key="admin">
                    <router-link :to="{ name: 'admin' }" class="text-decoration-none">
                        <span>Danh sách tài khoản</span>
                    </router-link>
                </a-menu-item>
                <a-menu-item key="admin-create">
                    <router-link :to="{ name: 'admin-create' }" class="text-decoration-none">
                        <span>Thêm tài khoản tài khoản</span>
                    </router-link>
                </a-menu-item>
            </a-menu-item-group>
        </a-sub-menu>
        <a-sub-menu >
            <template #icon>
                <i class="fa-solid fa-tv"></i>
            </template>
            <template #title>Quản lý phòng</template>
            <a-menu-item-group key="g3">
                <template #title>Phòng xem phim</template>
                <a-menu-item key="admin-rooms">
                    <router-link :to="{ name: 'admin-rooms' }" class="text-decoration-none">
                        <span>Danh sách Phòng</span>
                    </router-link>
                </a-menu-item>
                <a-menu-item key="admin-rooms-create">
                    <router-link :to="{ name: 'admin-rooms-create' }" class="text-decoration-none">
                        <span>Thêm phòng</span>
                    </router-link>
                </a-menu-item>
            </a-menu-item-group>
        </a-sub-menu>
        <a-sub-menu >
            <template #icon>
                <i class="fa-solid fa-film"></i>
            </template>
            <template #title>Quản lý phim</template>
            <a-menu-item-group key="g4">
                <template #icon>
                    <i class="fa-solid fa-film"></i>
                </template>
                <template #title>Quản lý danh mục phim</template>
                <a-menu-item key="admin-categories">
                    <router-link :to="{ name: 'admin-categories' }" class="text-decoration-none">
                        <span>Danh danh mục</span>
                    </router-link>
                </a-menu-item>
                <a-menu-item key="admin-categories-create">
                    <router-link :to="{ name: 'admin-categories-create' }" class="text-decoration-none">
                        <span>Thêm danh mục</span>
                    </router-link>
                </a-menu-item>
            </a-menu-item-group>
            <a-menu-item-group key="g5">
                <template #icon>
                    <i class="fa-solid fa-film"></i>
                </template>
                <template #title>Quản lý phim</template>
                <a-menu-item key="admin-movies">
                    <router-link :to="{ name: 'admin-movies' }" class="text-decoration-none">
                        <span>Danh sách phim</span>
                    </router-link>
                </a-menu-item>
                <a-menu-item key="admin-movies-create">
                    <router-link :to="{ name: 'admin-movies-create' }" class="text-decoration-none">
                        <span>Thêm phim</span>
                    </router-link>
                </a-menu-item>
            </a-menu-item-group>
        </a-sub-menu>
        <a-sub-menu >
            <template #icon>
                <i class="fa-solid fa-calendar-days"></i>
            </template>
            <template #title>Quản lý lịch chiếu phim</template>
            <a-menu-item-group key="g6">
                <template #title>Lịch chiếu phim</template>
                <a-menu-item key="admin-schedules">
                    <router-link :to="{ name: 'admin-schedules' }" class="text-decoration-none">
                        <span>Danh sách lịch chiếu</span>
                    </router-link>
                </a-menu-item>
                <a-menu-item key="admin-schedules-create">
                    <router-link :to="{ name: 'admin-schedules-create' }" class="text-decoration-none">
                        <span>Thêm lịch chiếu</span>
                    </router-link>
                </a-menu-item>
            </a-menu-item-group>
        </a-sub-menu>
    </a-menu>
</template>

<script>
import { defineComponent } from 'vue';
import { useMenu } from '../../stores/use-menu.js';
import { storeToRefs } from 'pinia'

export default defineComponent({
    setup() {
        const store = useMenu();
        return {
            ...storeToRefs(store)
        };
    },
});
</script>

<style></style>