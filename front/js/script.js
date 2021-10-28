const myForm = document.getElementById('myForm');
myForm.addEventListener('submit', async function (e) {

    var url = "http://localhost/mounir/back/api/create.php";
    var id = document.getElementById('id').value;
    var name = document.getElementById('name').value;
    var img = document.getElementById('img').value;

    data = {
        "id": id,
        "name": name,
        "img": img
    }



    fetch(url,
        {
            method: "POST",
            body: JSON.stringify(data),
            mode: 'cors',
            headers: {
                'Content-Type': 'application/json',
            }
        }
    ).then(response => response.json())
        .then(response => {
            console.log(response)
        })
        .catch((err) => {
            console.log(err)
        });

});