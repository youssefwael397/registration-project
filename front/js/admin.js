
const url = "http://localhost/mounir/back/api/read.php";
let myTbody = document.getElementById('myTbody');
const myTable = document.getElementById('myTable');


fetch(url)
    .then(res => {
        res.json().then(
            data => {
                var temp = "";
                var count = 1;
                data.map(user => {
                    temp += '<tr>';
                    temp += '<th scope="row">' + count++ + '</th>';
                    temp += '<td>' + user.id + '</td>';
                    temp += '<td>' + user.name + '</td>';
                    temp += '<td>' + user.img + '</td>';
                    temp += '</tr>'

                })
                myTbody.innerHTML = temp;

                if (data.length === 0) {
                    myTable.remove();
                }
            })
    })