// Fetch the content of head.html
fetch('/head.html')
    .then(response => response.text())
    .then(data => {
        // Insert the content into the navContainer div
        document.getElementById('headContainer').innerHTML = data;
    })
    .catch(error => {
        console.log('Error:', error);
    });