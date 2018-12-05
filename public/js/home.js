'use strict'

let updatePrice = (slide) => {
    let total = 0;
    let ranges = document.querySelectorAll('input[type="range"]');
    let priceMonitor = document.querySelector('#priceMonitor #price');

    for (let range of ranges) {
        total += range.value * parseInt(range.getAttribute('meta-price'));
    }

    priceMonitor.textContent = total;

    let rangeMonitor = document.querySelector('#' + slide.name);

    rangeMonitor.value = slide.value;
}