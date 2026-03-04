import setPage from "./set-page.js";


export default function refreshPageSelector(page) 
{
    const pageSelector = document.getElementById('page-selector');
    const pageButtonTemplate = document.getElementById('page-button');

    let buttons = [];
    for (let i = 1; i <= 5; ++i) {
        const clone = pageButtonTemplate.content.cloneNode(true);
        const button = clone.querySelector('button');
        button.textContent = `${i}`;
        if (i === page) {
            button.style.fontWeight = "bold";
        }
        button.addEventListener('click', function() {
            setPage(i);
        });

        buttons.push(clone);
    }

    pageSelector.replaceChildren(...buttons);
}