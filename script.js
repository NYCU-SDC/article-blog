// Get the current URL
const currentUrl = window.location.href;

// Define the mapping of URLs to PHP files and corresponding templates
const urlMap = {
    'article_list.html': 'template1.html',
    'http://example.com/file2.php': 'template2.html',

};
// Fetch the corresponding PHP file based on the current URL
const phpFile = urlMap[currentUrl];

// 使用Fetch API發送GET請求
fetch('data.php')
    .then(response => response.json()) // 解析JSON數據
    .then(data => {
        // 遍歷JSON數據並顯示在網頁上
        data.forEach(item => {
            // 創建新的HTML元素
            var div = document.createElement('div');
            // div.textContent = 'ID: ' + item.id + ', Title: ' + item.title + ', Updated At: ' + item.updated_at;
            div.innerHTML = 
            '<a href="article.html?id=' + item.id + '">' +
            '<div class="row row-cols-1 row-cols-md-1 m-2 mb-3 card text-center">' +
            '<div class="card-header">' +'ID #' + item.id +'</div>' +
            '<div class="card-body">' +
            '<h5 class="card-title">' + item.title + '</h5>' +
            '</div>' +
            '<div class="card-footer text-muted">' +
            'Latest Update: ' + item.updated_at +
            '</div>' +
            '</div>' +
            '</a>';
            // 將新元素添加到具有ID為data-container的<div>元素中
            document.getElementById('data-container').appendChild(div);
        });
    })
    .catch(error => {
        console.error('Error:', error); // 處理錯誤
    });

