// Fetch the content of nav.html
fetch('/footer.html')
    .then(response => response.text())
    .then(data => {
        // Insert the content into the navContainer div
        document.getElementById('footContainer').innerHTML = data;
    })
    .catch(error => {
        console.log('Error:', error);
    });