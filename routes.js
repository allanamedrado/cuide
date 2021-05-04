const express = require('express')
const cuidadores = require('./src/app/controllers/cuidador')
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

routes.get("/cuidadores/create", function(req, res) {
    return res.render("cuidadores/create")
})

routes.get("/cuidadores", cuidadores.index)
routes.get("/cuidadores/index", cuidadores.index)
routes.get("/cuidadores/cadastro", cuidadores.create)
routes.get("/cuidadores/:id", cuidadores.show)
routes.get("/cuidadores/:id/edit", cuidadores.edit)
routes.post("/cuidadores", cuidadores.post)
routes.put("/cuidadores", cuidadores.update)
routes.delete("/cuidadores", cuidadores.delete)


module.exports = routes