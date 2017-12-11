const express = require('express');
const server = express();
const path = require('path');
const mysql = require('mysql');
const body = require('body-parser');
const con = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'sell'
});
server.use(body.json());
server.use(express.static('./public'));
server.listen(18888);
server.get('/',(req,res)=>{
    res.sendFile(path.resolve('./index.html'));
});
server.get('/insert_bianqian',(req,res)=>{
    let sql='insert into bianqian(title,cont) values(?,?)';
    con.query(sql,[req.body.title,req.body.cont],(err,result)=>{
        if (err) {
            res.json({code: 4, message: '添加失败'});
        }else{
            res.json({code: 2, message: '添加成功'});
        }
    })
});
server.get('/select_bianqian',(req,res)=>{
    let sql='select * from bianqian';
    con.query(sql, (err, result) => {
        if (err) {
            console.log(err.message);
        } else {
            res.json(result);
        }
    })
});
server.post('/save_notes',(req,res)=>{
   let sql='insert into bianqian(title,cont,l,t)';
   con.query(sql,[req.body.title,req.body.content,req.body.l,req.body.t],(err,result)=>{
       if(err){
           res.json({code: 4, message: '插入失败'});
       }else{
           res.json({code: 2, message: '插入成功'});
       }
   })
});
server.post('/update_notes',(req,res)=>{
    let sql='update notes set l=?,t=? where id=?';
    con.query(sql,[req.body.l,req.body.t,req.body.id],(err,result)=>{
        if(err){
            res.json({code: 4, message: '更新失败'});
        }else{
            res.json({code: 2, message: '更新成功'});
        }
    })
});