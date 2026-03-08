<?php
    function generateCategorySelector($postsData) 
    {
        if ($postsData["error"] != "") {
            return;
        }

        ?>
            <div id="category-selector">
        <?php

        // Get all unique categories.
        $categories = array_unique(array_column($postsData["data"]->posts, 'category'));

        // For each category generate the button and set the custom data attribute "category", which we can use on the js side 
        // to bind the on click functionality.
        foreach ($categories as $category) {
            ?>
                <button class="category-button" data-category="<?= htmlspecialchars($category) ?>"><?= htmlspecialchars($category) ?></button>
            <?php
        }

        ?>
            </div>
        <?php
    }
?>