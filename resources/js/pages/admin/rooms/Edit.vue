<template>
    <form @submit.prevent="updateRoom" :form="room">
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
import { useRoute } from 'vue-router';
import { defineComponent, reactive, ref } from 'vue';
import axios from 'axios';
export default {
    setup() {
        const route = useRoute();
        const store = useMenu();
        store.onSelectKeys(['admin-rooms']);

        const errors = ref({});

        const room = reactive({
            name: '',
            address: '',
        });


        const getAdmin = () => axios.get(`/api/room/${route.params.id}/edit`)
            .then((response) => {
                room.id = response.data.id
                room.name = response.data.name
                room.address = response.data.address
            })
            .catch((err) => {
                console.log(err);
            });
        getAdmin();

        const updateRoom = async () => {
            axios.put(`/api/room/${route.params.id}`, room)
                .then((response) => {
                    window.location.href = 'http://127.0.0.1:8000/admin/rooms'
                })
                .catch((err) => {
                    if (err.response.status === 422) {
                        errors.value = err.response.data.errors;
                    }
                    console.log(errors.value);
                })
        }
        return {
            room,
            errors,
            updateRoom
        }
    }

}
</script>

<style></style>
