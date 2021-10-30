
const url = "http://localhost/mounir/back/api/read.php";
let myTbody = document.getElementById('myTbody');
const myTable = document.getElementById('myTable');
const search = document.getElementById('search');
let str = search.value;


const handleChange = () => {
    console.log(search.value);
    fetch(url)
        .then(res => {
            res.json().then(
                data => {

                    var temp = "";
                    var count = 1;
                    data.map(user => {
                        if (user.name.includes(search.value.toLowerCase()) || user.id.includes(search.value)) {
                            temp += '<tr>';
                            temp += '<th scope="row">' + count++ + '</th>';
                            temp += '<td>' + user.id + '</td>';
                            temp += '<td>' + user.name + '</td>';
                            temp += '<td>' + user.img + '</td>';
                            temp += '</tr>'
                        }

                        myTbody.innerHTML = temp;

                    })

                    if (data.length === 0) {
                        myTable.remove();
                    }

                })
        })


};


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
