const express = require('express')
const app = express()
const server = require('http').Server(app)
const io = require('socket.io')(server)
const v4 = 10
/* group id goes for v4 */


app.set('view engine', 'ejs')
app.use(express.static('public'))


app.get('/', (req,res) => {
    res.redirect(`/${v4}/`)
})

app.get('/:room',(req,res) => {
    res.render('room', {roomId: req.params.room })
})


io.on('connection', (socket) =>{
    socket.on('join-room',(roomId,userId) =>{
        socket.join(roomId)
        socket.to(roomId).emit('user-connected', userId);
    })
})

server.listen(8010)