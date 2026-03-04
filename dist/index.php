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

    <h1>Blog</h1>
    <p>Articoli, guide e approfondimenti per sviluppatori web che vogliono restare aggiornati sul mondo del codice.</p>
    
    <div id="posts-container">
        <div class="post">aaaaa</div>
        <div class="post">aaaaa</div>
        <div class="post">aaaaa</div>
        <div class="post">aaaaa</div>
        <div class="post">aaaaa</div>
        <div class="post">aaaaa</div>
        <div class="post">aaaaa</div>
        <div class="post">aaaaa</div>
        <div class="post">aaaaa</div>
    </div>

    <script src="/js/main.js"></script>
</body>
</html>