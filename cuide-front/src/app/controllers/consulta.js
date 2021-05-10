const http = require("http");
const { on } = require("../config/db");

module.exports = {
    index() {
        http.get('https://pokeapi.co/api/v2/pokemon/', (res) => {
            console.log(res);

        }).on("error", (err) => {
            console.log("Error: " + err.message);
        });
    }
}