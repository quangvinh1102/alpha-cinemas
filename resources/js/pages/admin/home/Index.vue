<template>
  Đây là trang chủ của admin
</template>

<script>
import { useMenu } from '../../../stores/use-menu';

export default {
    setup() {
        const store = useMenu();
        store.onSelectKeys(['admin-home']);
    },
}
</script>
