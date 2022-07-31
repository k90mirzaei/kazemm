import {createRouter, createWebHistory} from "vue-router";
import routes from "./routes";

const router = createRouter({
    history: createWebHistory(process.env.APP_URL),
    routes,
});

export default router;
