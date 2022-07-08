import Vue from "vue";

import VueRouter from "vue-router";
import HomepageComponent from './pages/HomepageComponent';
import RestaurantComponent from './pages/RestaurantComponent';
import CartComponent from './pages/CartComponent';
import NotFound from './pages/NotFound';
import WorkWithUs from './pages/WorkWithUs';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'homepage',
            component: HomepageComponent
        },
        {
            path: '/restaurant/:slug',
            name: 'restaurant',
            component: RestaurantComponent
        },
        {
            path: '/cart',
            name: 'cart',
            component: CartComponent
        },
        {
            path: '/work-with-us',
            name: 'workwithus',
            component: WorkWithUs
        },
        {
            path: '/*',
            name: 'not_found',
            component: NotFound
        }
    ]
})

export default router;
