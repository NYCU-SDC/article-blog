// Check if the "update" query parameter is present in the URL
const urlParams = new URLSearchParams(window.location.search);
const isCreate = urlParams.has('create');
const isUpdate = urlParams.has('update');

if (isUpdate) {
    const articleId = urlParams.get('id');
    fetch('article_content.php?id='+articleId)
    .then(response => response.json()) // 解析JSON數據
    .then(data => {
        data.forEach(item => {
            document.getElementById('title').value = item.title;
            document.getElementById('content').value = item.content;
        });
    })
    .catch(error => {
        console.error('Error:', error); // 處理錯誤
    });
}

function handleClick() {
    // Get the form data using FormData
    const formData = new FormData(document.getElementById("article_form"));
    const title = formData.get('title');
    const content = formData.get('content');
    const articleId = urlParams.get('id');
    if (isCreate) {
        fetch(`create.php?title=${title}&content=${content}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                console.log('New Article ID:', item.id);
            
                // Redirect the user to the newly created article page
                // window.location.href = `article_list.html`;
                window.location.href = `article_list.html`;
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
    else if(isUpdate) {
        console.log("updat click");
        fetch(`update.php?id=${articleId}&title=${title}&content=${content}`)
        .then(response => response.json())
        .then(data => {
            console.log('New Article ID:', data);
            
            // Redirect the user to the newly created article page
            // window.location.href = `article_list.html`;
            window.location.href = `article_list.html`;
        })
        .catch(error => {
            console.error("Error:", error);
            window.alert(error);
        });
    }
    //window.location.href = `article_list.html`;
}
