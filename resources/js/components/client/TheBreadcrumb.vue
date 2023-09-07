<template>
    <a-breadcrumb class="breadcrumb">
        <a-breadcrumb-item>Trang chủ</a-breadcrumb-item> 
        <a-breadcrumb-item> <span class="name-movie">{{ items.items }}</span></a-breadcrumb-item>
    </a-breadcrumb>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
    props: {
        items: Object,
    },
    setup(items){
        
        return {
        items,    
        }
    }
});
</script>

<style scoped>
.name-movie{
    color: #337ab7 !important;
}

.breadcrumb {
    margin: 20px 0;
    font-size: 30px;
    font-weight: normal;
}
</style>