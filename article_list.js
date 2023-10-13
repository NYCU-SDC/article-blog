// Use "fetch()" API to send request
fetch('read_article_list.php')
    .then(response => response.json()) // 解析JSON數據
    .then(data => {
        // 遍歷JSON數據並顯示在網頁上
        data.forEach(item => {
            // 創建新的HTML元素
            var div = document.createElement('div');
            div.classList.add("d-flex", "justify-content-center");
            div.innerHTML = 
            '<div class="card m-2 mb-4 w-75">' +
            '<div class="card-header">' +'ID #' + item.id +'</div>' +
            '<div class="card-body">' +
            '<h5 class="card-title">' + item.title + '</h5>' +
            '<p class="text-muted">' +
            'Latest Update: ' + item.updated_at +
            '</p>' +
            '</div>' +
            '<a class="stretched-link" href="article.html?id=' + item.id + '">' +
            '</a></div>';
            // 將新元素添加到具有ID為data-container的<div>元素中
            document.getElementById('data-container').appendChild(div);
        });
    })
    .catch(error => {
        console.error('Error:', error); // 處理錯誤
    });

