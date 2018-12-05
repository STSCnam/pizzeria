'use strict'

// import {HTTP} from './lib/HTTP.js';

var price = 0;

let updatePrice = (input) => {
    price += input.getAttribute('meta-price');
    console.log(price);
}