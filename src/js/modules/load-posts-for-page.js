import setQueryParam from "./set-query-param.js";
import refreshPageSelector from "./refresh-page-selector.js";
import { pageUrlParam, categoryUrlParam } from "./../consts.js";

export default async function loadPostsForPage(page, category) 
{
    try {
        // We are getting an object containing the properties: html, page, totalPages
        // html: all the posts to display in posts-container
        // page: the clamped page index (in order for page to have actual data)
        // totalPages: the pages available for this category
        const response = await fetch(`api/get-page-data.php?categoria=${category}&pagina=${page}`);
        const data = await response.json();

        // Update posts
        const postsContainer = document.getElementById('posts-container');
        postsContainer.innerHTML = data.html;

        // Update url
        setQueryParam(pageUrlParam, data.page);
        setQueryParam(categoryUrlParam, category);

        // Update page selector
        refreshPageSelector(data.page, data.totalPages);
    } 
    catch (error) 
    {
        console.error("Error fetching posts:", error);
    }
}
