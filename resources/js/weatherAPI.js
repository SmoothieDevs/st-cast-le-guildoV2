const url = 'https://api.openweathermap.org/data/2.5/weather?lat=48.632091&lon=-2.259804&appid=c77f500256a4aed70e4698a0ca0ef8bd'

function getWeather(callback) {
    let obj
    fetch(url).then(response => response.json())
        .then(data => {
            console.log(data)
            obj = data
        })
        .then(() => callback(obj))
        .catch(function (error) {
            console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
        });
}

getWeather(getData)

function getData(d) {
    let lieu = d.name
    let place = document.querySelector('.lieu')
    place.innerHTML += lieu

    let options = {
        timeZone: 'Europe/Paris',
        hour: 'numeric',
        minute: 'numeric'
    }
    formatter = new Intl.DateTimeFormat([], options);
    let timeText = document.querySelector('time.time')
    timeText.innerHTML = formatter.format(new Date())
}