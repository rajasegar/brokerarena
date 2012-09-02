<?php

function sanitizeString($var)
{
$var = strip_tags($var);
$var = htmlentities($var);
$var = stripslashes($var);
return mysql_real_escape_string($var);
}

function destroySession()
{
$_SESSION=array();
if (session_id() != "" || isset($_COOKIE[session_name()]))
setcookie(session_name(), '', time()-2592000, '/');
session_destroy();
}

//Encryption function  
function mc_encrypt($encrypt, $key, $iv)  
{  
    $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');  
    mcrypt_generic_init($td, $key, $iv);  
    $encrypted = mcrypt_generic($td, $encrypt);  
    $encode = base64_encode($encrypted);  
    mcrypt_generic_deinit($td);  
    mcrypt_module_close($td);  
    return $encode;  
}  
  
  
//Decryption function  
function mc_decrypt($decrypt, $key, $iv)  
{  
    $decoded = base64_decode($decrypt);  
    $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');  
    mcrypt_generic_init($td, $key, $iv);  
    $decrypted = mdecrypt_generic($td, $decoded);  
    mcrypt_generic_deinit($td);  
    mcrypt_module_close($td);  
    return trim($decrypted);  
}
?>
