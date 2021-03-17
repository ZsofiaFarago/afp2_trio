<?php
    function loggedIn(){
        if($_SESSION != null) return true;
        else return false;
    }
?>