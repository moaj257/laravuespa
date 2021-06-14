import Vue from 'vue';
import router from './router/index';

import App from './appview.vue';

new Vue({
    router,
    render: h => h(App)
}).$mount('#app');