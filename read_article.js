// Get the current URL
const urlParams = new URLSearchParams(window.location.search);
const articleId = urlParams.get('id');

// 使用Fetch API發送GET請求
fetch('article_content.php?id='+articleId)
    .then(response => response.json()) // 解析JSON數據
    .then(data => {
        data.forEach(item => {
            // 創建新的HTML元素
            var div = document.createElement('div');
            div.innerHTML = 
            '<div class="row row-cols-1 row-cols-md-1 m-2 mb-3 card text-center">' +
            '<div class="card-header">' +'ID #' + item.title +'</div>' +
            '<div class="card-body">' +
            '<h5 class="card-title">' + item.content + '</h5>' +
            '</div>' +
            '<div class="card-footer text-muted">' +
            'Latest Update: ' + item.updated_at +
            '</div>' +
            '</div>';
            document.getElementById('data-container').appendChild(div);

            var div2 = document.createElement('div');
            div2.innerHTML =  
            '<a href="edit_article.html?update&id=' + articleId + 
            '" class="btn btn-primary">Update</a>';
            document.getElementById('data-container').appendChild(div2);
            // 將新元素添加到具有ID為data-container的<div>元素中
            
        });
    })
    .catch(error => {
        console.error('Error:', error); // 處理錯誤
    });

