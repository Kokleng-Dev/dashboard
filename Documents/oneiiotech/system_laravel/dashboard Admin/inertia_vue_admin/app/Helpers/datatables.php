<?php

function btn_actions($tbl, $row, $per){
    $edit = '';
    $delete = '';
    if(checkPermission($per,'edit')){
        $edit = '<button attr-id="'. base64Encode($row->id) .'" class="btn btn-sm btn-outline-success btnEdit"><i class="fas fa-pen-alt"></i> '. __('Edit') .'</button>';
    }
    if(checkPermission($per,'delete')){
        $delete = '<button attr-id="'. base64Encode($row->id) .'" class="btn btn-sm btn-outline-danger btnDelete"><i class="fas fa-trash"></i> '. __('Delete') .'</button>';
    }
    return $edit . ' ' . $delete;
}

function btn_edit($tbl, $row, $per){
    if(checkPermission($per,'edit')){
        $edit = '<button attr-id="'. base64Encode($row->id) .'" class="btn btn-sm btn-outline-success btnEdit"><i class="fas fa-pen-alt"></i> '. __('Edit') .'</button>';
        return $edit;
    }
    return ' ';
}
function btn_delete($tbl, $row, $per){
    if(checkPermission($per,'delete')){
        $delete = '<button attr-id="'. base64Encode($row->id) .'" class="btn btn-sm btn-outline-danger btnDelete"><i class="fas fa-trash"></i> '. __('Delete') .'</button>';
        return $delete;
    }
    return ' ';
}
function btn_delete_url($tbl, $row, $per, $url){
    if(checkPermission($per,'delete')){
        $delete = '<button url="'. $url .'" class="btn btn-sm btn-outline-danger btnDelete"><i class="fas fa-trash"></i> '. __('Delete') .'</button>';
        return $delete;
    }
    return ' ';
}