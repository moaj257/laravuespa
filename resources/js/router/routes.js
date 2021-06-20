import Auth from '../pages/auth.vue';
import Chat from '../pages/chat.vue';

const routes = [
    {
        path: '/',
        name: 'auth',
        component: Auth
    }, {
        path: '/chat',
        name: 'chat',
        component: Chat
    },
];

export default routes;