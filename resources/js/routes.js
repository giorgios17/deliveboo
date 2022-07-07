import Vue from "vue";

import VueRouter from "vue-router";
import HomepageComponent from './pages/HomepageComponent';
import RestaurantComponent from './pages/RestaurantComponent';
import CartComponent from './pages/CartComponent';
import NotFound from './pages/NotFound';
import PaymentPage from './pages/PaymentPage';
// import SuccessPayment from './pages/checkout/SuccessPayment';
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
            path: '/payment',
            name: 'payment',
            component: PaymentPage
        },
        // {
        //     path: "/payment/success",
        //     name: "success",
        //     component: SuccessPayment
        // },
        {
            path: '/*',
            name: 'not_found',
            component: NotFound
        }
    ]
})

export default router;
