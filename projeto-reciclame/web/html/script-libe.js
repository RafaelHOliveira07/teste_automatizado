(function () {
    const progress = document.querySelector('.progress');
    const progressLabel = document.querySelector('.progress-label > strong');
    const input = document.querySelector('input[type="number"]');

    input.oninput = ({ target }) => {
        let value = target.value <= 100 && target.value >= 0 ? target.value : 0;
        progressLabel.textContent = value;
        progress.style.setProperty('--progress-value', value);
        progress.dataset.value = value;
    }

    const thermometer = document.querySelector('.thermometer');
    const thermometerLabel = document.querySelector('.thermometer .progress-label > strong');
    const input2 = document.getElementById('thermometer');

    input2.oninput = ({ target }) => {
        let value = target.value <= 50 && target.value >= 0 ? target.value : 0;
        thermometerLabel.textContent = value;
        thermometer.style.setProperty('--progress-value', value);
        thermometer.dataset.value = value;
    }
})()