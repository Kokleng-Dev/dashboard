function frm_submit(evt, isTable=true, callback = function(e){}) {
    evt.preventDefault();
    let id = $(evt.target).attr('id');
    let form = $('#' + id)[0];
    var data = new FormData(form);
    $("#btnSave").css({ display: "none" });
    const newbtn = `<button class="btn btn-sm btn-success" disabled>
                        <div class="spinner-border text-dark" role="status" style="width:0.88rem; height:0.88rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        ${btnSave}
                    </button>`;
    let newObj = $(newbtn).insertAfter($("#btnSave"));
    let route = $("#formCreate").attr('action') ? $("#formCreate").attr('action') : burl + '/admin/bulk/store';
    const addCondiction = typeof callback === 'function' && callback.toString() !== 'function(e){}' ? 1 : 0; 
    if(addCondiction){
        route = route + '?isData=1'
    }
    $.ajax({
        type: 'POST',
        url: route,
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (sms) {
            $(newObj).remove();
            $("#btnSave").css({ display: "inline-block" });
            if (sms.status) {
                $(form)[0].reset();
                if(isTable){
                    table.ajax.reload();
                }
                $('#create').modal('hide');
                if(typeof callback === 'function' && callback.toString() !== 'function(e){}'){
                    let info = JSON.parse(base64Decode(sms.data))
                    callback(info);
                } else {
                    selectOption2();
                }
                Swal.fire({
                    icon: 'success',
                    title: sms.sms,
                    showConfirmButton: false,
                    // timer: 2000
                })
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: sms.sms,
                    showConfirmButton: true,
                    timer: 2000
                })
            }
        },
        error: function (e) {
            $(newObj).remove();
            $("#btnSave").css({ display: "inline-block" });
        }
    });
}
function disableBtnEdit(check = true, obj = ''){
    const btnEdit = document.querySelectorAll('#btnEdit');
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
function selectOption2(){
    $('.select2').each(function() {
        var $p = $(this).parent();
        // Destroy existing Select2 instance
        if ($(this).hasClass('select2-hidden-accessible')) {
            $(this).select2('destroy');
        }

        if($(this).attr('multiple') !== 'multiple'){
            $(this).select2({
                dropdownParent: $p,
            });
        }else{
            var self = this;
            $(this).select2({
                placeholder: plsSelect,
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
                                selectedItemsContainer.append(`${i == 0 ? '' : '&nbsp;'}<span class="badge bg-warning-subtle ${css}">${++i}.${optionText}</span>`);
                            });
                        }
                    }
                    return data.text;
                }
            }).on('select2:unselect', function(e) {
                if($('#select2Items')){
                    if($(self).val().length == 0){
                        $('#select2Items').empty();
                    }
                }
            });
        }
    });
}
function frm_edit(obj, callback) {
    $(obj).css({ display: "none" });
    const newbtn = `<button class="btn btn-sm btn-outline-success" disabled>
                        <div class="spinner-border text-success" role="status" style="width:0.88rem; height:0.88rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>    
                    </button>`;
                    // ${btnDetail}
    let newObj = $(newbtn).insertAfter($(obj));
    disableBtnEdit(true, obj);
    $.ajax({
        type: 'GET',
        url: burl + '/admin/bulk/detail/' + $(obj).attr('tbl') + "/" + $(obj).attr('attr-id') + '/data',
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            disableBtnEdit(false);
            $(newObj).remove();
            $(obj).css({ display: "inline-block" });
            if (data.status == 1) {
                data = JSON.parse(base64Decode(data.data))
                callback(data);
                selectOption2();
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
            $(obj).css({ display: "inline-block" });
        }
    });
}

function frm_update(evt, isTable = true) {
    evt.preventDefault();
    let id = $(evt.target).attr('id');
    let form = $('#' + id)[0];
    var data = new FormData(form);
    $("#btnUpdate").css({ display: "none" });
    const newbtn = `<button class="btn btn-sm btn-success" disabled>
                        <div class="spinner-border text-dark" role="status" style="width:0.88rem; height:0.88rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        ${btnUpdate}
                    </button>`;
    let newObj = $(newbtn).insertAfter($("#btnUpdate"));
    let route = $("#formUpdate").attr('action') ? $("#formUpdate").attr('action') : burl + '/admin/bulk/update';
    $.ajax({
        type: 'POST',
        url: route,
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (sms) {
            $(newObj).remove();
            $("#btnUpdate").css({ display: "inline-block" });
            if (sms.status) {
                if(isTable){
                    table.ajax.reload();
                }
                $('#edit').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: sms.sms,
                    showConfirmButton: false,
                    timer: 2000
                })
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: sms.sms,
                    showConfirmButton: true,
                    // timer: 2000
                })
            }
        },
        error: function (e) {
            $(newObj).remove();
            $("#btnUpdate").css({ display: "inline-block" });
        }
    });
}

function btnDelete(e) {
    let route = burl + '/admin/bulk/delete/' + $(e).attr('tbl') + "/" + $(e).attr('attr-id') + '/data/' + $(e).attr('per')
    if($(e).attr('url')){
        route = $(e).attr('url');
    }
    
    swal.fire({
        title: `${aus}`,
        text: `${showTextDelete}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        cancelButtonText: `${cancelBtn}`,
        confirmButtonText: `${confirmDelete}`,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: `${titleWaiting}`,
                timerProgressBar: true,
                showCancelButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading()
                    $.ajax({
                        type: 'GET',
                        url: route,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data.status == 1) {
                                table.ajax.reload();
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
                                    showConfirmButton: true,
                                    // timer: 2000
                                })
                            }
                        },
                        error: function (e) {
                            Swal.fire({
                                icon: 'error',
                                title: e,
                                showConfirmButton: true,
                                // timer: 2000
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

function check(obj)
{
    let check = $(obj).prop('checked');
    let tds = $('.dataTable tbody tr td:first-child input');
    if(check)
    {
        for(let i=0; i<tds.length; i++)
        {
            $(tds[i]).prop('checked', true);
        }
    }
    else{
        for(let i=0; i<tds.length; i++)
        {
            $(tds[i]).prop('checked', false);
        }
    }
}

function updateData(url,data, callback = function(){}, obj = ''){
    let route = url ? url : burl + '/admin/bulk/update';
    if(data){
        let newObj;
        if(obj){
            $(obj).css({ display: "none" });
            const newbtn = `<button class="btn btn-outline-dark" type="button" disabled>
                                <div class="spinner-border text-dark" role="status" style="width:1rem; height:1rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            
                            </button>`;
        
                            // ${btnDetail}
            newObj = $(newbtn).insertAfter($(obj));
        }
        $.ajax({
            type: 'POST',
            url: route,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function (sms) {
                if(obj){
                    $(newObj).remove();
                    $(obj).css({ display: "inline-block" });
                }
                callback(sms);
                if (sms.status) {
                    Swal.fire({
                        icon: 'success',
                        title: sms.sms,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: sms.sms,
                        showConfirmButton: true,
                        // timer: 2000
                    })
                }
            },
            error: function (e) {
                if(obj){
                    $(newObj).remove();
                    $(obj).css({ display: "inline-block" });
                }
                console.log(e);
            }
        });
    }
}

$("#btnDeleteAll").on('click', function(event)
{
    let con = confirm('តើអ្នកពិតជាចង់លុបមែនទេ?');
    if(con)
    {
        let tbl = $(event.target).attr('table');
        let per = $(event.target).attr('permission');
        let token = $(event.target).attr('token');
        let tds = $('.datatable tbody tr td:first-child input:checked');
        let arr = [];
        for(let i=0; i<tds.length; i++)
        {
            let id = $(tds[i]).val();
            arr.push(id);
        }
        let data = {
            tbl: tbl,
            per: per,
            ids: arr
        };
        $.ajax({
            type: 'POST', 
            url: burl + '/bulk/remove',
            data: data,
            headers: {
                'X-CSRF-TOKEN': token
            },
            success: function(sms)
            {
                $('#dataTable').DataTable().ajax.reload();
            }
        });
       
    }
});

function changePermission(obj){
    const role_permission_id = $(obj).attr('role_permission_id');
    const feature_id = $(obj).attr('feature_id');
    const permission_feature_id = $(obj).attr('permission_feature_id');
    const permission_id = $(obj).attr('permission_id');
    const role_id = $(obj).attr('role_id');
    let condition = 0;
    if($(obj).prop('checked')){
        condition = 1;
    }

    $.ajax({
        type: 'GET',
        url: burl + '/admin/role-permission/'+ condition +'/data?role_permission_id='+role_permission_id +'&feature_id=' + feature_id + '&permission_feature_id='+ permission_feature_id + '&permission_id=' + permission_id + '&role_id=' + role_id,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
            if (data.status == 1) {
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
            console.log(e);
        }
    });
}
function formatToCurrency(amount,fixed = 2) {
    if(fixed != 0){
        return Number(amount).toFixed(fixed).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    } else {
        return Number(amount).toFixed(fixed).replace(/\.\d+$/, '').replace(/\d(?=(\d{3})+(?!\d))/g, '$&,');
    }
}
function fetchData(obj, url, callback, enable = true) {
    let newObj;
    if(enable == true){
        $(obj).css({ display: "none" });
        const newbtn = `<button class="btn btn-outline-dark" type="button" disabled>
                            <div class="spinner-border text-dark" role="status" style="width:1rem; height:1rem;">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            ${$(obj).text()}
                        </button>`;
    
                        // ${btnDetail}
        newObj = $(newbtn).insertAfter($(obj));
    }
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            if(enable == true){
                $(newObj).remove();
                $(obj).css({ display: "inline-block" });
            }
            if (data.status == 1) {
                data = JSON.parse(base64Decode(data.data))
                callback(data);
                selectOption2();
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
            if(enable == true){
                $(newObj).remove();
                $(obj).css({ display: "inline-block" });
            }
        }
    });
}

function copyExcel(){
    let urlField = document.querySelector('.table');
    // create a Range object
    let range = document.createRange();  
    // set the Node to select the "range"
    range.selectNode(urlField);
    //remove all range before add new
    window.getSelection().removeAllRanges();
    // add the Range to the set of window selections
    window.getSelection().addRange(range);
    // execute 'copy', can't 'cut' in this case
    document.execCommand('copy');
}

function collect(data) {
    let d = {};
    d.sum = (object) => {
        let result = 0;
        data.forEach((item, index) => {
            result += Number(data[index][object]);
        });
        return result;
    };
    d.where = (object,condition) => {
        let r = {};
        r.get = () => {
            return data.filter(match => match[object] == condition);
        }
        r.count = () => {
            return r.get().length;
        }
        r.sum = (condiction) => {
            let result = 0;
            r.get().forEach(item => {
                result += Number(item[condiction]);
            })
            return result;
        }
        return r;
    }
    return d;
}


// $(document).ready(function(){
//     $('#fullScreenMode').trigger('click');
// })

