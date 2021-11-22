<template>
    <div class="article" v-if="article.id">
        <h1>{{ article.title }}</h1>
        <img v-show="article.img" :src="'https://via.placeholder.com/400/' +  article.img"/>
        <p>
            {{ article.text }}
        </p>

        <TagsBlock :tags="article.tags"/>

        <div class="d-flex flex-row pt-3">
            <Likes :count="article.likes" @click="likeArticle(article.id)"/>
            <Views :count="article.views" class="pl-3"/>
        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex';
import TagsBlock from './TagsBlock';
import Likes      from './Likes';
import ShowMore  from './ShowMore';
import Views     from './Views';

export default {
    name: 'Article',
    components: {
        TagsBlock,
        Likes,
        ShowMore,
        Views,
    },
    props: {
        article: {
            type: Object,
            default: {},
        },
    },
    methods: {
        ...mapActions([
            'likeArticle'
        ])
    }
};
</script>

<style scoped>
.article {
    padding-top: 3rem;
}
</style>
