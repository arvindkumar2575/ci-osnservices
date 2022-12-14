<?php

if (!function_exists("checkSession")) {
    function checkSession()
    {
        $session = session();
        $usersession = $session->get('usersession')??array();
        $isLoggedIn = isset($usersession['isLoggedIn'])?$usersession['isLoggedIn']:0;
        if($isLoggedIn){
            return true;
        }else{
            return false;
        }
    }
}
