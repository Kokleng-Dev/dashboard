import { ref } from 'vue';

function translate(key,props){
    return props.languages[key] || key;
}

export function useTranslation(initialPageProps) {
    const language = ref(initialPageProps);

    const __ = (key) => {
        return translate(key, language.value)
    };

    function setLanguage(newLanguage) {
        language.value = newLanguage;
    }

    return {
        __,
        setLanguage
    };
}