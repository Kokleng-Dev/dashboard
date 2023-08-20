import { handleSweetAlert } from "./hadleSweetAlert";
import { handleToast } from "./handleToast";
import route from 'ziggy-js';

export { handleForm , form_edit , form_delete}

const handleForm = {
    GET :  (objects) => form_edit(objects),
    POST :  async (objects) => await handleRequest(objects, 'post'),
    DELETE : (objects) => form_delete(objects)
}

async function handleRequest(objects, method){
    try {
        let { event , form , objs , callback , url , action } = objects;
        const ojs = {
            onSuccess: (response) => {
                if(action === 'create'){
                    $('#create').modal('hide');
                    window.$table.ajax.reload();
                }
                if(action === 'update'){
                    $('#edit').modal('hide');
                    window.$table.ajax.reload();
                }
                if(callback){
                    callback(response);
                }
                if(response.props.success){
                    form.reset();
                    window.$select2();
                }
                $(event.target)[0].reset();
                $(event.target).removeClass('was-validated');
                // handleSweetAlert(response);
                handleToast(response);
                form.clearErrors();
            }
        }
        if(objs){
            Object.keys(objs).forEach(key => {
                ojs[key] = objs[key];
            }) 
        } 

        if(action == 'create' || action == 'update'){
            if (!event.target.checkValidity()){
                event.target.classList.add('was-validated');
                return ; 
            }
        }

        if(!url){
            if(action == 'create'){
                url = route('admin.bulk.store');
            }
            if(action == 'update'){
                url = route('admin.bulk.update');
            }
        }

        return await form.transform((data) => ({ ...data }))[method](url,ojs);

    } catch (error) {
        throw error;
    }
}

function form_edit(objects) {
    const {el, tbl, id, callback, form_edit = true , url } = objects;

    $(el).css({ display: "none" });
    const newbtn = `<button class="btn btn-sm btn-outline-success" disabled>
                        <div class="spinner-border text-success" role="status" style="width:0.77rem; height:0.77rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>   
                        ${window.__('Edit')} 
                    </button>`;
    let newObj = $(newbtn).insertAfter($(el));
    if(form_edit){
        disableBtnEdit(true, el);
    }

    $.ajax({
        type: 'GET',
        url: url ? url : route('admin.bulk.detail',[tbl,id]),
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            if(form_edit){
                disableBtnEdit(false);
            }
            $(newObj).remove();
            $(el).css({ display: "inline-block" });
            if (data.status == 1) {
                let res = JSON.parse(base64Decode(data.data));
                callback(res);
                $('#edit').modal('show');
                window.$select2();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: data.sms,
                    showConfirmButton: true,
                })
            }
        },
        error: function (e) {
            disableBtnEdit(false);
            $(newObj).remove();
            $(el).css({ display: "inline-block" });
        }
    });
}

function form_delete(objects) {
    const { el, tbl, per, url, callback } = objects;
    swal.fire({
        title: window.__('Delete'),
        text: window.__('Are you sure want to delete it?'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        cancelButtonColor : "#3b7ddd",
        cancelButtonText: window.__('No'),
        confirmButtonText: window.__('Yes'),
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: window.__('Processing....'),
                timerProgressBar: true,
                showCancelButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading()
                    $.ajax({
                        type: 'GET',
                        url: url ? url : route('admin.bulk.delete',[tbl,$(el).attr('attr-id'),per]),
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data.status == 1) {
                                if(typeof window.$table !== 'undefined'){
                                    window.$table.ajax.reload();
                                }
                                if(callback){
                                    let res = JSON.parse(base64Decode(data.data))
                                    callback(res);
                                }
                                Swal.fire({
                                    icon: 'success',
                                    title: data.sms,
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: data.sms,
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            }
                        },
                        error: function (e) {
                            Swal.fire({
                                icon: 'error',
                                title: e,
                                showConfirmButton: true,
                                timer: 2000
                            })
                        }
                    });
                },
                willClose: () => {
                    
                }
            });
        }
        return;
    });
}

function disableBtnEdit(check = true, obj = ''){
    const btnEdit = document.querySelectorAll('.btnEdit');
    if(check){
        btnEdit.forEach(element => {
            if(obj.isEqualNode(element)) return;
            $(element).prop('disabled',true);
        });
    } else {
        btnEdit.forEach(element => {
            $(element).prop('disabled',false);
        });
    }
}



