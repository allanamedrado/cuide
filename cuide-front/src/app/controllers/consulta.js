const http = require("http");
const { on } = require("../config/db");

module.exports = {
    index() {
        http.get('http://localhost:8000/consulta', (res) => {
            console.log(res);

        }).on("error", (err) => {
            console.log("Error: " + err.message);
        });
    }
}