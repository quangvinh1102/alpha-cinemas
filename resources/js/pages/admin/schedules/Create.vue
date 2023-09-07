<template>
    <form @submit.prevent="creatSchedule" :form="schedules">
        <a-card title="Thêm lịch chiếu phim mới" style="width: 100%;">
            <div class="row">
                <div class="col-12 col-sm-10" id="schedule">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Chọn phim: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-select v-model:value="schedules.movie" show-search placeholder="Chọn phim"
                                style="width: 100%" :options="options" :filter-option="false"
                                :field-names="{ label: 'name', value: 'id' }"></a-select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Chọn phòng: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-select v-model:value="schedules.room" show-search placeholder="Chọn phòng"
                                style="width: 100%" :options="optionsRoom" :filter-option="false"
                                :field-names="{ label: 'name', value: 'id' }"></a-select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Thời gian chiếu: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a-space v-for="(value, index) in schedules.showtime" :key="value.id"
                                style="margin-bottom: 8px;">
                                <div class="d-flex">
                                    <a-form-item :name="['schedule', index, 'date']" style="width: 200px;">
                                        <a-date-picker v-model:value="value.date" placeholder="Chọn ngày" style="width: 100%; font-size: 16px;"  :disabled-date="disabledDate" />
                                    </a-form-item>
                                    <i class="fa-regular fa-trash-can p-2" @click="removeDate(value)"></i>
                                </div>
                                <div class="d-flex flex-column" >
                                    <a-space v-for="(time, index) in value.list_time" :key="time.id">
                                        <div class="d-flex ">
                                            <a-form-item :name="['schedule', index, 'time']" style="width: 200px;">
                                                <a-time-picker  v-model:value="time.time" placeholder="Chọn thời gian" style="width: 100%;" value-format="HH:mm"/>
                                            </a-form-item>
                                            <i class="fa-regular fa-trash-can p-2" @click="removeTime(value, time)"></i>
                                        </div>
                                    </a-space>
                                    <a-form-item>
                                        <a-button type="dashed" block @click="addTime(value)">
                                            Thêm thời gian
                                        </a-button>
                                    </a-form-item>
                                </div>
                            </a-space>
                            <a-form-item >
                                <a-button type="dashed" block @click="addDate">
                                    Thêm ngày chiều phim
                                </a-button>
                            </a-form-item>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
                            <a-button type="primary" html-type="submit" class="me-0 me-sm-3 mb-3 mb-sm-0">
                                <span>Lưu</span>
                            </a-button>
                            <a-button type="primary">
                                <!-- <router-link :to="{ name: 'admin-schedule-create' }">
                                    <span>Nhập lại</span>
                                </router-link> -->
                            </a-button>
                        </div>
                    </div>
                </div>
            </div>
        </a-card>
    </form>
</template>
  
<script>
import dayjs from 'dayjs';
import { useMenu } from '../../../stores/use-menu';
import { reactive, ref } from 'vue';
import axios from 'axios';
export default {
    setup() {
        const store = useMenu();
        store.onSelectKeys(['admin-schedule-create']);


        const errors = ref({});

        const options = ref([{}]);
        const optionsRoom = ref([{}]);
        const schedules = reactive({
            movie: undefined,
            room: undefined,
            showtime: [{
                list_time: [],
            }],

        }); 

        const disabledDate = current => { 
            return current && current < dayjs().endOf('day') ;
        };

        const removeDate = item => {
            let index = schedules.showtime.indexOf(item);
            if (index !== -1) {
                schedules.showtime.splice(index, 1);
            }
        };
        const addDate = () => {
            schedules.showtime.push({
                date: '',
                list_time: [],
                id: Date.now(),
            });
        };

        const removeTime = (arr, item) => {
            let index = arr.list_time.indexOf(item);
            if (index !== -1) {
                arr.list_time.splice(index, 1);

            }
        };
        const addTime = (item) => {
            item.list_time.push({
                time: '',
                id: Date.now(),
            })
        };

        const getData = () => {
            axios.get('/api/schedule/create')
                .then((response) => {
                    options.value = response.data.listMovie;
                    optionsRoom.value = response.data.listRoom;
                })
        }
        getData();

        const creatSchedule = async () => {
            console.log(schedules);
            axios.post('/api/schedule', schedules)
                .then((response) => {
                    if (response.status == 200) {
                        Object.assign(schedule, {
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
            dayjs,
            schedules,
            errors,
            options,
            optionsRoom,
            disabledDate,
            creatSchedule, 
            removeDate,
            removeTime,
            addDate,
            addTime

        }

    }

}
</script>
  
<style>

</style>
