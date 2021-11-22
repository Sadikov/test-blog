<template>
    <div>
        <b-btn variant="outline-success" size="sm" @click="$emit('click')">
            <BIconHeart/>
            {{ count }}
        </b-btn>
    </div>
</template>

<script>
import {BIconHeart} from 'bootstrap-vue';

export default {
    name: 'Like',
    components: {
        BIconHeart,
    },
    props: {
        count: {
            type: Number,
            default: 0
        },
    },
};
</script>

<style scoped>

</style>
