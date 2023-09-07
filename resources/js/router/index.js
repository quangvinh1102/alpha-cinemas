import { createRouter, createWebHistory  } from "vue-router";
import client from './client.js';
import admin from "./admin.js";

const routes = [...client, ...admin];

const router = createRouter({
    history: createWebHistory (),
    routes,
})

export default router;