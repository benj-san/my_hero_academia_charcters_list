function fetchMyHeroes() {
    const url = `heroToJson.php`;
    let heroCards = "";
    fetch(url)
        .then(response => response.json())
        .then(profile => {
            profile.forEach( element => {
                heroCards += `<div class="characterCard">` +
                    `<a href="character.php?id=${element.id}">` +
                    `<article>` +
                    `<img src="asset/picture/hero/default.png" alt="default picture">` +
                    `<h2>${element.name}</h2>` +
                    `<p>${element.description}</p>` +
                    `</article>` +
                    `</a>` +
                    `</div>`;
                document.querySelector('#cardContainer').innerHTML = heroCards;
            })
        });
}

fetchMyHeroes();
