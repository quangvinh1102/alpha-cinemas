<template>
    <div id="movie">
        <div class="container my-5">
            <a-tabs  centered>
                <a-tab-pane key="1" tab="PHIM SẮP CHIẾU">
                    <div class="row">
                        <template v-for="movie in movies" :key="movie.id">
                            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3"
                                v-if="movie.schedules.length == 0">
                                <div class="card border border-0" style="width: 18rem">
                                    <router-link :to="{ name: 'movie-detail', params: { id: movie.slug } }"
                                        class="text-decoration-none">
                                        <div class="image-container rounded-5">
                                            <img v-bind:src="movie.img" class="card-img-top  image-movie"
                                                alt="anh-movie.png" />
                                        </div>
                                    </router-link>
                                    <div class="card-body">
                                        <router-link :to="{ name: 'movie-detail', params: { id: movie.slug } }">
                                            <h5 class="card-title font-movies">
                                                {{ movie.name }}
                                            </h5>
                                        </router-link>
                                        <p class="card-text m-0">
                                            <span class="fw-bold">Thể loại: </span><span
                                                v-for="category in movie.categories" :key="category.id">{{ category.name
                                                }}&nbsp;</span>
                                        </p>
                                        <p class="card-text m-0">
                                            <span class="fw-bold">Thời Lượng: </span>{{ movie.running_time }}&nbsp;Phút
                                        </p>
                                        <p class="card-text ">
                                            <span class="fw-bold">Ngày khởi chiếu: </span>{{ movie.release_date }}
                                        </p>
                                        <!-- <a href="#" class="btn btn-2 text-white fs-5 w-100 ">MUA VÉ</a> -->
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </a-tab-pane>
                <a-tab-pane key="2" tab="PHIM ĐANG CHIẾU">
                    <div class="row">
                        <template v-for="movie in movies" :key="movie.id">
                            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3"
                                v-if="movie.schedules.length > 0">
                                <div class="card border border-0" style="width: 18rem">
                                    <router-link :to="{ name: 'movie-detail', params: { id: movie.slug } }"
                                        class="text-decoration-none">
                                        <div class="image-container rounded-5">
                                            <img v-bind:src="movie.img" class="card-img-top  image-movie"
                                                alt="anh-movie.png" />
                                        </div>
                                    </router-link>
                                    <div class="card-body">
                                        <router-link :to="{ name: 'movie-detail', params: { id: movie.slug } }">
                                            <h5 class="card-title font-movies">
                                                {{ movie.name }}
                                            </h5>
                                        </router-link>
                                        <p class="card-text m-0">
                                            <span class="fw-bold">Thể loại: </span><span
                                                v-for="category in movie.categories" :key="category.id">{{ category.name
                                                }}&nbsp;</span>
                                        </p>
                                        <p class="card-text">
                                            <span class="fw-bold">Thời Lượng: </span>{{ movie.running_time }}&nbsp;Phút
                                        </p>
                                        <a href="#" class="btn btn-2 text-white fs-5 w-100 ">MUA VÉ</a>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </a-tab-pane>
            </a-tabs>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import axios from 'axios';

export default {
    setup() {

        const movies = ref([]); 
        const getmovie = () => axios.get('/api/client/movie/index')
            .then((reponse) => {
                movies.value = reponse.data.listMovie;
            })
            .catch((error) => {
                console.log(error);
            })
        getmovie(); 
        return { 
            movies,
        };
    } 
};
</script>

<style scoped>
h5 {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
