function fetchUsers(){
    
    var results = fetch('http://localhost:8080/openFolio-v1-functional/pdf/config.php')
    .then(response => response.json())
    .catch(error => console.error(error));

    return results;
}