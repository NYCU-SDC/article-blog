// Check if the "update" and "create" query parameter is present in the URL
const urlParams = new URLSearchParams(window.location.search);
const isCreate = urlParams.has('create');
const isUpdate = urlParams.has('update');

// If it's an update, fetch and populate existing article data into the form fields
if (isUpdate) {
    const articleId = urlParams.get('id');
    fetch('read_article.php?id='+articleId)
    .then(response => response.json())
    .then(data => {
        data.forEach(item => {
            // Populate form fields with existing article data
            document.getElementById('title').value = item.title;
            document.getElementById('content').value = item.content;
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Function to handle form submission
function handleClick() {
    // Get the form data using FormData
    const formData = new FormData(document.getElementById("article_form"));
    const title = formData.get('title');
    const content = formData.get('content');
    const articleId = urlParams.get('id');

    
    if (isCreate) {
        window.location.href = "article_list.html";
        fetch(`create.php?title=${title}&content=${content}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            window.location.href = `article_list.html`;
            // Redirect the user to the newly created article page
            // window.location.href = `article.html?id=${data}`;
        })
        .catch(error => {
            console.error("Error:", error);
            window.alert(error);
        });
    }
    else if(isUpdate) {
        window.location.href = "article_list.html";
        fetch(`update.php?id=${articleId}&title=${title}&content=${content}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            window.location.href = `article_list.html`;
            // Redirect the user to the newly created article page
            // window.location.href = `article.html?id=${articleId}`;
        })
        .catch(error => {
            console.error("Error:", error);
            window.alert(error);
        });
    }
    
}
