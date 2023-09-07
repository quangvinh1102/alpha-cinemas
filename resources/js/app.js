import "./bootstrap";
import router from "../js/router/index.js";
import { createApp } from "vue";
import { createPinia } from "pinia";
import Antd from "ant-design-vue";
import axios from "axios";
window.axios = axios;
axios.defaults.baseURL = "http://127.0.0.1:8000";
import App from "../js/App.vue";

import "ant-design-vue/dist/antd.css";
import "../css/app.css";
import "./static/fontawesome/css/all.min.css";
import "bootstrap/dist/css/bootstrap-grid.min.css";
import "bootstrap/dist/css/bootstrap-utilities.min.css";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";

const app = createApp(App);
const pinia = createPinia();
app.use(router);
app.use(pinia);
app.use(Antd);
app.mount("#app");

