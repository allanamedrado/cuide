const db = require('../config/db')
const { date } = require('../lib/utils')

module.exports = {

    post(req, res) {
        const keys = Object.keys(req.body)

        for(key in keys) {
            if(req.body[key] == "") {
                return res.send("Por favor, preencha todos os campos!")
            }
        }

        const query = `
            INSERT INTO cuidador (
                name,
                birth,
                mail,
                image,                
                cpf
            ) VALUES ($1, $2, $3, $4, $5)
                RETURNING id        
        `

        const values = [
            req.body.name,
            date(req.body.birth).iso,
            req.body.mail,
            req.body.image,            
            req.body.cpf
        ]

        db.query(query, values, function(err, results) {
            if (err) return res.send(err)

            return res.redirect(`cuidador/${results.rows[0].id}`)

        })
    }
}