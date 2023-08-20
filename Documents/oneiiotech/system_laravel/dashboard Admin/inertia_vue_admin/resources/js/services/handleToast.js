export const handleToast = (response) => {
    try {
        if(response.props.success){
            window.$toast.open({
                message: response.props.success,
                type: 'success',
                dismissible : true,
                pauseOnHover : true,
                position: "top-right",
                duration: 3000
            });
            response.props.success = null;
        }
        if(response.props.error){
            window.$toast.open({
                message: response.props.error,
                type: 'error',
                dismissible : true,
                pauseOnHover : true,
                position: "top-right",
                duration: 3000
            });
            response.props.error = null;
        }
        if(response.props.warning){
            window.$toast.open({
                message: response.props.warning,
                type: 'warning',
                dismissible : true,
                pauseOnHover : true,
                position: "top-right",
                duration: 3000
            });
            response.props.warning = null;
        }
        if(Object.keys(response.props.errors).length > 0){
            Object.keys(response.props.errors).forEach(key => {
                window.$toast.open({
                    message: response.props.errors[key],
                    type: 'error',
                    dismissible : true,
                    pauseOnHover : true,
                    position: "top-right",
                    duration: 3000
                });
            });
            response.props.errors = {};
        }
    } catch (error) {
        throw error
    }
}