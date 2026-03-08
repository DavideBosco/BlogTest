import loadPostsForPage from "./load-posts-for-page.js";

export default function initializeCategorySelector() 
{
    const categorySelector = document.getElementById('category-selector');

    // Bind click event
    categorySelector.addEventListener('click', 
        function(event) {
            // Check if what was clicked was a category button
            // (using closest, to account for event.target being something inside the button)
            if (event.target.closest('.category-button')) 
            {
                // Get button category from custom attribute
                const category = event.target.dataset.category;

                loadPostsForPage(1, category);

                // Update category-selector's active button
                categorySelector.querySelectorAll('.category-button').forEach(btn => btn.classList.remove('active'));
                event.target.classList.add('active');
            }
        }
    );
}
