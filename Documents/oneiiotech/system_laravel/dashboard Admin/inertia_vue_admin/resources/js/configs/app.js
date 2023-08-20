import { file } from '@/configs/filesystems.js';
import 'vue-toast-notification/dist/theme-bootstrap.css';
import { useToast } from 'vue-toast-notification';
// import { handleToast } from '@/services/handleToast';
import { useTranslation } from '@/services/translate'
import { handleForm } from '@/services/handleForm'
import { handleSweetAlert } from '@/services/hadleSweetAlert';
import { selectOption2 } from '@/services/select2';
// import { summernote } from '@/services/summernot';
import { useForm } from '@inertiajs/vue3';
import { ref , reactive} from 'vue';
import { usePage } from '@inertiajs/vue3';

export function AppConfig(app,props){
    const translation = useTranslation(props.initialPage.props);

    app.config.globalProperties.$route = route;
    app.config.globalProperties.$handleForm = handleForm;
    app.config.globalProperties.$useForm = useForm;
    app.config.globalProperties.$file = async (url) => await file(url);

    app.config.globalProperties.__ = translation.__;
    app.config.globalProperties.$setLanguage = translation.setLanguage;

    //toast
    app.config.globalProperties.$toast = useToast();
    window.$toast = useToast();


    window.$ref = ref;
    window.$reactive = reactive;
    window.$route = route;
    window.$handleForm = handleForm;
    window.$useForm = useForm;
    window.$usePage = usePage;
    window.$table = '';
    window.$select2 = () => selectOption2();
    window.__ = translation.__;
    window.sweetAlert = (props) => handleSweetAlert(props);
}