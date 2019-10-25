function fetchMyHeroes() {
    const url = `heroToJson.php`;
    let heroCards = "";
    fetch(url)
        .then(response => response.json())
        .then(profile => {
            profile.forEach( element => {
                heroCards += `<div class="characterCard">` +
                    `<a href="characterBee.php?id=${element.id}">` +
                    `<article>` +
                    `<img src="asset/picture/hero/${element.picture}" alt="${element.name}">` +
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
