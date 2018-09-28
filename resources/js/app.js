require('./bootstrap');

window.Vue = require('vue');
window.VueRouter = require('vue-router').default;

// registering modules:
Vue.use(VueRouter);

const Navbar = Vue.component('Navbar', require('./components/Navbar.vue'));
const Addcategory = Vue.component('Addcategory', require('./components/Addcategory.vue'));
const Addrecipe = Vue.component('Addrecipe', require('./components/Addrecipe.vue'));
const Listrecipes = Vue.component('Listrecipes', require('./components/Listrecipes.vue'));
const Editrecipe = Vue.component('Editrecipe', require('./components/Editrecipe.vue'));


// routes:
const routes = [
	{
			name: 'Navbar',
			path: '/',
			component: Navbar
	},
	{
			name: 'Addcategory',
			path: '/add-recipe',
			component: Addcategory
	},    
	{
			name: 'Listrecipes',
			path: '/category/:id',
			component: Listrecipes
	},
	{
			name: 'Addrecipe',
			path: '/add-recipe/:id',
			component: Addrecipe
	},    
	{
			name: 'Editrecipe',
			path: '/edit/:id',
			component: Editrecipe
	}
];

let AppLayout = require('./components/App.vue');

const router = new VueRouter({ mode: 'history', routes });

new Vue(
	Vue.util.extend(
		{ router },
		AppLayout
	)
).$mount('#app');