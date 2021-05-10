/*const http = require('http');
const { on } = require("../config/db");*/

const http = require('http');
const request = require('request');

module.exports = {
  
index(req) {

const hostname = 'http://pokeapi.co/api/v2/pokemon/';


request(`${hostname}`, (err, res, body) => {
  console.log(body);
  });



    


  


}


}