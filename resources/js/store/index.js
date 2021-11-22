import Vue  from 'vue';
import Vuex from 'vuex';
import http from '../lib/api/http';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        articles: {
            list: [],
            page: 1,
            perPage: 5,
            totalItems: 1,
            article: {
                comments: [],
                newComment: '',
            },
        },
    },
    mutations: {
        setArticlesList(state, payload) {
            state.articles.list = payload.data;
            state.articles.perPage = payload.per_page;
            state.articles.currentPage = payload.current_page;
            state.articles.totalItems = payload.total;
        },
        setArticle(state, payload) {
            state.articles.article = payload;
        },
        updateArticle(state, payload) {
            state.articles.list.map(article => {
                if (article.id === payload.id) {
                    article[payload.field] = payload.value;
                }
            });
            if (state.articles.article.id === payload.id) {
                state.articles.article[payload.field] = payload.value;
            }
        },
    },
    actions: {
        async sendComment({}, data) {
            await http.articles.sendComment(data.id, data.comment);
        },
        async getArticles({commit}, page) {
            const articles = await http.articles.getList(page);
            commit('setArticlesList', articles.data);
        },
        async getArticle({commit}, slug) {
            commit('setArticle', {});
            const article = await http.articles.getBySlug(slug);
            commit('setArticle', article.data);
        },
        async likeArticle({commit, state}, articleId) {
            const request = await http.articles.likeArticle(articleId);
            const likes = request.data;
            commit('updateArticle', {
                id: articleId,
                field: 'likes',
                value: likes,
            });
        },
        async incrementViews({commit}, articleId) {
            const request = await http.articles.incrementViews(articleId);
            const views = request.data;
            commit('updateArticle', {
                id: articleId,
                field: 'views',
                value: views,
            })
        },
    },
});

export default store;
