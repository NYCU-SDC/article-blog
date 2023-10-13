<!DOCTYPE html>
<html lang="en">
<?php require_once('head.php') ?>
<body>

<?php
    $article_id = $_GET['id'];

    /* Import connection file */
    require_once('connection.php');
    
    /* Execute SQL command with PDO */
    $questions_sql = 'select * from articles where id='.$article_id.';';
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
    $result = $result[0];
?>

<div class="container">
    <div class="py-5 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/1774/1774106.png" width="50" height="50" alt="">
        <h2>Edit Article</h2>
        <p class="lead">為微積分題庫系統留下你的足跡吧！</p>
    </div>

    <div class="col-md-7 col-lg-10">
        <h4 class="mb-3">Information about the Question</h4>
        <!--<form class="needs-validation" novalidate method="post" action="edit_save.php?id=".$ques_id>-->
            <?php
                echo '
                    <form class="needs-validation" novalidate method="post" action="edit_save.php?id='.$ques_id.'">
                ';
                /*echo '
                    <input type="hidden" value="'.$question->id.'">
                ';*/
            ?>
            <div class="row g-3">

                <div class="col-md-6">
                    <label for="chapter" class="form-label">Chapter</label>
                    <select class="form-select" name="chapter" id="chapter" required>
                        <!-- chapter list -->
                        <?php 
                            $sql = '
                                SELECT id, chapter_name 
                                FROM chapters
                            ';
                            $connection->sql_query($sql);
                            $selected = '
                                <option value="'.$question->chapter_id.'" selected>
                                    ch'.$question->chapter_id.'. '.$question->chapter_name.'
                                </option>
                            ';
                            //echo $selected;
                            foreach($connection->result as $row){
                                if($row->id != $question->chapter_id){
                                    $connection->chapter_dropdown($row);
                                }
                                else{
                                    echo $selected;
                                }
                            }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Please select a chapter.
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="difficulty" class="form-label">Difficulty</label>
                    <select value="<?php $question->difficulty ?>" class="form-select" name="difficulty" id="difficulty" required>
                        <?php
                            for($i=1; $i<=5; $i++){
                                if($question->difficulty == $i) echo "<option selected>".$i."</option>";
                                else echo "<option>".$i."</option>";
                            }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Please select difficulty.
                    </div>
                </div>

                <div class="col-md-7">
                    <label for="TextbookName" class="form-label">Textbook</label>
                    <!--<select class="form-control select2">-->
                    <select name="textbook_id" class="form-select" id="textbook_id" required>
                    <!--<select class="form-select" id="TextbookName" required>-->
                        <?php 
                            $sql = '
                                SELECT id, book_name 
                                FROM textbooks
                            ';
                            echo "<option value=-1></option>";
                            $connection->sql_query($sql);
                            foreach($connection->result as $row){
                                $connection->textbook_dropdown($row);
                            }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Please select a textbook.
                    </div>
                </div>

                <div class="col-sm-2">
                    <label for="page" class="form-label">Page</label>
                    <?php
                        echo '<input type="number" min="0" class="form-control" name="page" id="page" placeholder="" value="'.$question->page.'">';
                    ?>
                    <small class="text-muted">Optional</small>
                </div>
                

                <hr class="my-4">
                <h4 class="mb-3">Question Description</h4>
                <div class="row gy-1">
                    <div class="col-ms">
                        <?php 
                            echo '
                                <textarea type="text" class="form-control form-control-lg" name="ques_text" id="ques_text" placeholder="" required>'.$question->tex_content.'
                                </textarea>
                            ';
                        ?>
                        <small class="text-muted">Latex only</small>
                        <div class="invalid-feedback">
                            Please enter question description
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="#" class="col-2 btn btn-secondary me-md-2 " onClick="javascript :history.back(-1);">
                    Cancel
                </a>
                <button class="col-2 btn btn-primary " type="button" data-bs-toggle="modal" data-bs-target="#save">
                    Save
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="save" tabindex="-1" aria-labelledby="saveLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="saveLabel">Are you sure you want to update this question?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="delete_question.php?id='.$row->id.'&chapter='.$chapter.'">
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $connection->close_connection();?>
</body>
</html>

<script>

    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
        search: true
    });

</script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>