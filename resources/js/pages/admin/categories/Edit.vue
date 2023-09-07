<template>
    <form @submit.prevent="update" :form="category">
        <a-card title="Thêm danh mục phim" style="width: 100%;">
            <div class="row">
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Tên danh mục: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Tên danh mục" v-model:value="category.name" @input="updateSlug" allow-clear />
                            <span v-if="errors.name" class="text-danger">{{ errors.name[0] }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Slug: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="slug" v-model:value="category.slug" allow-clear/>
                            <span v-if="errors.slug" class="text-danger">{{ errors.address[0] }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
                    <a-button type="primary" html-type="submit" class="me-0 me-sm-3 mb-3 mb-sm-0">
                        <span>Lưu</span>
                    </a-button>
                </div>
            </div>
        </a-card>
    </form>
</template>
  
<script>
import { useMenu } from '../../../stores/use-menu';
import { useRoute } from 'vue-router';
import { reactive, ref } from 'vue';
import { ChangeToSlug } from '../../../stores/helper.js';
import axios from 'axios';
export default {
    setup() {
        const route = useRoute();
        const store = useMenu();
        store.onSelectKeys(['admin-categories']);


        const errors = ref({});

        const category = reactive({
            name: '',
            slug: '',
        });
 

        const updateSlug = (e)  =>{
            category.slug = ChangeToSlug(e.target.value);
            console.log(ChangeToSlug(e.target.value));
        }

        const show = async () => {
            axios.get(`/api/category/${route.params.id}/edit`)
                .then((response) => { 
                    if (response.status == 200) {
                        category.name = response.data.name;
                        category.slug = response.data.slug;
                        errors.value = ''
                    }
                    console.log(response);
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        errors.value = error.response.data.errors;
                    }
                    console.log(errors.value);
                });
        }
        show();

        const update = async () => {
            axios.put(`/api/category/${route.params.id}`, category)
            .then((response)=>{
                console.log(response);
                history.back();
            })
            .catch((error)=>{
                console.log(error);
            });
        }
        return {
            category, 
            errors,
            updateSlug,
            update
        }

    }

}
</script>
   
