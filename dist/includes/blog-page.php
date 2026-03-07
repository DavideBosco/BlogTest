<?php
    function getFilteredPosts($category) 
    {
        global $cachedData;

        // If no category specified, just return all posts
        if ($category == "") {
            return $cachedData["data"]->posts;
        }

        // Otherwise filter by category
        return array_values(array_filter(
            $cachedData["data"]->posts, 
            function($post) use ($category) { 
                return $post->category == $category; 
            }));
    }

    // Get parameters from url
    $page = $_GET['pagina'] ?? 1;
    $category = $_GET['categoria'] ?? "";

    // Generate content or error
    if ($cachedData["error"] != "") 
    {
        // If there was any error in loading the data from the endpoint, we display it here
        ?>
            <p><?= $cachedData["error"] ?></p>
        <?php
    }
    else 
    {
        // If data loaded correctly we can get the posts to display
        $posts = getFilteredPosts($category);

        // TODO: clamp page to [count($posts) * 9]. we also return the clamped_page and the total page number
        
        // Get the index of the first post of the page
        $pageStartIndex = 9 * ($page - 1);
        // Count how many posts to display
        $postsCountInPage = min(count($posts) - $pageStartIndex, 9);

        // Generate html for each post to show in the page
        for ($i = 0; $i < $postsCountInPage; $i++) 
        {
            $post = $posts[$pageStartIndex + $i];
            ?>
                <div class="post">
                    <img src= "<?= htmlspecialchars($post->image->url) ?>" alt= "<?= htmlspecialchars($post->image->alt) ?>" >
                    <div>
                        <p class="post-date"><?= htmlspecialchars($post->date) ?></p>
                        <h1 class="post-title"><?= htmlspecialchars($post->title) ?></h1>
                        <p class="post-description"><?= htmlspecialchars($post->description) ?></p>
                    </div>
                </div>
            <?php 
        }
    }
?>
