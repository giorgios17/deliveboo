import Vue from "vue";

import VueRouter from "vue-router";
import HomepageComponent from './pages/HomepageComponent';
import RestaurantComponent from './pages/RestaurantComponent';
import CartComponent from './pages/CartComponent';
import AboutUsComponent from './pages/AboutUsComponent';
import PaymentSuccessfull from './pages/PaymentSuccessfull';
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
            path: '/about-us',
            name: 'about_us',
            component: AboutUsComponent
        },
        {
            path: '/work-with-us',
            name: 'workwithus',
            component: WorkWithUs
        },
        {
            path: '/success',
            name: 'success',
            component: PaymentSuccessfull
        },
        {
            path: '/*',
            name: 'not_found',
            component: NotFound
        }

    ]
})

export default router;
