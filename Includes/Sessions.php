<?php
session_start();

function ErrorMessage() { #errormessage function
    if(isset($_SESSION["ErrorMessage"])) {
        $Output ="<div class=\"alert alert-danger\">";
        $Output .= htmlentities($_SESSION["ErrorMessage"]);
        $Output .= "</div>"; #Output variable to display ErrorMessage translating to html

        $_SESSION["ErrorMessage"] = null; #line of code to clear message to null to prevent being visible to user all the time
        return $Output; 
    }
}

function SuccessMessage() {
    if(isset($_SESSION["SuccessMessage"])) {
        $Output="<div class=\"alert alert-success\">";
        $Output .= htmlentities($_SESSION["SuccessMessage"]);
        $Output .= "</div>"; 

        $_SESSION["SuccessMessage"] = null;
        return $Output; 
    }
}


?>