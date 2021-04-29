const express = require('express')
const cuidador = require('./src/app/controllers/cuidador')
const routes = express.Router()


routes.get("/", function (req, res) {
    return res.render("home")
})

routes.get("/consultas", function(req, res){
    return res.render("consultas")
})

routes.get("/medicamentos", function(req, res){
    return res.render("medicamentos")
})

routes.get("/idoso", function(req, res) {
    return res.render("idoso")
})

routes.get("/cuidador", function(req, res) {
    return res.render("cuidador")
})

routes.post("/cuidador", cuidador.post)

module.exports = routes