<template>
    <div class="article-card">
        <b-card
            :title="article.title"
            :img-src="'https://via.placeholder.com/120/' + article.img "
            :img-alt="article.title"
            img-top
            style="max-width: 20rem;"
            class="mb-2"
        >
            <b-card-text>
                {{ article.text }}
            </b-card-text>
            <TagsBlock :tags="article.tags"/>
            <div class="footer">
                <Likes :count="article.likes" @click="likeArticle(article.id)"/>
                <Views :count="article.views" class="d-block"/>
                <ShowMore :link="'/#/article/' + article.slug"/>
            </div>
        </b-card>
    </div>
</template>

<script>
import {mapActions} from 'vuex';
import Likes        from './Likes';
import TagsBlock    from './TagsBlock';
import ShowMore     from './ShowMore';
import Views        from './Views';

export default {
    name: 'ArticleCard',
    components: {
        Likes, TagsBlock, ShowMore, Views,
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
.article-card {
    max-width: 300px;
}

.footer {
    display: flex;
    justify-content: space-between;
}
</style>
