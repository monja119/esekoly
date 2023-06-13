<?php

function render($view, $title, $data=null, $with_head = false){
    if($data){
        $data = extract($data);
    }
    
    if($with_head == false){
    
    ?>
        <html>
            <head>
                <title> <?php echo $title; ?>  </title>
                <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css" />
                <link type="text/css" rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css" />
                <link type="text/css" rel="stylesheet" href="assets/css/bootstrap-theme.css" />
            </head>
            <body>
            <?php
                require_once('views/'.$view.'.php');
            ?>
            </body>
        </html>

    <?php 
    }
    else {
        require('views/'.$view.'.php');
    }
}    
?>