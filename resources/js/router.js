import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./Pages/Home";
import Privacy from "./Pages/Privacy";
import SinglePost from "./Pages/SinglePost";
import PageNotFound from "./Pages/PageNotFound";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/privacy",
            name: "privacy",
            component: Privacy
        },
        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePost
        },
        {
            path: "*",
            name: "page-404",
            component: PageNotFound
        },
    ]
});

export default router