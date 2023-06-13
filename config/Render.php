<?php

function render($view, $title,$data=null){
    if($data){
        $data = extract($data);
    }
    
?>

    <html>
        <head>
            <title> <?php echo $title; ?>  </title>
            <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css" />
            <link type="text/css" rel="stylesheet" href="assets/fontawesome/all.css" />
        </head>
        <body>
            <?php 
                require_once('views/'.$view.'.php');
            ?> 
        </body>
    </html>


<?php }?>