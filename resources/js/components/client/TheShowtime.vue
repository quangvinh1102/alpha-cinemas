<template>
    <div class="container mt-5">
        <!-- <nav>
            <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist" >
                <template v-for="schedule in movie" :key="schedule.value">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" v-bind:data-bs-target="`nav-day-${schedule.value}`"
                        type="button" role="tab" v-bind:aria-controls="`nav-day-${schedule.value}`" aria-selected="true" >
                        <h3 class="color-default">{{ schedule.label }}</h3>
                    </button>
                </template>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-day-" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row align-items-center justify-content-center">
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">131 ghế trống</div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-day-9" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row align-items-center justify-content-center">
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-day-3" role="tabpanel" aria-labelledby="nav-123-tab">
                <div class="row align-items-center justify-content-center">
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div class="time p-3 text-center bg-default text-white">
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <a-tabs centered v-model:activeKey="activeKey">
            <template v-for="(schedule, index) in arrayTransformation(movie.schedules)" :key="index">
                <a-tab-pane :tab="schedule.date" force-render>
                    <div class="row align-items-center justify-content-center">
                        <div v-for="(time, index) in schedule.time" :key="index" class="col mt-3">
                            <div class="time-box">
                                <div class="time p-3 text-center bg-default text-white">
                                    <router-link :to="{ name: 'book-ticket', params: { id: schedule.slug, timeId: time.id } }">{{ time.time
                                    }}</router-link>
                                </div>
                                <div class="table mt-2 text-center">131 ghế trống</div>
                            </div>
                        </div>

                    </div>
                </a-tab-pane>
            </template>
        </a-tabs>
    </div>
</template>

<script>
import { toRefs, ref, reactive } from 'vue'
import dayjs from 'dayjs';
export default {
    props: {
        movie: Object
    },
    setup(props) {
        const movie = props.movie
        
        // console.log(movie.schedules);

        const arrayTransformation = (arr) => {
            const schedules = []
            arr.forEach(item => {
                let existingItem = schedules.find(resultItem => resultItem.date === item.date);
                if (existingItem) {
                    existingItem.time.push({time: item.time, id: item.id});
                } else {
                    schedules.push({ date: item.date, time: [{time: item.time, id: item.id}] });
                }
            });
            return schedules;
        }

        
        console.log(arrayTransformation(movie.schedules));        


        return {
            movie,
            arrayTransformation
        }
    },


}
</script>

<style></style>