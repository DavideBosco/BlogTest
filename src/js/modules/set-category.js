import setQueryParam from "./set-query-param.js";
import getQueryParam from "./get-query-param.js";
import refreshPosts from "./refresh-posts.js";
import refreshPageSelector from "./refresh-page-selector.js";

export default function setCategory(category) 
{
    setQueryParam("categoria", category);
    let pageParam = getQueryParam("pagina");
    let page = pageParam != "" ? Number(pageParam) : 1;

    // TODO: go to last page with a post for this category if we are overflowing

    // Refresh page content
    refreshPosts(page, category);
    refreshPageSelector(page);
}
