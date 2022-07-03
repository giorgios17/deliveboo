import Vue from "vue";

import VueRouter from "vue-router";
import HomepageComponent from './pages/HomepageComponent';
import RestaurantComponent from './pages/RestaurantComponent';
import TypologiesRestaurants from './pages/TypologiesRestaurants';
import NotFound from './pages/NotFound';
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
            path: '/restaurants/:id',
            name: 'typologies_restaurants',
            component: TypologiesRestaurants
        },
        {
            path: '/restaurant/:slug',
            name: 'restaurant',
            component: RestaurantComponent
        },
        {
            path: '/*',
            name: 'not_found',
            component: NotFound
        }
    ]
})

export default router;
