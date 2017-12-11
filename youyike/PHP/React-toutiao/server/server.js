const express=require('express');
const server=express();
const path=require('path');
const body = require('body-parser');
server.use(body.json());

server.use(express.static('./public'));
server.get('/',(req,res)=>{
    res.sendFile(path.resolve('./public/index.html'));
});

const api=require('./api.js');
server.use('/api',api);

//10分自动抓取一次
// setInterval(
//      require('./fetchData.js')
//     ,1000*60*10);
server.listen(18080);