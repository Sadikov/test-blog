import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

const http = {
    client: client,
    articles: {
        async getBySlug(slug) {
            slug = encodeURI(slug);
            return await client.get('/article/show/' + encodeURI(slug));
        },
        async getList(page) {
            return await client.get('/article/list?page=' + page);
        },
        async likeArticle(articleId) {
            return await client.get('/article/like/' + articleId);
        },
        async incrementViews(articleId) {
            return await client.get('/article/viewed/' + articleId);
        },
        async sendComment(articleId, comment) {
            return await client.post('/article/comments/add/', {
                id: articleId, subject: comment.subject, text: comment.text
            })
        }
    },
};

export default http;

