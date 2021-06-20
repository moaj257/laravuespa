import Vue from 'vue';
import VueRouter from 'vue-router';

import routes from './routes';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('_token');
    if (!loggedIn && to.path !== '/') {
        next('/');
        return
    } else if(loggedIn && to.path === '/') {
        next('/chat');
        return
    }
    next();
});

export default router;