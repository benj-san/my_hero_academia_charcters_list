if (document.getElementById('insertHeroForm') !== null) {
    document.getElementById('popMyForm').addEventListener('click', function () {
        document.getElementById('insertHeroForm').classList.toggle('selected');
    });
}

if (document.getElementById('kiminonawa') !== null) {
    document.getElementById('popMyAccount').addEventListener('click', function () {
        document.getElementById('kiminonawa').classList.toggle('selected');
    });
}

if (document.getElementById('accountForm') !== null && document.getElementById('accountAccess') !== null) {
    document.getElementById('popMyAccount').addEventListener('click', function () {
        document.getElementById('accountForm').classList.toggle('selected');
        document.getElementById('accountAccess').classList.toggle('selected');
    });
}

const myUpdateButtons = document.querySelectorAll('.updateMe');
const myUpdateForms = document.querySelectorAll('.updateForm');
for (let i = 0; i<myUpdateButtons.length; myUpdateButtons[i++]) {
    myUpdateButtons[i].addEventListener('click', function () {
        myUpdateForms[i].classList.toggle('displayed');
    });
}