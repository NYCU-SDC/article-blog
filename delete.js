function handleClick() {
// Get the current URL
const urlParams = new URLSearchParams(window.location.search);
const articleId = urlParams.get('id');

// 使用Fetch API發送GET請求
fetch('delete.php?id='+articleId)
    .then(response => response.json()) // 解析JSON數據
    .then(data => {
        console.log(data);
        window.location.href = `article_list.html`;
    })
    .catch(error => {
        console.error('Error:', error); // 處理錯誤
    });
}
