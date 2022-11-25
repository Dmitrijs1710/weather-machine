const data: HTMLElement | null = window.document.getElementById('temperature-data');
const feelsLikeData: HTMLElement | null = window.document.getElementById('feels-like-data');
const feelsLikeType: HTMLElement | null = window.document.getElementById('feels-like-type');
if (data !== null && feelsLikeData !== null && feelsLikeType !== null) {
    const celsius: number = parseInt(data.innerText);
    const fahrenheit: number = Math.round(celsius * 9 / 5 + 32);
    const feelsLikeCelsius: number = parseInt(feelsLikeData.innerText);
    const feelsLikeFahrenheit: number = Math.round(feelsLikeCelsius * 9 / 5 + 32);
    const celsiusButton = window.document.getElementById('celsius-button') as HTMLButtonElement;
    if (celsiusButton !== null) {
        celsiusButton.disabled = true;
        celsiusButton.addEventListener('click', () => {
            celsiusButton.disabled = true
            if (fahrenheitButton !== null) {
                fahrenheitButton.disabled = false;
            }
            data.innerText = celsius.toString();
            feelsLikeData.innerText = feelsLikeCelsius.toString();
            feelsLikeType.innerText = 'C';
        });
    }
    const fahrenheitButton = window.document.getElementById('fahrenheit-button') as HTMLButtonElement;
    if (fahrenheitButton !== null) {
        fahrenheitButton.addEventListener('click', () => {
            fahrenheitButton.disabled = true;
            if (celsiusButton !== null) {
                celsiusButton.disabled = false;
            }
            data.innerText = fahrenheit.toString();
            feelsLikeData.innerText = feelsLikeFahrenheit.toString();
            feelsLikeType.innerText = 'F';
        });
    }
}


