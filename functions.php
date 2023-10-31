<?php

function selectEstados($cantidad, $name){
    $html = "<select name='q$name". "[]" ."' class='form-control form-control-sm'>";
    $html.="<option value=''>---</option>";
    for ($i=0; $i < $cantidad ; $i++) { 
        $html.="<option value='$i'>q$i</option>";
    }
    $html.= "</select>";
    return $html;
}
