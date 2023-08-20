import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
//theme
import '@/public/assets/css/style.css';
import '@/public/assets/js/script.js';
// import '@/assets/js/custom.js'
import master from '@/components/backends/layouts/master.vue';
import Spinner from '@/components/widgets/spinner.vue';
import route from 'ziggy-js';
import { Link } from '@inertiajs/vue3';
import ButtonCreate from '@/components/widgets/buttonCreate.vue'
import { globalMixin } from '@/configs/global';
import {Head} from '@inertiajs/vue3';
import { AppConfig } from '@/configs/app';
import ToastPlugin from 'vue-toast-notification';


createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./views/**/*.vue', { eager: true })
    const page = pages[`./views/${name}.vue`]
    page.default.layout = page != undefined ? page.default.layout || master : '';
    return page;
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    AppConfig(app,props);
    app.mixin(globalMixin);
    app.component("Link", Link)
    app.component("Spinner", Spinner)
    app.component("ButtonCreate", ButtonCreate)
    app.component("Head", Head)
    app.use(plugin)
    app.use(ToastPlugin)
    app.mount(el);
  },
  progress: {
    color: '#28a745',
    showSpinner: true,
  },
})


