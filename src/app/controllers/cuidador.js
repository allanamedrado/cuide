const db = require('../config/db')
const { date } = require('../lib/utils')

module.exports = {
    index(req, res) {
        const query = `
            SELECT * FROM cuidador
        `
        values = [
            req.body.name,
            req.body.cpf,
            date(req.body.birth).iso,
            req.body.mail,
            req.body.image,            
            req.body.username,
            req.body.password
        ]
        
        db.query(query, values, function(err, results){
            if (err) return (err)
            
            const total = results.rowCount
                 
            return res.render("cuidadores/index", results.rows)
        })
    },

    create(req, res) {
        return res.render("cuidadores/cadastro")
    },

    post(req, res) {
        const keys = Object.keys(req.body)

        for(key in keys) {
            if(req.body[key] == "") {
                return res.send("Por favor, preencha todos os campos!")
            }
        }

        const query = `INSERT INTO cuidador (
            name,
            cpf,
            birth,
            mail,
            image, 
            username,
            passw
        ) VALUES ($1, $2, $3, $4, $5, $6, $7)
            RETURNING id        
        `

        const values = [
            req.body.name,
            req.body.cpf,
            date(req.body.birth).iso,
            req.body.mail,
            req.body.image,            
            req.body.username,
            req.body.password
        ]

        console.log(values)
        console.log(req.body)

        db.query(query, values, function(err, results) {
            if (err) return res.send(err)

            return res.redirect(`cuidador/${results.rows[0].id}`)

        })
    },

    update(req, res) {
        const query = `
            UPDATE cuidador SET 
                name = ($1),
                cpf = ($2),
                birth = ($3),
                mail = ($4),
                image = ($5),
                username = ($6),
                passw = ($7)
            WHERE id = $8
            `
            const values = [
                req.body.name,
                req.body.cpf,
                date(req.body.birth).iso,
                req.body.mail,
                req.body.image,            
                req.body.username,
                req.body.password
            ]

            db.query(query, values, function(err, results) {
                if (err) return res.send(err)
    
                return res.render("cuidadores/edit", results.rows)
    
            })
    },

    delete(req, res) {
        const query = `
            DELETE FROM cuidador WHERE id = $1
        `

        const id = parseInt(req.params.id)
        
        db.query(query, [id], function(err, results){
            if (err) return (err)

            return res.redirect("/")
        })
        
    },

    show(req, res) {
        const query = `
            SELECT * FROM cuidador
        `
        const values = [
            req.body.name,
            req.body.cpf,
            date(req.body.birth).iso,
            req.body.mail,
            req.body.image,            
            req.body.username,
            req.body.password
        ]
        
        db.query(query, values, function(err, results){
            if (err) return (err)
            
            const total = results.rowCount
                 
            return res.render("cuidadores/show", total, results.rows)
        })
    },

    edit(req, res) {
        const query = `
            SELECT * FROM cuidador 
            WHERE id = $1
        `    
        values = [
            req.body.name,
            req.body.cpf,
            date(req.body.birth).iso,
            req.body.mail,
            req.body.image,            
            req.body.username,
            req.body.password
        ]   
        
        db.query(query, values, function(err, results){
            if (err) return (err)
            
            const total = results.rowCount
                 
            return res.render("cuidadores/edit", {cuidadores:results.rows})
        })           

    }
}