// Use the "fetch()" API to send a request
fetch('read_article_list.php')
    .then(response => response.json()) // Parse JSON data
    .then(data => {
        // Iterate through JSON data and display it on the web page
        data.forEach(item => {
            // Create a new HTML element
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

            // Append the new element to the <div> element with ID 'data-container'
            document.getElementById('data-container').appendChild(div);
        });
    })
    .catch(error => {
        console.error('Error:', error); // Handle errors
    });

