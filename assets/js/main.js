import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';

//components
import test from './components/Test';

Vue.use(VueResource);
Vue.use(VueRouter);

const routes = [
	{ path:'/', component: test }
];
const router = new VueRouter({routes});

const app = new Vue({
	router
}).$mount('#app');

