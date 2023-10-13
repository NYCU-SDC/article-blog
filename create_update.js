document.getElementById("article_form").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var formData = new FormData(document.getElementById("article_form"));
    
    fetch("create.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log("Success:", data);
        // Redirect or handle response as needed
    })
    .catch(error => {
        console.error("Error:", error);
    });
});
