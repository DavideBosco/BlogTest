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
        // Get currently selected category
        $selectedCategory = $_GET['categoria'] ?? "";

        // For each category generate the button and set the custom data attribute "category", which we can use on the js side 
        // to bind the on click functionality.
        foreach ($categories as $category) 
        {
            // TODO: should i use input instead of button? this way it already manages having only one active at the time

            // Only add active class if the button is pressed
            $active = ($category === $selectedCategory) ? 'active' : '';
            ?>
                <button class="category-button <?= htmlspecialchars($active) ?>" data-category="<?= htmlspecialchars($category) ?>"><?= htmlspecialchars($category) ?></button>
            <?php
        }

        ?>
            </div>
        <?php
    }
?>