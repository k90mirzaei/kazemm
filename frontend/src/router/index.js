import {createRouter, createWebHistory} from "vue-router";
import routes from "@/router/routes";

const router = createRouter({
    history: createWebHistory(process.env.APP_URL),
    routes,
});

export default router;
