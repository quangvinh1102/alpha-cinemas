<template>
    <a-table :columns="columns" :data-source="category" :scroll="{ x: 576 }">
      <template #bodyCell="{ column, index, record }">
        <template v-if="column.key === 'index'">
          <span>{{ index + 1 }}</span>
        </template>
        <template v-if="column.key === 'action'">
          <router-link :to="{ name: 'admin-categories-edit', params: { id: record.id } }">
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
  export default {
    setup() {
      const store = useMenu();
      store.onSelectKeys(['admin-categories']);
  
      const category = ref([]);
  
  
      const columns = [
        {
          title: '#',
          key: 'index',
          width: 100,
          sorter: (a, b) => a.index - b.index,
        },
        {
          title: 'Tên danh mục ',
          dataIndex: 'name',
          key: 'name'
        },
        {
          title: 'Slug',
          dataIndex: 'slug',
          key: 'slug'
        },
        {
          title: 'Công cụ',
          dataIndex: 'action',
          key: 'action'
        },
      ]
  
  
      const getcategory = () => axios.get('/api/category/index')
        .then((reponse) => {
          category.value = reponse.data;
          console.log(reponse);
        })
        .catch((error) => {
          console.log(error);
        })
      getcategory();
  
      return {
        category,
        columns,
      }
    }
  
  }
  </script>
  
  <style></style>
