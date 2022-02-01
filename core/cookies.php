<?php 


// get Cookie if exists
function getCookie($key){
    if(isset($_Cookie[$key])){
        return $_Cookie[$key];
    }
    return null;
}


// add new Cookie
function setNewCookie($name,$value,$time='',$domain='/'){
    setcookie($name,$value,$time,$domain);
}

// remve Cookie if exists
function removeCookie($key){
    if(isset($_COOKIE[$key])){
        unset($_COOKIE[$key]);
    }
}


// check if Cookie is enabled
function checkCookieEnabled(){
    if(count($_COOKIE) > 0) {
        return "Cookies are enabled.";
    } else {
        return "Cookies are disabled.";
    }
}


