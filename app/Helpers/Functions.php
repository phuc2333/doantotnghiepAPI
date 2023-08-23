<?php 
function isRole($dataArr,$moduleName,$role='view'){
   // dd($dataArr['room']);
    if(!empty($dataArr[$moduleName])){
        $roleArr = $dataArr[$moduleName];
       if(!empty($roleArr) && in_array($role,$roleArr)){
            return true;
       }
    }
    return false;
}