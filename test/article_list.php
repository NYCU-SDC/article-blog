<!DOCTYPE html>
<html lang="en">
<?php require_once('head.php') ?>
<body>
<div id="container">
    <?php
        /* Import connection file */
        require_once('connection.php');
        
        /* Execute SQL command with PDO */
        $sql = "select id, title, updated_at from articles";
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            // set the resulting array to associative
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            die($e->getMessage());
        }

        /* Show result on webpage */
        // foreach ($result as $row) {
        //     html_template = '
        //     <a href="read_article.php?id='.$row->id.'">
        //         <div class="row row-cols-1 row-cols-md-1 m-2 mb-3 card text-center">
        //             <div class="card-header">
        //                 ID #'.$row->id.'
        //             </div>
        //             <div class="card-body">
        //                 <h5 class="card-title">'.$row->title.'</h5>
        //             </div>
        //             <div class="card-footer text-muted">
        //                 Latest Update: '.$row->updated_at.'
        //             </div>
        //         </div>
        //     </a>
        //     ';
            
        //     echo html_template;
        // }
        $resultJson = json_encode($result);

        /* Close connection to the database */
        $conn->NULL;
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // 使用JavaScript處理取得的資料
    var resultJson = <?php echo $resultJson; ?>; // 將PHP中的JSON資料傳遞到JavaScript變數中

    // 遍歷JSON資料並顯示在網頁上
    resultJson.forEach(function(item) {
        // 創建新的HTML元素
        var div = document.createElement('div');
        div.textContent = 'ID: ' + item.id + ', Title: ' + item.title + ', Updated At: ' + item.updated_at;
        
        // 將新元素添加到data-container中
        document.getElementById('container').appendChild(div);
    });
</script>
</body>
</html>