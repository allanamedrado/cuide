const express = require('express')
const nunjucks = require('nunjucks')
const routes = require('./routes')
const methodOverride = require('method-override')

const app = express()
const server = require('http').createServer(app);
const io = require('socket.io')(server);
const cors = require('cors');

app.use(cors())
app.use(express.urlencoded({extended: true}))
app.use(methodOverride('_method'))
app.use(routes)
app.use(express.static('public'))

app.set("view engine", "njk")

nunjucks.configure("src/views", {
    express:app,
    autoescape: false,
    noCache: true
})
let messages = [];

io.on('connection', socket => {
    socket.emit('previousMessages', messages);
    socket.on('sendMessage', data => {
        messages.push(data);
        socket.broadcast.emit('receiveMessage', data);
    });
});

server.listen(5000, function(){
    console.log("server is running")
})