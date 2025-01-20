import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import '../css/app.css';
import Login from 'resources/Pages/Auth/Login.vue';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(`./Pages/Auth/Login.vue`, import.meta.glob('./Pages/Auth/Login.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});



const app = createApp(App);
app.component('Login', Login);
app.mount('#app');
