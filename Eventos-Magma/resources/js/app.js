import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import Login from './Pages/Auth/Login.vue';

const app = createApp(App);
app.component('Login', Login);
app.mount('#app');
