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
    }
}