const admin = [
    {
        path: "/admin",
        component: () => import("../layouts/admin.vue"),
        children: [
            {
                path: "",
                name: "admin-home",
                component: () => import("../pages/admin/home/Index.vue"),
            },

            // quản lý người dùng
            {
                path: "users",
                name: "admin-users",
                component: () => import("../pages/admin/users/ListUser.vue"),
            },
            {
                path: "users/:id/edit",
                name: "admin-users-edit",
                component: () => import("../pages/admin/users/EditUser.vue"),
            },

            // quản lý admin
            {
                path: "account",
                name: "admin",
                component: () => import("../pages/admin/users/ListAdmin.vue"),
            },
            {
                path: "account/create",
                name: "admin-create",
                component: () => import("../pages/admin/users/CreateAdmin.vue"),
            },
            {
                path: "account/:id/edit",
                name: "admin-edit",
                component: () => import("../pages/admin/users/EditAdmin.vue"),
            },

            // quản lý phòng
            {
                path: "rooms",
                name: "admin-rooms",
                component: () => import("../pages/admin/rooms/Index.vue"),
            },
            {
                path: "rooms/create",
                name: "admin-rooms-create",
                component: () => import("../pages/admin/rooms/Create.vue"),
            },
            {
                path: "rooms/:id/edit",
                name: "admin-rooms-edit",
                component: () => import("../pages/admin/rooms/Edit.vue"),
            },

            // quản lý danh mục phim
            {
                path: "categories",
                name: "admin-categories",
                component: () => import("../pages/admin/categories/Index.vue"),
            },
            {
                path: "categories/create",
                name: "admin-categories-create",
                component: () => import("../pages/admin/categories/Create.vue"),
            },
            {
                path: "categories/:id/edit",
                name: "admin-categories-edit",
                component: () => import("../pages/admin/categories/Edit.vue"),
            },

            // quản lý phim
            {
                path: "movies",
                name: "admin-movies",
                component: () => import("../pages/admin/movies/Index.vue"),
            },
            {
                path: "movies/create",
                name: "admin-movies-create",
                component: () => import("../pages/admin/movies/Create.vue"),
            },
            {
                path: "movies/:id/edit",
                name: "admin-movies-edit",
                component: () => import("../pages/admin/movies/Edit.vue"),
            },

            // quản lý lịch chiếu phim
            {
                path: "schedules",
                name: "admin-schedules",
                component: () => import("../pages/admin/schedules/Index.vue"),
            },
            {
                path: "schedules/create",
                name: "admin-schedules-create",
                component: () => import("../pages/admin/schedules/Create.vue"),
            },
            {
                path: "schedules/:id/edit",
                name: "admin-schedules-edit",
                component: () => import("../pages/admin/schedules/Edit.vue"),
            },
        ],
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem("admin_token") == null) {
                next({ name: "admin-login" });
            } else {
                next(); 
            }
        },
    },
    // Đăng ký đăng nhập
    {
        path: "/admin/login",
        name: "admin-login",
        component: () => import("../pages/admin/auth/Login.vue"),
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem("admin_token") == null) {
                next();
            } else {
                next({ name: 'admin-home' }); 
            }
        },
    },
];

export default admin;
