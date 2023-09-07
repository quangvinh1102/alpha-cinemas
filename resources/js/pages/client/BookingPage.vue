<template>
  <div id="book-ticket" class="container">
    <div class="container-fluid">
      <TheBreadcrumb />
      <div class="row">
        <TheSeat :movieBooking="movie" />
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { useRoute } from 'vue-router';
import TheBreadcrumb from '../../components/client/TheBreadcrumb.vue';
import TheSeat from '../../components/client/TheSeat.vue';
import dayjs from 'dayjs';
import { reactive, ref, toRefs } from 'vue';
export default {
  components: { TheBreadcrumb, TheSeat },
  setup() {
    const route = useRoute()
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
    })
    const getMovieBook = () => axios.get(`/api/client/movie/${route.params.id}/show`)
      .then((responsive) => {
        movie.name = responsive.data.name;
        movie.slug = responsive.data.slug;
        movie.descrition = responsive.data.descrition;
        movie.release_date = dayjs(responsive.data.release_date);
        movie.director = responsive.data.director;
        movie.img = responsive.data.img;
        movie.running_time = responsive.data.running_time;
        movie.categories = responsive.data.categories
        movie.schedules = responsive.data.schedules
        // console.log(responsive);
      })
      .catch((error) => {
        console.log(error);
      })

    getMovieBook()

    return {
      movie
    }
  }
}
</script>

<style></style>