const url = 'https://api.openweathermap.org/data/2.5/weather?lat=48.632091&lon=-2.259804&appid=c77f500256a4aed70e4698a0ca0ef8bd&units=metric'

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
    document.querySelector('.temperature').innerHTML += parseInt(d.main.temp)+"°c"
    document.querySelector('.lieu').innerHTML += d.name
    let options = {
        timeZone: 'Europe/Paris',
        hour: 'numeric',
        minute: 'numeric'
    }
    let formatter = new Intl.DateTimeFormat([], options);
    let timeText = document.querySelector('time.time')
    timeText.innerHTML = formatter.format(new Date())
}