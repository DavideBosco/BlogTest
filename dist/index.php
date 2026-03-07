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
        require 'includes/get-items.php';
        $cachedData = getItems('https://farmerbit.com/json-test/');
        require 'includes/blog-page.php';
    ?>

    <template id="post-template">
         <div class="post">
            <img src="img/paesaggio.jpg" alt="">
            <div>
                <p class="post-date">12 marzo 2024</p>
                <h1 class="post-title">Titolo del post</h1>
                <p class="post-description">Una descrizione a caso</p>
            </div>
         </div>
    </template>

    <template id="page-button">
        <button>1</button>
    </template>

    <template id="category-button">
        <button>Category 1</button>
    </template>

    <h1>Blog</h1>
    <p>Articoli, guide e approfondimenti per sviluppatori web che vogliono restare aggiornati sul mondo del codice.</p>
    <div id="category-filters"></div>
    <div id="posts-container"></div>
    <div id="page-selector"></div>
    
    <script src="/js/main.js"></script>
</body>
</html>