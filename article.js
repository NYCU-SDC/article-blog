// Get the current URL
const urlParams = new URLSearchParams(window.location.search);
const articleId = urlParams.get('id');

// 使用Fetch API發送GET請求
fetch('read_article.php?id='+articleId)
    .then(response => response.json()) // 解析JSON數據
    .then(data => {
        data.forEach(item => {
            // 創建新的HTML元素
            var div = document.createElement('div');
            div.classList.add("border", "border-1", "rounded-3", "p-3", "shadow", "bg-body", "rounded");

            div.innerHTML = 
            '<h1>' + item.title +'</h1>' +
            '<h6 class="text-muted">Latest Update: ' + item.updated_at +'</h6>' +
            '<hr>' +
            '<h5>' + item.content + '</h5>';
            document.getElementById('data-container').appendChild(div);

            var div2 = document.createElement('div');
            div2.innerHTML =  
            '<a href="edit_article.html?update&id=' + articleId + 
            '" class="btn btn-light border border-1" style="background-color: #f2f2f2;">Update</a>';
            document.getElementById('button-container').appendChild(div2);
            // 將新元素添加到具有ID為data-container的<div>元素中
            
        });
    })
    .catch(error => {
        console.error('Error:', error); // 處理錯誤
    });

