<?php
    /** Generates html for the posts cards of the page, and returns the clamped page index 
     * and the total number of pages available */
    function generatePageData($postsData, $pageSize)
    {
        /** Returns array of all available posts filtered by category */
        function getFilteredPosts($postsData, $category) 
        {
            // If no category specified, just return all posts.
            if ($category == "") {
                return $postsData["data"]->posts;
            }

            // Otherwise filter by category.
            return array_values(array_filter(
                $postsData["data"]->posts, 
                function($post) use ($category) { 
                    return $post->category == $category; 
                }));
        }

        // Output format.
        $output = [
            "html" => "",       // The html to display in the posts section.
            "page" => 1,        // The page index clamped to be a valid page.
            "totalPages" => 0   // The number of pages available adjusted for category filtering.
        ];

        // Generate content or error
        if ($postsData["error"] != "") 
        {
            // If there was any error in loading the data from the endpoint, we display it here.
            ob_start();
            ?>
                <p><?= $postsData["error"] ?></p>
            <?php
            $output["html"] = ob_get_clean();
        }
        else 
        {
            // Get parameters from url.
            $page = (int)$_GET['pagina'] ?? 1;
            $category = $_GET['categoria'] ?? "";

            // If data loaded correctly we can get the posts to display.
            $posts = getFilteredPosts($postsData, $category);

            // Get number of available pages.
            $pagesAvailable = ceil(count($posts) / $pageSize);
            // Clamp page to be the last with a post in it.
            $page = max(1, min($page, $pagesAvailable));

            // Get the index of the first post of the page.
            $pageStartIndex = $pageSize * ($page - 1);
            // Get only the posts to display.
            $postsInPage = array_slice($posts, $pageStartIndex, $pageSize);

            // Generate html for each post to show in the page.
            ob_start();
            foreach ($postsInPage as $post) 
            {
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
            $output["html"] = ob_get_clean();

            // output the page information.
            $output["page"] = $page;
            $output["totalPages"] = $pagesAvailable;
        }

        return $output;
    }
?>
