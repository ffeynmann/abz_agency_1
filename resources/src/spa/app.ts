import {createApp} from 'vue';
import {Quasar, Dialog, Notify} from 'quasar'
import Index from "./pages/Index.vue"
import {router} from "@spa/router";

const app = createApp(Index);
app.use(router);
app.use(Quasar, {plugins: {Dialog, Notify}});
app.mount('#app');

require('./interceptors');
