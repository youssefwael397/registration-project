// fetch data from api using fetch
const api_path = "http://localhost/mounir/api/read.php";

async function getUsers() {
    try {
        const res = await fetch(api_path);
        // const data = await res.json();
        console.log(res);
    } catch (error) {
        console.log(error)
    }

}
getUsers();
