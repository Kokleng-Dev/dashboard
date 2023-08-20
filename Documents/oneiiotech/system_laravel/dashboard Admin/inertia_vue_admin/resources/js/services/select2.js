const selectOption2 = () => {
    $('.selectOption2').each(function() {
        const $p = $(this).parent();
        const self = this;
        if($(this).attr('multiple') == 'multiple'){
            const self = this;
            $(this).select2({
                placeholder: 'Please Select',
                dropdownParent: $p,
                allowClear: true,
                templateSelection: function(data){
                    if($('#select2Items')){
                        var selectedItemsContainer = $('#select2Items');
                        var selectedOptions = $(self).val();
                        selectedItemsContainer.empty();
        
                        if (selectedOptions && selectedOptions.length > 0) {
                            let i = 0
                            selectedOptions.forEach(function(option) {
                                let css = '';
                                if(i % 2 == 0){
                                    css = 'text-success'
                                } else{
                                    css = 'text-primary'
                                }
                                var optionText = $(self).find('option[value="' + option + '"]').text();
                                selectedItemsContainer.append(`${i == 0 ? '' : '&nbsp; '} <span class="badge bg-warning-subtle ${css}">${++i}.${optionText}</span>`);
                            });
                        }
                    }
                    return data.text;
                }
            });
        } else {
            if ($(this).hasClass("select2-hidden-accessible")) {
                // Select2 has been initialized
                $(this).select2('destroy');
            }
            $(this).select2({
                dropdownParent: $p,
            }).on('change', function(e) {
                // if($('#select2Items')){
                //     if($(self).val().length == 0){
                //         $('#select2Items').empty();
                //     }
                // }
                $(self).val(e.target.value);
            });
        }
    });
}

export { selectOption2 }