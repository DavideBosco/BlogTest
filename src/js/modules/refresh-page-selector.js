import loadPostsForPage from "./load-posts-for-page.js";
import getQueryParam from "./get-query-param.js";
import { categoryUrlParam } from "./../consts.js";

export default function refreshPageSelector(page, totalPages) 
{
    const pageSelector = document.getElementById('page-selector');
    const pageButtonTemplate = document.getElementById('page-button');

    // Try to center the selected page in the page selector
    const maxPagesToShow = 5; 
    const numPageButtons = Math.min(totalPages, maxPagesToShow);
    const delta = Math.floor(numPageButtons / 2);

    let startPage = page - delta;
    let endPage = page + delta;

    if (startPage <= 0) {
        endPage -= (startPage - 1);
        startPage = 1;
    }

    if (endPage > totalPages) {
        startPage -= (endPage - totalPages);
        startPage = Math.max(1, startPage);
        endPage = totalPages;
    }

    // Generate page buttons
    let buttons = [];
    for (let i = startPage; i <= endPage; ++i) {
        const clone = pageButtonTemplate.content.cloneNode(true);
        const button = clone.querySelector('button');
        button.textContent = `${i}`;
        if (i == page) {
            button.classList.add('active');
        }
        button.addEventListener('click', function() {
            let category = getQueryParam(categoryUrlParam);
            loadPostsForPage(i, category);
        });

        buttons.push(clone);
    }

    // Enable / disable previous page button
    const prevPage = document.getElementById('page-selector-prev');
    prevPage.disabled = (page == 1);

    // Enable / disable next page button
    const nextPage = document.getElementById('page-selector-next');
    nextPage.disabled = (page == totalPages);

    // Set buttons
    pageSelector.replaceChildren(...[prevPage, ...buttons, nextPage]);
}