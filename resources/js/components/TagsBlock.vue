<template>
    <div class="tags" v-show="tags.length">
        <template v-for="tag in tags">
            <a href="#">
                <b-badge variant="light" class="tag mr-2 btn btn-outline-info btn-xs">
                    {{ tag.name }}
                </b-badge>
            </a>
        </template>
    </div>
</template>

<script>
export default {
    name: 'TagsBlock',
    props: {
        tags: {
            type: Array,
            default: {},
        },
    },
};
</script>

<style scoped>
.tags {
    margin-bottom: 1rem;
}
</style>
