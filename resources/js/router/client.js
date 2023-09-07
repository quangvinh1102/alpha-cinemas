const client = [
    {
        path: "/",
        component: () => import("../layouts/client.vue"),
        children: [
            {
                path: "",
                name: "home",
                component: () => import("../pages/client/HomePage.vue"),
            },
            {
                path: "movies",
                name: "movies",
                component: () => import("../pages/client/MoviePage.vue"),
            },
            {
                path: "ticket",
                name: "ticket",
                component: () => import("../pages/client/TicketPage.vue"),
            },
            {
                path: "schedule",
                name: "schedule",
                component: () => import("../pages/client/Schedule.vue"),
            },
            {
                path: "/chi-tiet-phim/:id",
                name: "movie-detail",
                component: () => import("../pages/client/MovieDetail.vue"),
            },
            {
                path: "/:id/dat-ve/:timeId",
                name: "book-ticket",
                component: () => import("../pages/client/BookingPage.vue"),
            },
        ],
    },
    {
        path: "/",
        component: () => import("../layouts/client.vue"),
        children: [
            {
                path: "login",
                name: "login",
                component: () => import("../pages/client/auth/Login.vue"),
            },
            {
                path: "register",
                name: "register",
                component: () => import("../pages/client/auth/Register.vue"),
            },
        ],
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem("user_token") == null) {
                next();
            } else {
                next({ name: 'home' }); 
            }
        },
    },
];

export default client;
