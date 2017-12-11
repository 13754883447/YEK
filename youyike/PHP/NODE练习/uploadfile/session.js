const express = require('express');
const server = express();
const port = 11111;
const session = require('express-session');
const user = require('./router/user');
server.use(
    session({
        secret: 'keyboard cat',
        resave: false,
        saveUninitialized: true
    })
);
server.use('/user',user);
server.get('/',(req,res)=>{
    res.end('welcome'+req.session.user);
})
server.get('/a',(req,res)=>{
    req.session.user='pppppp';
    res.end(req.session.user);
});
server.get('/as',(req,res)=>{
    if(req.session.user){
        res.end('ok');
    }else{
        res.redirect('/a');
    }
})

server.listen(port);