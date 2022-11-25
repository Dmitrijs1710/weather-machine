var data = window.document.getElementById('temperature-data');
var feelsLikeData = window.document.getElementById('feels-like-data');
var feelsLikeType = window.document.getElementById('feels-like-type');
if (data !== null && feelsLikeData !== null && feelsLikeType !== null) {
    var celsius_1 = parseInt(data.innerText);
    var fahrenheit_1 = Math.round(celsius_1 * 9 / 5 + 32);
    var feelsLikeCelsius_1 = parseInt(feelsLikeData.innerText);
    var feelsLikeFahrenheit_1 = Math.round(feelsLikeCelsius_1 * 9 / 5 + 32);
    var celsiusButton_1 = window.document.getElementById('celsius-button');
    if (celsiusButton_1 !== null) {
        celsiusButton_1.disabled = true;
        celsiusButton_1.addEventListener('click', function () {
            celsiusButton_1.disabled = true;
            if (fahrenheitButton_1 !== null) {
                fahrenheitButton_1.disabled = false;
            }
            data.innerText = celsius_1.toString();
            feelsLikeData.innerText = feelsLikeCelsius_1.toString();
            feelsLikeType.innerText = 'C';
        });
    }
    var fahrenheitButton_1 = window.document.getElementById('fahrenheit-button');
    if (fahrenheitButton_1 !== null) {
        fahrenheitButton_1.addEventListener('click', function () {
            fahrenheitButton_1.disabled = true;
            if (celsiusButton_1 !== null) {
                celsiusButton_1.disabled = false;
            }
            data.innerText = fahrenheit_1.toString();
            feelsLikeData.innerText = feelsLikeFahrenheit_1.toString();
            feelsLikeType.innerText = 'F';
        });
    }
}
