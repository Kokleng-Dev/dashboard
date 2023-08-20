
export const handleSweetAlert = (response) => {
    try {
        if(response.props.success){
            Swal.fire({
                icon: 'success',
                title: 'Sucessfully',
                html: response.props.success,
                showConfirmButton: false,
                timer: 1500
            });
            response.props.success = null;
        }
        if(response.props.error){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: response.props.error,
                showConfirmButton: true,
            });
            response.props.error = null;
        }
        if(response.props.warning){
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                html: response.props.warning,
                showConfirmButton: true,
            });
            response.props.warning = null;
        }
        if(Object.keys(response.props.errors).length > 0){
            let txt = '<ul>';
            Object.keys(response.props.errors).forEach(key => {
                txt += `<li>${response.props.errors[key]}</li>`;
            });
            txt += '</ul>';

            Swal.fire({
                icon: 'error',
                title: 'Errors',
                html: txt,
                showConfirmButton: true,
            });
            response.props.errors = {};
        }
    } catch (error) {
        throw error
    }
}