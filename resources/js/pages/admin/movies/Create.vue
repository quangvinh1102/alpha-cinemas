<template>
    <form @submit.prevent="create" :form="movie">
        <a-card title="Thêm phim mới" style="width: 100%;">
            <div class="row">
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Tên phim: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Tên danh mục" v-model:value="movie.name" @input="updateSlug"
                                allow-clear />
                            <span v-if="errors.name" class="text-danger">{{ errors.name[0] }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Slug phim: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="slug" v-model:value="movie.slug" allow-clear />
                            <span v-if="errors.slug" class="text-danger">{{ errors.slug[0] }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Mô tả: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-textarea v-model:value="movie.descrition" placeholder="Mô tả" :rows="4" />
                            <span v-if="errors.descrition" class="text-danger">{{ errors.descrition[0] }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Ngày phát hành: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-date-picker v-model:value="movie.release_date" />
                            <span v-if="errors.release_date" class="text-danger">{{ errors.release_date[0] }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Thể loại: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5"> 
                            <a-select v-model:value="movie.categories" mode="multiple" placeholder="Inserted are removed"
                                style="width: 100%" :options="options.map(item => ({ value: item.id , label: item.name}))"></a-select>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Tác giả: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Tên tác giả" v-model:value="movie.director" allow-clear />
                            <span v-if="errors.director" class="text-danger">{{ errors.director[0] }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Thời lượng: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input-number placeholder="Thời lượng " v-model:value="movie.running_time" min="0" /> <span>
                                (min)</span>
                            <span v-if="errors.running_time" class="text-danger">{{ errors.running_time[0] }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Ảnh bìa phim: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-upload list-type="picture"  :max-count="1"
                                action="" :before-upload="uploadImage">
                                <a-button html-type="button">
                                    <i class="fa-solid fa-upload"></i>
                                    <span class="ms-2">Chọn ảnh</span>
                                </a-button>
                            </a-upload>
                            <span v-if="errors.running_time" class="text-danger">{{ errors.running_time[0] }}</span>
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
import { reactive, ref } from 'vue';
import { ChangeToSlug } from '../../../stores/helper.js';
import axios from 'axios';
export default {
    setup() {
        const store = useMenu();
        store.onSelectKeys(['admin-movies-create']);


        const errors = ref({});

        const options = ref([{}]);
        const movie = reactive({
            name: '',
            slug: '',
            file: null,
            descrition: '',
            release_date: '',
            categories: [],
            director: '',
            running_time: '',
        });


        const uploadImage = event => {
            console.log(event);
            movie.file = event;
        };

        const updateSlug = (e) => {
            movie.slug = ChangeToSlug(e.target.value);
            console.log(ChangeToSlug(e.target.value));
        }

        const create = async () => { 
            const formData = new FormData();
            formData.append('name', movie.name);
            formData.append('slug', movie.slug);
            formData.append('file', movie.file);
            formData.append('descrition', movie.descrition);
            formData.append('release_date', movie.release_date);
            formData.append('categories', JSON.stringify(movie.categories));
            formData.append('director', movie.director);
            formData.append('running_time', movie.running_time);

            axios.post('/api/movie', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
                .then((response) => {
                    if (response.status == 200) {
                        Object.assign(movie, {
                            name: '',
                            slug: '',
                            file: null,
                            descrition: '',
                            release_date: '',
                            director: '',
                            running_time: '',
                        })
                        errors.value = ''
                    }
                    console.log(response);
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        errors.value = error.response.data.errors;
                    }
                    console.log(errors);
                });
        }

        const getLitsCategories = async () => {
            axios.get('api/movie/create')
                .then((response) => {
                    options.value = response.data; 
                })
        }
        getLitsCategories();

        return {
            movie,
            errors,
            options,
            create,
            updateSlug,
            uploadImage,
        }

    }

}
</script>
   
