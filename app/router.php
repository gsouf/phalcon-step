<?php

$router->add("/",
    array(
        "controller" => "index",
        "action"     => "index",
    )
);


// DEV ONLY 

if(ENV_DEV == APPLICATION_ENV){


    
}


$router->notFound(array(
    "controller" => "error",
    "action"     => "notFound"
));

$router->handle();