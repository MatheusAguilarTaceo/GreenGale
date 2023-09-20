<?php

function redirect($to){
    return header("location: $to");
}


function setMessageAndRedirect($index, $message, $redirectTo){
    setFlash($index, $message);
    return redirect($redirectTo);
}