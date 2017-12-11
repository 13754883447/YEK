const mysql = require('mysql');
const cheerio = require('cheerio');
const request = require('request');
const con = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'news',
    port: 3306
});
//测试
// let sql = 'insert into  news (cid,skey,title,thumbnail,url) values (?,?,?,?,?)';
// con.query(sql, [1, '2', '3', '4', '5'], (e, r) => {
//     if (e) {
//         console.log(e);
//     } else {
//         console.log(r.insertId);
//     }
// });


//得到  娱乐
// request.get('http://news.ifeng.com/', (err, res, body) => {
//     let $ = cheerio.load(body);
//     // console.log($);
//     let o_data = $('.left_co3').next('script').html();
//     let data = JSON.parse(o_data.slice(o_data.indexOf('[')));
//     let index = 0;
//     data.forEach(v => {
//         let sql = 'insert into  news (cid,skey,title,thumbnail,url) values (?,?,?,?,?)';
//         con.query(sql, [3, v.skey, v.title, v.thumbnail, v.url], (e, r) => {
//             if (!e) {
//                 index += 1;
//                 console.log(r.insertId);
//                 if (index >= data.length) {
//                     con.destroy();
//                 } else {
//                     console.log(e);
//                 }
//             }
//         })
//     });
// });
//得到数据2
// request.get('http://news.ifeng.com/',(err,res,body)=>{
//     let $=cheerio.load(body);
//     let o=$('.left_co3').nextAll('script');
//     let entList= o.eq(0).html();
//     entList=JSON.parse(entList.slice(entList.indexOf("[")));
//     let  dataList=o.eq(1).html().trim();
//     dataList=JSON.parse(dataList.slice(dataList.indexOf("["),-1));
//     dataList.splice(2,0,entList);
//
//     let total=0;
//     let index=0;
//     dataList.forEach(v=>total+=v.length);
//     dataList.forEach((data,i)=>{
//         data.forEach((v)=>{
//             let sql='insert into news(cid,skey,title,thumbnail,url) values(?,?,?,?,?)';
//             let t=Array.isArray(v.thumbnail)?v.thumbnail.join(','):v.thumbnail;
//             let skey=v.skey?v.skey:v.url;
//             con.query(sql,[i+1,skey,v.title,t,v.url],(err,result)=>{
//                 if(err){
//                     console.log(err.message);
//                 }else{
//                     console.log(result.insertId);
//                 }
//                 index+=1;
//                 if(index ==total){
//                     //停止服务器
//                     con.destroy();
//                 }
//             })
//
//         })
//     })
// })
module.exports=con;