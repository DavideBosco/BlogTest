<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Document</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <?php
        // By including get-items.php we are initializing the JS variable itemResult, which we can then use anywhere.
        // Since we cache the whole json data from the source url, the client can just do whatever from here, without
        // any other server request.
        require 'includes/get-items.php';
    ?>
    
    <h1>
        <?php
            // Here echo command is used to print
            echo "Hello, world!!";
        ?>  
    </h1>
    <h1> Other Stuff </h1>
    <p>
       
    </p>
    <script src="/js/main.js"></script>
</body>
</html>