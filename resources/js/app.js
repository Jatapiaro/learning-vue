
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
Vue.use(VueAxios, window.axios);

import Wrapper from './components/Wrapper.vue';
import Home from './pages/Home.vue';

// Posts
import Posts from './pages/posts/Posts.vue';
import CreatePost from './pages/posts/CreatePost.vue';
import EditPost from './pages/posts/EditPost.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'posts',
        path: '/posts',
        component: Posts
    },
    {
        name: 'create-post',
        path: '/create-post',
        component: CreatePost
    },
    {
        name: 'edit-post',
        path: '/edit-post/:id',
        component: EditPost
    },
];

const router = new VueRouter({ mode: 'history', routes: routes });
const app = new Vue(Vue.util.extend({ router }, Wrapper)).$mount('#app');
