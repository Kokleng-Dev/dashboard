import { handleToast } from '@/services/handleToast';
// import { handleSweetAlert } from '@/services/hadleSweetAlert';
import { summernote } from '@/services/summernot';
import { selectOption2 } from '@/services/select2';

export const globalMixin = {
    updated(){
        selectOption2();
        this.$setLanguage(this.$page.props);
    },
    mounted(){
      // handleSweetAlert(this.$page);
      handleToast(this.$page);
      selectOption2();
      summernote(); 
      if(window.innerWidth <= 990){
        if($('#sidebar').hasClass('collapsed')){
          console.log('asdas');
          $('#sidebar').removeClass('collapsed');
        }
      }
    },
  };
