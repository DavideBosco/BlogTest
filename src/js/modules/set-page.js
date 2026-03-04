import setQueryParam from "./set-query-param.js";
import getQueryParam from "./get-query-param.js";
import refreshPosts from "./refresh-posts.js";
import refreshPageSelector from "./refresh-page-selector.js";

export default function setPage(page) 
{
    setQueryParam("pagina", page);
    let category = getQueryParam("categoria");

    // Refresh page content
    refreshPosts(page, category);
    refreshPageSelector(page);
}
