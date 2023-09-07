<template>
  <a-table :columns="columns" :data-source="room" :scroll="{ x: 576 }">
    <template #bodyCell="{ column, index, record }">
      <template v-if="column.key === 'index'">
        <span>{{ index + 1 }}</span>
      </template>
      <template v-if="column.key === 'action'">
        <router-link :to="{ name: 'admin-rooms-edit', params: { id: record.id } }">
          <a-button type="primary" class="mx-2">
            <i class="fa-solid fa-pen-to-square"></i>
          </a-button> 
        </router-link>
        <a-button type="primary" @click="deleteRoom(record.id)">
          <i class="fa-solid fa-trash"></i>
        </a-button>
      </template>
    </template>
  </a-table>
</template>

<script>
import { message } from 'ant-design-vue';
import { defineComponent, ref } from 'vue';
import axios from 'axios';
import { useMenu } from '../../../stores/use-menu';
export default {
  setup() {
    const store = useMenu();

    store.onSelectKeys(['admin-rooms']);


    const room = ref([]);


    const columns = [
      {
        title: '#',
        key: 'index',
        width: 100,
        sorter: (a, b) => a.index - b.index,
      },
      {
        title: 'Tên phòng ',
        dataIndex: 'name',
        key: 'name'
      },
      {
        title: 'Địa chỉ',
        dataIndex: 'address',
        key: 'address'
      },
      {
        title: 'Công cụ',
        key: 'action',
        fixed: 'right',
        width: 200
      }
    ]

    const getRoom = () => axios.get('/api/room/index')
      .then((reponse) => {
        room.value = reponse.data;
      })
      .catch((error) => {
        console.log(error);
      })
    getRoom();

    const deleteRoom = (id) => axios.delete(`/api/room/${id}`)
      .then((reponse) => {
        message.success("Xóa thành công");
        getRoom()
        console.log(reponse);
      })
      .catch((error) => {
        console.log(error);
      })
    
    return {
      room,
      columns,
      deleteRoom
    }
  }

}
</script>

<style></style>
