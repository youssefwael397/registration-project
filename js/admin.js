const url = "http://localhost/mounir/back/api/read.php";
let myTbody = document.getElementById('myTbody');
const myTable = document.getElementById('myTable');
const search = document.getElementById('search');
const signInForm = document.getElementById('signInForm');
const searchBtn = document.getElementById('searchButton');
const username = document.getElementById('username');
const password = document.getElementById('password');
const signinElements = document.getElementsByClassName('signin');
const myContainer = document.getElementById('my-container');
const welcomeMsg = document.getElementById('welcome');

let str = search.value;




document.querySelector('li .admin').classList.add('active');

myTable.style.visibility = "hidden";
search.style.visibility = "hidden";
searchBtn.style.visibility = "hidden";



// submit function handle
signInForm.addEventListener('submit', function (e) {
    e.preventDefault();
    if (username.value === 'youssefwael397@gmail.com' && password.value === '102201y@hackerranck') {

        // signInForm.style.visibility = "hidden";
        myTable.style.visibility = "visible";
        search.style.visibility = "visible";
        searchBtn.style.visibility = "visible";
        signInForm.innerText = '';

    };
})

const handleChange = () => {
    console.log(search.value);
    fetch(url)
        .then(res => {
            res.json().then(
                data => {

                    var temp = "";
                    var count = 1;
                    data.map(user => {
                        user.name.toLowerCase();
                        if (user.name.toLowerCase().includes(search.value.toLowerCase()) || user.id.includes(search.value)) {
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