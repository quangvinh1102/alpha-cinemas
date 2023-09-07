<template>
    <div id="movie-detail" class="container">
        <div class="container-fluid">
 
            <TheBreadcrumb :items="movie.name" />  
            <article class="postcard">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="img_movie p-2">
                            <img v-bind:src="movie.img" alt="movie poster" class="rounded-5 mx-auto d-block"
                                style="width: 80%;" />
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="descr_movie p-2">
                            <h2 class="h2">{{ movie.name }}</h2>
                            <span style="text-align: justify">
                                {{ movie.descrition }}
                            </span>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <h6>Đạo Diễn :</h6>
                                </div>
                                <div class="col-9"><span>{{ movie.director }}</span></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <h6>Diễn Viên :</h6>
                                </div>
                                <div class="col-9"><span>Quang Vinh, Lương Hòa</span></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <h6>Thời gian :</h6>
                                </div>
                                <div class="col-9"><span>{{ movie.running_time }}&nbsp;Phút</span></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <h6>Ngôn Ngữ :</h6>
                                </div>
                                <div class="col-9"><span>Tiếng Người</span></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <h6>Ngày Khởi Chiếu</h6>
                                </div>
                                <div class="col-9"><span>28/07/2023</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <TheShowtime :movie="movie" />
</template>

<script>
import { useRoute } from 'vue-router';
import dayjs from 'dayjs';
import { reactive, watch } from "vue";
import TheBreadcrumb from '../../components/client/TheBreadcrumb.vue';
import TheShowtime from '../../components/client/TheShowtime.vue';
export default {
    components: { TheBreadcrumb, TheShowtime },
    setup() {
        const router = useRoute();

        const movie = reactive({
            name: '',
            slug: '',
            img: '',
            descrition: '',
            release_date: '',
            categories: [],
            schedules: [],
            director: '',
            running_time: '',
        });

        const getMovie = async () => {
            axios.get(`/api/client/movie/${router.params.id}/show`)
                .then((response) => {
                    movie.name = response.data.name;
                    movie.slug = response.data.slug;
                    movie.descrition = response.data.descrition;
                    movie.release_date = dayjs(response.data.release_date);
                    movie.director = response.data.director;
                    movie.img = response.data.img;
                    movie.running_time = response.data.running_time;
                    movie.categories = response.data.categories;
                    movie.schedules = response.data.schedules;
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });
        }

        watch(router, () => {
            getMovie();
        });
        getMovie();
        return {
            movie
        }
    },
    mounted() {
        window.scrollTo(0, 0);
    },
};
</script>
