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
        // Get the data for all the posts
        require 'config/config.php';
        require 'includes/get-posts-from-endpoint.php';
        $postsData = getPostsFromEndpoint($url);
        // Generate html for the posts of the requested page
        require 'includes/generate-page-data.php';
        $pageData = generatePageData($postsData, $pageSize);
    ?>

    <template id="page-button">
        <button class="page-button">1</button>
    </template>

    <h1>Blog</h1>
    <p>Articoli, guide e approfondimenti per sviluppatori web che vogliono restare aggiornati sul mondo del codice.</p>
    
    
    <div id="category-selector">
        <?php
            // Create category selector buttons by getting all unique categories 
            require 'includes/generate-category-selectors.php';
            generateCategorySelectors($postsData);
        ?>
    </div>

    <div id="posts-container"> 
        <?php
            // Use generated html
            echo $pageData["html"];
        ?>
    </div>

    <div id="page-selector">
        <button class="page-button", id="page-selector-prev"><</button>
        <button class="page-button", id="page-selector-next">></button>
    </div>
    
    <script>
        let currentPageAtLoad = <?= $pageData["page"] ?>;
        let totalPagesAtLoad = <?= $pageData["totalPages"] ?>;
    </script>
    <script src="/js/main.js"></script>
</body>
</html>