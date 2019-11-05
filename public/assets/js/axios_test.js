/*fetch("http://localhost:8000/api/characters")
    .then(res=>res.json())
    .then((data)=>{
        console.log(data)
    });
*/
function updateChar(e) {
    e.preventDefault();
    console.log("Hah!!!");
    fetch("http://localhost:8000/api/character/1",{
        method: 'PUT',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({a: 1, b: 'Textual content'})
    })
        .then(res=>res.json())
        .then((data)=>{
            console.log(data)
        });
}

document.getElementById("toto").addEventListener("submit", (e)=>{
    updateChar(e);
});