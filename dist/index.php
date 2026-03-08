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
        require 'config/config.php';
        require 'includes/get-posts-from-endpoint.php';
        $postsData = getPostsFromEndpoint($url);
        require 'includes/generate-page-data.php';
        $pageData = generatePageData($postsData, $pageSize);
    ?>

    <template id="page-button">
        <button>1</button>
    </template>

    <h1>Blog</h1>
    <p>Articoli, guide e approfondimenti per sviluppatori web che vogliono restare aggiornati sul mondo del codice.</p>
    
    
    <?php
        require 'includes/generate-category-selector.php';
        generateCategorySelector($postsData);
    ?>

    <div id="posts-container"> 
        <?php
            echo $pageData["html"];
        ?>
    </div>

    <div id="page-selector"></div>
    
    <script src="/js/main.js"></script>
</body>
</html>