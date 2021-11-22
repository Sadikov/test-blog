<template>
    <App>
        <div class="article-cards">
            <template v-for="article in articles.list.slice(0, 6)">
                <ArticleCard :article="article"/>
            </template>
        </div>
    </App>
</template>

<script>
import App from '../layout/App';
import {mapState, mapActions}    from 'vuex';
import ArticleCard from '../components/ArticleCard';

export default {
    name: 'Home',
    components: {
        App, ArticleCard
    },
    computed: {
        ...mapState([
            'articles'
        ])
    },
    methods: {
        ...mapActions([
            'getArticles'
        ])
    },
    created() {
        this.getArticles(1);
    }
};
</script>

<style scoped>
 .article-cards {
     display: flex;
     flex-wrap: wrap;
     justify-content: space-around;
     padding-top: 3rem;
 }
</style>
