import {createRouter, createWebHistory} from "vue-router";
import UsersIndex from "@spa/pages/users/UsersIndex.vue";
import UserCreate from "@spa/pages/users/UserCreate.vue";


export const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: 'home',
            path: '/',
            component: UsersIndex
        },
        {
            name: 'user_create',
            path: '/user_create',
            component: UserCreate
        },
    ]
})
