<template>
    <span class="views pt-1">
        <BIconEye/>
        <span>{{ count }}</span>
    </span>
</template>

<script>
import {BIconEye} from 'bootstrap-vue';

export default {
    name: 'Views',
    components: {
        BIconEye,
    },
    props: {
        count: {
            type: Number,
            default: 0,
        }
    }
};
</script>

<style scoped>

</style>
