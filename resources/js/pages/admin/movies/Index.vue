<template>
  <a-table :columns="columns" :data-source="movie" :scroll="{ x: 576 }">
    <template #bodyCell="{ column, index, record }">
      <template v-if="column.key === 'index'">
        <span>{{ index + 1 }}</span>
      </template>
      <template v-if="column.key === 'img'">
        <a-image :width="70" :src="record.img" />
      </template>
      <template v-if="column.key === 'updated_at'">
        <span>{{ formartDateTime(record.updated_at) }}</span>
      </template>
      <template v-if="column.key === 'created_at'">
        <span>{{ formartDateTime(record.created_at) }}</span>
      </template>
      <template v-if="column.key === 'action'">
        <router-link :to="{ name: 'admin-movies-edit', params: { id: record.id } }">
          <a-button type="primary">
            <i class="fa-solid fa-pen-to-square"></i>
          </a-button>
        </router-link>
        <a-button type="dager" @click="deleteMovie(record.id)">
          <i class="fa-solid fa-trash"></i>
        </a-button>
      </template>
    </template>
  </a-table>
</template>
  
<script>
import { formartDateTime } from '../../../stores/helper';
import { defineComponent, ref } from 'vue';
import axios from 'axios';
import { useMenu } from '../../../stores/use-menu';
export default {
  setup() {
    const store = useMenu();
    store.onSelectKeys(['admin-categories']);

    const movie = ref([]);


    const columns = [
      {
        title: '#',
        key: 'index',
        width: 100,
        sorter: (a, b) => a.index - b.index,
      },
      {
        title: 'Ảnh ',
        dataIndex: 'img',
        key: 'img'
      },
      {
        title: 'Tên phim ',
        dataIndex: 'name',
        key: 'name'
      },
      {
        title: 'Ngày phát hành',
        dataIndex: 'release_date',
        key: 'release_date'
      },
      {
        title: 'Tác giả',
        dataIndex: 'director',
        key: 'director'
      },
      {
        title: 'Thời lượng ',
        dataIndex: 'running_time',
        key: 'running_time'
      },
      {
        title: 'Ngày tạo',
        dataIndex: 'created_at',
        key: 'created_at'
      },
      {
        title: 'Ngày cập nhật',
        dataIndex: 'updated_at',
        key: 'updated_at'
      },
      {
        title: 'Công cụ',
        dataIndex: 'action',
        key: 'action'
      },
    ]


    const getmovie = () => axios.get('/api/movie/index')
      .then((reponse) => {
        movie.value = reponse.data;
        console.log(reponse);
      })
      .catch((error) => {
        console.log(error);
      })
    getmovie();

    const deleteMovie = async (id) => {
      axios.delete(`api/movie/${id}`)
        .then((response) => {
          getmovie();
        })
        .catch((error) => {
          console.log(error);
        })
    }

    return {
      movie,
      columns,
      formartDateTime,
      deleteMovie
    }
  }

}
</script>
  
<style></style>
