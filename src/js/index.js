import initializeCategorySelector from "./modules/initialize-category-selector.js";
import initializePageSelector from "./modules/initialize-page-selector.js";
import refreshPageSelector from "./modules/refresh-page-selector.js";
import setQueryParam from "./modules/set-query-param.js";
import { pageUrlParam } from "./consts.js";



document.addEventListener('DOMContentLoaded', () => {
    initializeCategorySelector();
    initializePageSelector();

    // php might have clamped the page value to return a valid page
    setQueryParam(pageUrlParam, currentPageAtLoad);
    // update the page selector using the page returned from php and the toal amount of pages available
    refreshPageSelector(currentPageAtLoad, totalPagesAtLoad);
});
