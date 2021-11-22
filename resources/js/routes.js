import VueRouter from 'vue-router';

import Home    from './pages/Home.vue';
import Articles from './pages/Articles.vue';
import Article  from './pages/Article.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/articles', component: Articles },
    { path: '/article/:slug', component: Article },
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    routes // short for `routes: routes`
})

export default router;
