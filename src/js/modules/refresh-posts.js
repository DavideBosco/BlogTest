
function getPostInfo(posts, index) 
{
    return posts.at(index) || null;
}

function getFilteredPosts(category) 
{
    if (category == "") {
        return itemResult.data.posts;
    }
    return itemResult.data.posts.filter(post => post.category == category);
}

export default function refreshPosts(page, category) 
{
    const postsContainer = document.getElementById('posts-container');

    // Check for errors and display them
    if (itemResult.error != "" || !("posts" in itemResult.data)) 
    {    
        // Empty postsContainer and write error message in it
        postsContainer.replaceChildren();
        postsContainer.textContent = itemResult.error;
        return;
    }

    // Filter posts
    let posts = getFilteredPosts(category);

    // Get the index of the first post of the page
    const pageStartIndex = 9 * (page - 1);
    // Count how many posts to display
    const postsCountInPage = Math.min(posts.length - pageStartIndex, 9);

    // Get post html template
    const postTemplate = document.getElementById('post-template');
    // Create new posts from template
    let newPosts = [];
    for (let i = 0; i < postsCountInPage; ++i) 
    {
        // Get the info of the post and check if it exists
        const postInfo = getPostInfo(posts, pageStartIndex + i);
        if (!postInfo) {
            console.log("refreshPosts >> Missing data for index (" + (pageStartIndex + i) + ")");
            continue;
        }

        const clone = postTemplate.content.cloneNode(true);
        
        // Update data in cloned template
        const image = clone.querySelector('img');
        image.src = postInfo.image.url;
        image.alt = postInfo.image.alt;

        const date = clone.querySelector('.post-date');
        date.textContent = postInfo.date;

        const title = clone.querySelector('.post-title');
        title.textContent = postInfo.title;

        const description = clone.querySelector('.post-description');
        description.textContent = postInfo.description;

        newPosts.push(clone);
    }

    postsContainer.replaceChildren(...newPosts);
}
