<template>
  <a-table :columns="columns" :data-source="admin" :scroll="{ x: 576 }">
    <template #bodyCell="{ column, index, record }">
      <template v-if="column.key === 'index'">
        <span>{{ index + 1 }}</span>
      </template> 
      <template v-if="column.key === 'avatar'">
        <a-image :width="70" :src="record.avatar" />
      </template>
      <template v-if="column.key === 'gender'">
        <span v-if="record.gender == 0" class="text-primary">Nam</span>
        <span v-else-if="record.gender == 1" class="text-danger">Nữ</span>
      </template>
      <template v-if="column.key === 'updated_at'">
        <span>{{ formartDateTime(record.updated_at)  }}</span> 
      </template>
      <template v-if="column.key === 'created_at'">
        <span>{{ formartDateTime(record.created_at)  }}</span> 
      </template>
      <template v-if="column.key === 'action'">
        <router-link :to="{name: 'admin-edit', params: { id: record.id }}">
          <a-button type="primary">
            <i class="fa-solid fa-pen-to-square"></i>
          </a-button>
        </router-link>
      </template>
    </template>
  </a-table>
</template> 

<script>
import { defineComponent, ref } from 'vue';
import axios from 'axios';
import { useMenu } from '../../../stores/use-menu';
import { formartDateTime } from '../../../stores/helper.js';
export default defineComponent({
  setup() {
    const store = useMenu();
    store.onSelectKeys(['admin']);

    const admin = ref([]);
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
        title: 'Ngày sửa',
        dataIndex: 'updated_at',
        key: 'updated_at'
      },
      {
        title: 'Công cụ',
        key: 'action',
        fixed: 'right',
        width: 200
      }
    ];

    const getAdmin = () => axios.get('/api/admin/index')
      .then((reponse) => {
        admin.value = reponse.data;
        console.log(reponse);
      })
      .catch((error) => {
        console.log(error);
      })
    getAdmin();
    return {
      admin,
      columns,
      formartDateTime
    }


  },
});
</script> 
