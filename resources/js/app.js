require('./bootstrap');

window.Vue = require('vue').default;

//Navbar is not part of the router so it must be registered here
Vue.component('navbar', require('./components/navbar.vue').default);

//Router
import VueParticles from 'vue-particles';
//import CKEditor from 'ckeditor4-vue';
Vue.use(VueParticles);
import VueRouter from 'vue-router';
import routes from './routes';
import VueCarousel from 'vue-carousel';
import "bootswatch/dist/lux/bootstrap.min.css";
Vue.use(VueCarousel);
Vue.use(VueRouter);

//Vue.use(CKEditor);

//Glyphicons
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
});