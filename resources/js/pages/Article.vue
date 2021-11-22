<template>
    <App>
        <template v-show="articles.article.id">
            <Article :article="articles.article"/>
            <Comments
                v-if="articles.article.id"
                :sendCallback="newComment"
                :published="articles.article.comments"
                class="pt-5"
            />
        </template>
    </App>
</template>

<script>
import {mapState, mapActions} from 'vuex';
import App                    from '../layout/App';
import Article                from '../components/Article';
import Comments               from '../components/Comments';

export default {
    name: 'Home',
    components: {
        App, Article, Comments,
    },
    computed: {
        ...mapState([
            'articles',
        ]),
    },
    async created() {
        await this.getArticle(this.$route.params.slug);
        setTimeout(
            async () => await this.incrementViews(this.articles.article.id),
            5000,
        );
    },
    methods: {
        ...mapActions([
            'getArticle',
            'sendComment',
            'incrementViews',
        ]),
        newComment(comment) {
            console.log(comment);
            return this.sendComment({
                id: this.articles.article.id,
                comment: comment,
            });
        },
    },
};
</script>

<style scoped>

</style>
