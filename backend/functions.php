<?php

function save_task($label, $desc, $file_path){
    if (file_exists($file_path)){
        $data=json_decode( file_get_contents($file_path));
    }else{
        $data=[];
    }

    $new_task = new stdClass();

    $new_task->label =$label;     
    $new_task->desc = $desc;

    $data[]=$new_task;

    $json_data=json_encode($data);
    file_put_contents($file_path,$json_data);

    return true;
}