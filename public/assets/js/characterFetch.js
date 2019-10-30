function fetchMyHeroes() {
    const url = `characterToJson.php`;
    let heroCards = "";

    fetch(url)
        .then(response => response.json())
        .then(profile => {
            heroCards =
                `<img src="asset/picture/hero/${profile.picture}" alt="${profile.name}">` +
                `<h2>${profile.name}</h2>` +
                `<p>${profile.description}</p>`;
            document.querySelector('#cardContainer').innerHTML = heroCards;
        });

}

fetchMyHeroes();
