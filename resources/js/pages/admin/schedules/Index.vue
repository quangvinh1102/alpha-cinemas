<template>
    <a-table :columns="columns" :data-source="schedule" :scroll="{ x: 576 }">
      <template #bodyCell="{ column, index, record }">
        <template v-if="column.key === 'index'">
          <span>{{ index + 1 }}</span>
        </template>
        
        <template v-if="column.key === 'action'">
          <router-link :to="{ name: 'admin-schedules-edit', params: { id: record.id } }">
            <a-button type="primary">
              <i class="fa-solid fa-pen-to-square"></i>
            </a-button>
          </router-link>
          <a-button type="dager" @click="deleteschedule(record.id)">
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
  
      const schedule = ref([]);
  
  
      const columns = [
        {
          title: '#',
          key: 'index',
          width: 100,
          sorter: (a, b) => a.index - b.index,
        },
        {
          title: 'Tên phim ',
          dataIndex: 'movie',
          key: 'movie'
        },
        {
          title: 'Tên phòng ',
          dataIndex: 'room',
          key: 'room'
        },
        {
          title: 'Ngày chiếu',
          dataIndex: 'date',
          key: 'date'
        },
        {
          title: 'Giờ chiếu',
          dataIndex: 'time',
          key: 'time'
        },
        {
          title: 'Công cụ',
          dataIndex: 'action',
          key: 'action'
        },
      ]
  
  
      const getschedule = () => axios.get('/api/schedule/index')
        .then((reponse) => {
          schedule.value = reponse.data;
          console.log(reponse);
        })
        .catch((error) => {
          console.log(error);
        })
      getschedule();
  
      const deleteschedule = async (id) => {
        console.log(id);
        axios.delete(`api/schedule/${id}`)
          .then((response) => {
            getschedule();
          })
          .catch((error) => {
            console.log(error);
          })
      }
  
      return {
        schedule,
        columns,
        formartDateTime,
        deleteschedule
      }
    }
  
  }
  </script>
    
  <style></style>
