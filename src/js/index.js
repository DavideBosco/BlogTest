import loadPostsForPage from "./modules/load-posts-for-page.js";
import initializeCategorySelector from "./modules/initialize-category-selector.js";
import refreshPageSelector from "./modules/refresh-page-selector.js";
import getQueryParam from "./modules/get-query-param.js";

document.addEventListener('DOMContentLoaded', () => {
    initializeCategorySelector();

    // TODO: no clue what to do, since it needs the tot number of pages, and to get that we need to ask php
    let page = getQueryParam("pagina");
    refreshPageSelector(page);
});
