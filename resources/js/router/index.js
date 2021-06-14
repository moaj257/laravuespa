import Vue from 'vue';
import VueRouter from 'vue-router';

import routes from './routes';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user');
    if (!loggedIn && to.path !== '/') {
        next('/');
        return
    }
    next();
});

export default router;