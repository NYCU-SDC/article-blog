function handleClick() {
// Get the current URL and extract the "id" parameter from the query string
const urlParams = new URLSearchParams(window.location.search);
const articleId = urlParams.get('id');

// Use the "fetch()" API to send a request
fetch('delete.php?id='+articleId)
    .then(response => response.json())
    .then(data => {
        console.log(data);
        window.location.href = `article_list.html`;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
