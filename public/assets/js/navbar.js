fetch('/nav.html')
    .then(response => response.text())
    .then(data => {
        // Insert the content into the navContainer div
        document.getElementById('navContainer').innerHTML = data;
    })
    .catch(error => {
        console.log('Error:', error);
    });