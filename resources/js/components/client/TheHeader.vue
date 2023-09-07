<template>
  <div id="header" class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg container">
      <div class="container-fluid">
        <router-link :to="{ name: 'home' }" class="nav-link">
          <img src="/image/logo/logoFull.png" alt="" style="width: 150px;" />
        </router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between " id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item text-navigation ">
              <router-link :to="{ name: 'home' }" class="nav-link">
                TRANG CHỦ
              </router-link>
            </li>
            <li class="nav-item text-navigation">
              <router-link :to="{ name: 'schedule' }" class="nav-link">
                LỊCH CHIẾU
              </router-link>
            </li>
            <li class="nav-item text-navigation">
              <router-link :to="{ name: 'movies' }" class="nav-link">
                PHIM
              </router-link>
            </li>
            <li class="nav-item text-navigation">
              <router-link :to="{ name: 'ticket' }" class="nav-link">
                GIÁ VÉ
              </router-link>
            </li>
            <li class="nav-item text-navigation">
              <router-link :to="{ name: 'home' }" class="nav-link">
                ƯU ĐÃI
              </router-link>
            </li>
          </ul>
          <ul class="navbar-nav">
            <input type="text" style="width: 250px;" placeholder="Nhập Phim Cần Tìm" class="input_search"
              v-model="inputSearch" @click="handleInputClick">
            <li class="movie_search bg-dark" :style="{ display: displayStyle }" @mouseleave="handleInputBlur">
              <template v-for="movie in movies" v-bind:key="movie.id">
                <template v-if="movie.name.includes(inputSearch)">
                  <router-link :to="{ name: 'movie-detail', params: { id: movie.slug } }"
                    class="my-3 d-flex justify-content-between text-decoration-none" style="width: 250px;">
                    <img v-bind:src="movie.img" alt="" style="width: 50px; height: 50px;">
                    <p class="text-light truncate-text">{{ movie.name }}</p>
                  </router-link>
                </template>
              </template>
            </li>
          </ul>
          <ul v-if="userInfo.length == 0" class="navbar-nav ">
            <li class="nav-item ">
              <router-link :to="{ name: 'login' }" class="nav-link">
                Đăng Nhập
              </router-link>
            </li>

            <li class="nav-item ">
              <router-link :to="{ name: 'register' }" class="nav-link">
                Đăng Ký
              </router-link>
            </li>
          </ul>
          <ul v-else class="navbar-nav ">
            <div class="dropdown">
              <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-user"></i> &nbsp;
                <span>{{ userInfo.fullname }}</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                <li><a class="dropdown-item" @click="logout">Đăng xuất</a></li>
              </ul>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="box-empty"></div>
</template>

<script>
import axios from "axios";
import { storeToRefs } from "pinia";
import { defineComponent, ref, watch } from "vue";
import { useRouter } from 'vue-router';
import { SaveInfoLogin } from '../../stores/helper.js'
export default defineComponent({
  setup() {
    const router = useRouter();
    const info = SaveInfoLogin();
    const movies = ref([]);
    const inputSearch = ref("");
    const displayStyle = ref("none");

    const handleInputClick = () => {
      displayStyle.value = "block";
    };

    const handleInputBlur = () => {
      displayStyle.value = "none";
    };


    const getUserInfo = () => {
      axios.get('api/user/info')
        .then((response) => {
          if (response.status == 200 && response.data.status_code == 200) {
            // user.value = response.data.user;
            info.onLoginUser(response.data.user);
          }
          return response.data.message;
        })
    }
    if (localStorage.getItem("user_token") != null) {
      getUserInfo();
    }


    const logout = () => {
      axios.get('api/user/logout')
        .then((response) => {
          console.log(response);
          if (response.status == 200 && response.data.status_code == 200) {
            localStorage.removeItem('user_token');
            info.onLoginUser([]);
            router.push({ name: 'login' });

          }
        })
    }



    const listMovies = () => axios.get('/api/client/movie/index')
      .then((reponse) => {
        movies.value = reponse.data.listMovie;

        console.log(movies.value);
      })
      .catch((error) => {
        console.log(error);
      })
    listMovies()
    return {
      displayStyle,
      handleInputClick,
      handleInputBlur,
      inputSearch,
      movies,
      logout,
      ...storeToRefs(info),
    }
  }
});
</script>

<style scoped>
.input_search {
  position: relative;
}

.movie_search {
  position: absolute;
  top: 70px;
}
.truncate-text {
  white-space: nowrap;      
  overflow: hidden;         
  text-overflow: ellipsis;  
  max-width: 150px;         
}
</style>