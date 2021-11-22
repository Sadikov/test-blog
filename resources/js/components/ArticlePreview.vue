<template>
    <div class="article-preview">
        <div>
            <a :href="'/#/article/' + article.slug">
                <h2>{{ article.title }}</h2>
                <b-img :src="'https://via.placeholder.com/270/' +  article.img"/>
            </a>
        </div>
        <div>
            {{ article.text }}
        </div>
        <TagsBlock :tags="article.tags"/>
        <div class="d-flex">
            <Views :count="article.views" class="mr-3"/>
            <Likes :count="article.likes" @click="likeArticle(article.id)" class="mr-2"/>
            <ShowMore :link="'/#/article/' + article.slug"/>
        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex';

import TagsBlock from './TagsBlock';
import Likes     from './Likes';
import ShowMore  from './ShowMore';
import Views     from './Views';

export default {
    name: 'Article',
    components: {
        TagsBlock,
        Likes,
        Views,
        ShowMore,
    },
    props: {
        article: {
            type: Object,
            default: {},
        },
    },
    methods: {
        ...mapActions([
            'likeArticle',
        ]),
    },
};
</script>

<style scoped>
.article-preview {
    margin-bottom: 5rem;
}
</style>
