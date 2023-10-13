// Select the form element by its ID
const form = document.getElementById("article_form");

// Add an event listener for the form submission
form.addEventListener("submit", function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();
    
    // Get the form data using FormData
    const formData = new FormData(form);
    
    // Perform the POST request using fetch
    fetch("create.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('New Article ID:', data);
        
        // Redirect the user to the newly created article page
        window.location.href = `article.html?id=${data}`;
    })
    .catch(error => {
        console.error("Error:", error);
    });
});
