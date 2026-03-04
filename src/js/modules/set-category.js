import setQueryParam from "./set-query-param.js";
import getQueryParam from "./get-query-param.js";
import refreshPosts from "./refresh-posts.js";
import refreshPageSelector from "./refresh-page-selector.js";
import refreshCategorySelector from "./refresh-category-selector.js";

export default function setCategory(category) 
{
    setQueryParam("categoria", category);
    let pageParam = getQueryParam("pagina");
    let page = pageParam != "" ? Number(pageParam) : 1;

    // TODO: go to last page with a post for this category if we are overflowing

    // this is just being really lazy cause i'm tired. i'm calling this just to update the bold text on buttons
    refreshCategorySelector(); 

    // Refresh page content
    refreshPosts(page, category);
    refreshPageSelector(page);
}
