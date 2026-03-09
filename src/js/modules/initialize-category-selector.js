import loadPostsForPage from "./load-posts-for-page.js";
import getQueryParam from "./get-query-param.js";
import { categoryUrlParam } from "./../consts.js";

/** mainly set up callback for button click functionality. Has to be called on DOMContentLoaded */
export default function initializeCategorySelector() 
{
    const categorySelector = document.getElementById('category-selector');

    // Bind click event
    categorySelector.addEventListener('click', 
        function(event) {
            // Check if what was clicked was a category button
            // (using closest, to account for event.target being something inside the button)
            const categoryButton = event.target.closest('.category-button');
            if (categoryButton) 
            {
                const currentCategory = getQueryParam(categoryUrlParam);
                let targetCategory = "";

                const wasActive = currentCategory == categoryButton.dataset.category;
                if (!wasActive) {
                    // Get button category from custom attribute
                    targetCategory = categoryButton.dataset.category;
                }

                loadPostsForPage(1, targetCategory);

                // Update category-selector's active button
                categorySelector.querySelectorAll('.category-button').forEach(btn => btn.classList.remove('active'));
                if (!wasActive) {
                    categoryButton.classList.add('active');
                }
            }
        }
    );
}
