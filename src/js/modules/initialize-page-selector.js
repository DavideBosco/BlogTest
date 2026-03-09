import getQueryParam from "./get-query-param.js";
import getPageParam from "./get-page-param.js";
import { categoryUrlParam } from "./../consts.js";
import loadPostsForPage from "./load-posts-for-page.js";

/** mainly set up callback for button click functionality. Has to be called on DOMContentLoaded */
export default function initializePageSelector() 
{
    const prevPage = document.getElementById('page-selector-prev');
    const nextPage = document.getElementById('page-selector-next');

    // Bind click event
    prevPage.addEventListener('click', (e) => {
        const currentPage = getPageParam();
        const currentCategory = getQueryParam(categoryUrlParam);
         console.log(currentPage - 1);
        loadPostsForPage(currentPage - 1, currentCategory);
    });
    
    nextPage.addEventListener('click', (e) => {
        const currentPage = getPageParam();
        const currentCategory = getQueryParam(categoryUrlParam);
        console.log(currentPage + 1);
        loadPostsForPage(currentPage + 1, currentCategory);
    });
}
