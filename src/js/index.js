import loadPostsForPage from "./modules/load-posts-for-page.js";
import initializeCategorySelector from "./modules/initialize-category-selector.js";
import refreshPageSelector from "./modules/refresh-page-selector.js";
import getQueryParam from "./modules/get-query-param.js";

document.addEventListener('DOMContentLoaded', () => {
    initializeCategorySelector();

    let page = getQueryParam("pagina");
    refreshPageSelector(page);
});
