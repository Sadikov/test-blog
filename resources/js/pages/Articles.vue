<template>
    <App>
        <div class="articles" v-show="articles.list.length">
            <template v-for="article in articles.list">
                <ArticlePreview :article="article"/>
            </template>
            <b-pagination
                v-model="articles.page"
                :per-page="articles.perPage"
                :current-page="articles.currentPage"
                :total-rows="articles.totalItems"
                pills
                size="lg"
                @change="getArticles"
            />
        </div>
    </App>
</template>

<script>
import App                    from '../layout/App';
import {mapActions, mapState} from 'vuex';
import ArticlePreview         from '../components/ArticlePreview';

export default {
    name: 'Articles',
    components: {
        App, ArticlePreview,
    },
    data() {
        return {};
    },
    computed: {
        ...mapState([
            'articles',
        ]),
    },
    methods: {
        ...mapActions([
            'getArticles',
        ]),
    },
    created() {
        console.log(this.articles);
        this.getArticles(this.articles.page);
    },
};
</script>

<style scoped>
.articles {
    padding-top: 3rem;
    margin-bottom: 3rem;
}
</style>
