const page = (path) => () => import(`../views/${path}.vue`).then((m) => m.default || m);

const routes = [
    {path: "/", name: "home", component: page("index")},
]

export default routes;