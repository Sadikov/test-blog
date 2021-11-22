<template>
    <b-button :href="link" size="sm" variant="light">Show more</b-button>
</template>

<script>
export default {
    name: 'ShowMore',
    props: {
        link: {
            type: String,
            default: '',
        }
    }
};
</script>

<style scoped>

</style>
