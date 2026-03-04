    
export default function refreshPageSelector(page) 
{
    const target1 = document.getElementById('page-selector');
    const template1 = document.getElementById('page-button');
    for (let i = 1; i <= 5; ++i) {
        const clone = template1.content.cloneNode(true);
        const paragraph = clone.querySelector('p')
        paragraph.textContent = `${i}`;

        if (i === page) {
            paragraph.style.fontWeight = "bold";
        }

        target1.append(clone);
    }
}