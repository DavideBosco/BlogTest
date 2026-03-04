import getQueryParam from "./modules/get-query-param.js";
import refreshCategorySelector from "./modules/refresh-category-selector.js";
import setPage from "./modules/set-page.js";

// get page to show
let pageParam = getQueryParam("pagina");
let page = pageParam != "" ? Number(pageParam) : 1;
console.log("Current page: " + page);

// log category just cause
let category = getQueryParam("categoria");
console.log("Current category: " + category);

refreshCategorySelector();

setPage(page);
