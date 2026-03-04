import setCategory from "./set-category.js";
import getQueryParam from "./get-query-param.js";

export default function refreshCategorySelector() 
{
    const categoryFilters = document.getElementById('category-filters');

    // Check for errors
    if (itemResult.error != "" || !("posts" in itemResult.data)) 
    {    
        // Empty categoryFilters
        categoryFilters.replaceChildren();
        return;
    }

    // Get all unique categories
    const categories = [...new Set(itemResult.data.posts.map(post => post.category))];

    // Get current category from url
    let currentCategory = getQueryParam("categoria");

    // Get post html template
    const categoryButtontemplate = document.getElementById('category-button');
    // Create new category buttons from template
    let buttons = [];
    for (const category of categories) 
    {
        const clone = categoryButtontemplate.content.cloneNode(true);
        const button = clone.querySelector('button');
        button.textContent = category;
        if (category == currentCategory) {
            button.style.fontWeight = "bold";
        }
        button.addEventListener('click', function() {
            setCategory(category);
        });

        buttons.push(clone);
    }

    categoryFilters.replaceChildren(...buttons);
}