const express=require('express');
const router=express.Router();
const con=require('./mysql');

router.get('/get_cates',(req,res)=>{
    let sql='select * from categories';
    con.query(sql,(err,r)=>{
        if(!err){
            res.json(r);
        }

    })
});
router.get('/get_news',(req,res)=>{
    let sql='select * from news limit 10';
    con.query(sql,(e,r)=>{
        if(!e){
            res.json(r);
        }
    })
});
router.get('/get_newsother',(req,res)=>{
    let sql='select * from news where cid=? limit 10';
    con.query(sql,[req.query.cid],(e,r)=>{
        if(!e){
            res.json(r);
        }
    })
});
router.post('/like_string',(req,res)=>{
    let sql="select * from news where title like ? ";
    con.query(sql,[req.body.string],(e,r)=>{
        if(!e){
            res.json(r)
        }
    })
});
module.exports=router;