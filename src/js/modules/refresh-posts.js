
function getPostInfo(page, index) 
{
   
}

export default function refreshPosts(page) 
{
    const target = document.getElementById('posts-container');
    const template = document.getElementById('post-template');

    let newPosts = [];
    for (let i = 0; i < 9; ++i) {
        const clone = template.content.cloneNode(true);

        const postInfo = getPostInfo(page, i)

        // TODO: set data

        newPosts.push(clone);
    }

    target.replaceChildren(...newPosts);
}
