const express=require('express');
const router=express.Router();
router.get('/add',(req,res)=>{
    res.end('add');
});
router.get('/delete',(req,res)=>{
    res.end('delete');
});
router.get('/update',(req,res)=>{
    res.end('update');
});
router.get('/get',(req,res)=>{
    res.end('get');
});
module.exports=router;