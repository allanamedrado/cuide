const axios = require('axios')
const api = require('../controllers/api')

api.get("/consulta", async(req, res) => {
    try {
        const {data} = await axios('https://localhost:8000/consulta')

        return res.json(data)
    } catch (error) {
        console.log(error)
    }
    
}),

async function makePost() {
    const dataForm = req.body
    
    const url  = "https://localhost:8000/consulta"
    const data = JSON.stringify(dataForm)
    
    try {
        const response = await api.post(url,data)
        console.log(response)
    } catch (error) {
        console.log(error)
    }
    
}
