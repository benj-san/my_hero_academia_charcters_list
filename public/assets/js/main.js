document.getElementById('popMyForm').addEventListener('click', function(){
document.getElementById('insertHeroForm').classList.toggle('selected');
});

const myUpdateButtons = document.querySelectorAll('.updateMe');
const myUpdateForms = document.querySelectorAll('.updateForm');
for (let i = 0; i<myUpdateButtons.length; myUpdateButtons[i++]){
    myUpdateButtons[i].addEventListener('click', function(){
        myUpdateForms[i].classList.toggle('displayed');
    });
}