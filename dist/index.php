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

    <template id="post-template">
         <div class="post">
            <img src="img/paesaggio.jpg" alt="">
            <div>
                <p class="post-date">12 marzo 2024</p>
                <h1>Titolo del post</h1>
                <p class="post-description">Una descrizione a caso</p>
            </div>
         </div>
    </template>

    <template id="page-button">
        <p>1</p>
    </template>

    <h1>Blog</h1>
    <p>Articoli, guide e approfondimenti per sviluppatori web che vogliono restare aggiornati sul mondo del codice.</p>
    
    <div id="category-filters">
        <button>Categoria 1</button>
        <button>Categoria 2</button>
        <button>Categoria 3</button>
        <button>Categoria 4</button>
    </div>

    <div id="posts-container"></div>

    <div id="page-selector"></div>
    

    <script src="/js/main.js"></script>
</body>
</html>