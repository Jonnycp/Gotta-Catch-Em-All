<?php
require("../headers.php")
putHeaders("GET"); 
if($_SERVER['REQUEST_METHOD']=="GET"){
    
}else{
    http_response_code(405);//metodo non permesso
    echo json_encode(array("message" => "Metodo non abilitato"));
}
?>