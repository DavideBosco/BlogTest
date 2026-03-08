import setQueryParam from "./set-query-param.js";
import refreshPageSelector from "./refresh-page-selector.js";

export default async function loadPostsForPage(page, category) 
{
    try {
        const response = await fetch(`api/get-page-data.php?categoria=${category}&pagina=${page}`);
        const data = await response.json();

        const postsContainer = document.getElementById('posts-container');
        postsContainer.innerHTML = data.html;

        setQueryParam("pagina", data.page);
        setQueryParam("categoria", category);

        // TODO: use totalPages to update page selector
        refreshPageSelector(data.page) 
    } 
    catch (error) 
    {
        console.error("Error fetching posts:", error);
    }
}
