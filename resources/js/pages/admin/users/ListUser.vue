<template>
  <a-table :columns="columns" :data-source="user" :scroll="{ x: 576 }">
    <template #bodyCell="{ column, index, record }">
      <template v-if="column.key === 'index'">
        <span>{{ index + 1 }}</span>
      </template>
      <template v-if="column.key === 'gender'">
        <span v-if="record.gender == 0" class="text-primary">Nam</span>
        <span v-else-if="record.gender == 1" class="text-danger">Nữ</span>
      </template>
      <template v-if="column.key === 'created_at'">
        <span>{{ formartDateTime(record.created_at) }}</span> 
      </template>
      <template v-if="column.key === 'action'">
        <router-link :to="{name: 'admin-users-edit', params: { id: record.id }}">
          <a-button type="primary">
            <i class="fa-solid fa-pen-to-square"></i>
          </a-button>
        </router-link>
      </template>
    </template>
  </a-table>
</template> 

<script>
import {formartDateTime} from '../../../stores/helper.js';
import { defineComponent, ref } from 'vue';
import axios from 'axios';
import { useMenu } from '../../../stores/use-menu';
export default defineComponent({
  setup() {
    const store = useMenu();
    store.onSelectKeys(['users']);

    const user = ref([]);
    const columns = [
      {
        title: '#',
        key: 'index',
        width: 100,
        sorter: (a, b) => a.index - b.index,
      },
      {
        title: 'Ảnh ',
        dataIndex: 'avatar',
        key: 'avatar'
      },
      {
        title: 'Họ và tên',
        dataIndex: 'fullname',
        key: 'fullname'
      },
      {
        title: 'Email',
        dataIndex: 'email',
        key: 'email'
      },
      {
        title: 'Điện thoại',
        dataIndex: 'phone',
        key: 'phone'
      },
      {
        title: 'Giới tính',
        dataIndex: 'gender',
        key: 'gender'
      },
      {
        title: 'Ngày tạo',
        dataIndex: 'created_at',
        key: 'created_at'
      },
      {
        title: 'Công cụ',
        key: 'action',
        fixed: 'right',
        width: 200
      }
    ];

    const getUser = () => axios.get('/api/user/index')
      .then((reponse) => {
        user.value = reponse.data;
      })
      .catch((error) => {
        console.log(error);
      })
    getUser();


    return {
      user,
      columns,
      formartDateTime
    }


  },
});
</script> 
