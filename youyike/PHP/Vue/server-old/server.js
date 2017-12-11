const express = require('express');//开启服务功能
const server = express();//实例化
const path = require('path');//文件功能
const mysql = require('mysql');//后台server功能
const body = require('body-parser');//POST功能
server.use(body.json());//中间件 必然会走一次
const con = mysql.createConnection({//服务器验证
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'sell'
    // port:''
});
server.use(express.static('./public'));
server.listen(20000);//监听端口
server.get('/api/jiedan',(req,res)=>{//API 接口  前台访问  req前台发来的数据,res后台返回的数据
    let sql='update  orders set state=1 where id=?';//sql 语句
    con.query(sql,[req.query.id],(err,result)=>{//使用查询 ,err错误,result成功返回的数据
        console.log(result.affectedRows);
        if(err){//错误的话
            res.json({code:4,message:'接单失败'})
        }else{//成功的话
            res.json({code:2,message:'接单成功'})
        }
    })
});
server.get('/api/shandan',(req,res)=>{
    let sql='delete from orders  where id=?';
    con.query(sql,[req.query.id],(err,result)=>{
        console.log(result.affectedRows);
        if(err){
            res.json({code:4,message:'删单失败'})
        }else{
            res.json({code:2,message:'删单成功'})
        }
    })
});
server.get('/api/shoping_dingdan',(req,res)=>{
    let sql='select * from shi_orders where sid=?';
    con.query(sql,[req.query.sid],(err,result)=>{
        if (!err) {
            let s = '(';
            result.forEach(v => {
                s += v.id + ','
            });
            let sql = 'select * from choied_goods where oid in' + s.slice(0, -1) + ');';
            con.query(sql, (e, r) => {
                if (!err) {
                    res.json({
                        code: 2,
                        message: '获取成功',
                        data: {
                            orders: r,
                            goods: result
                        }
                    })
                }
            })
        }
    })
});
server.get('/api/select_xinxi',(req,res)=>{
    let sql='select * from putonguser where id=?';
    con.query(sql,[req.query.id],(err,result)=>{
        if(!err){
            res.json(result[0]);
        }
    })
});
server.post('/api/post_ptusercheck',(req,res)=>{
    let sql = 'select * from putonguser where account=? and pass=?';
    con.query(sql,[req.body.account,req.body.pass],(err,result)=>{
        if (result.length) {
           res.json({code: 2, message: '登录成功', id: result[0].id})
        }else{
            res.json({code: 4, message: '登录失败！该账号不存在'})
        }
    })

});
server.post('/api/updatepass',(req,res)=>{
    let sql='select * from putonguser where id=? and pass=?';
    con.query(sql,[req.body.id,req.body.oldpass],(er,r)=>{
        if(er){
            console.log(er);
            res.json({code:4,message:'原密码错误'});
        }else{
            let sql='update  putonguser set pass=? where id=?';
            con.query(sql,[req.body.newpass,req.body.id],(err,result)=>{
                if(err){
                    console.log(err);
                    res.json({code:4,message:'修改失败，请稍后再试'});
                }else{
                    res.json({code:2,message:'修改成功，下次登录请使用新密码'});
                }
            })
        }
    });
});
server.get('/api/get_orders', (req, res) => {
    let sql = 'select * from shi_orders where uid=?';
    con.query(sql, req.query.id, (err, result) => {
        if (!err) {
            let s = '(';
            result.forEach(v => {
                s += v.id + ','
            });
            let sql = 'select * from choied_goods where oid in' + s.slice(0, -1) + ');';
            con.query(sql, (e, r) => {
                if (!err) {
                    res.json({
                        code: 2,
                        message: '获取成功',
                        data: {
                            orders: r,
                            goods: result
                        }
                    })
                }
            })
        }
    })
});
server.get('/api/get_shangjia', (req, res) => {
    let sql = 'select * from dianpu where id=?';
    con.query(sql, [req.query.id], (err, result) => {
        if (err) {
            res.json({code: 4, message: 'dianpu获取失败'})
        } else {
            res.json(result)
        }
    })
});
server.post('/api/insert_orders', (req, res) => {
    let sql = 'insert into orders (uid,sid,address_id) values (?,?,?)';
    con.query(sql, [req.body.uid, req.body.sid, req.body.address_id], (err, result) => {
        if (err) {
            res.json({code: 4, message: 'orders插入失败'})
        } else {
            let oid = result.insertId;
            console.log(oid);
            req.body.goods.forEach(v => {
                let sql = 'insert into order_goods (oid,gid,num) values (?,?,?)';
                let index = 0;
                con.query(sql, [oid, v.c_id, v.num], (er, r) => {
                    if (!er) {
                        index++;
                        if (index === req.body.goods.length) {
                            res.json({code: 2, message: 'order_goods成功'})
                        }
                    }
                })
            })
        }
    })
});
server.post('/api/insert_useraddress', (req, res) => {
    let sql = 'insert into user_address (uid,name,sex,phone,address1,address2,biaoqian) values (?,?,?,?,?,?,?)';
    con.query(sql, [req.body.uid, req.body.name, req.body.sex, req.body.phone, req.body.address1, req.body.address2, req.body.biaoqian], (err, result) => {
        if (err) {
            res.json({code: 4, message: '增加地址失败'});
        } else {
            res.json({code: 2, message: '增加地址成功'});
        }
    })
});
server.get('/api/select_address', (req, res) => {
    let sql = 'select * from user_address where uid=?';
    con.query(sql, [req.query.id], (err, result) => {
        if (err) {
            console.log(err.message)
        } else {
            res.json(result)
        }
    })
});
server.get('/api/select_addressone', (req, res) => {
    let sql = 'select * from user_address where uid=?&address_default=1';
    con.query(sql, [req.query.id], (err, result) => {
        if (err) {
            console.log(err.message)
        } else {
            res.json(result[0])
        }
    })
});
server.get('/api/dizhi', (req, res) => {
    let sql = 'update user_address set address_default=0';
    con.query(sql, (err, result) => {
        if (err) {
            res.json({code: 4, message: '清除失败'})
        } else {
            let sql = 'update user_address set address_default=1 where id=?';
            con.query(sql, [req.query.id], (err, result) => {
                if (err) {
                    console.log(err)
                    res.json({code: 4, message: '更新失败'})
                } else {
                    res.json({code: 2, message: result.affectedRows})
                }
            })
        }
    })
});
server.post('/api/post_Login', (req, res) => {
    let sql = 'insert into user(account,pass) values(?,?)';
    con.query(sql, [req.body.account, req.body.pass], (err, result) => {
        if (err) {
            if (err.message.startsWith('ER_DUP_ENTRY')) {
                res.json({code: 4, message: '账号已被注册'});
            }
        } else {
            res.json({code: 2, message: '注册成功'});
        }
    });
});
server.post('/api/post_putonguser', (req, res) => {
    let sql = 'select * from putonguser where account=?';
    con.query(sql, [req.body.account, req.body.check], (err, result) => {
        if (req.body.check !== '888888') {
            res.json("验证码错误！");
        } else {
            let sql = 'select * from putonguser where account=?';
            con.query(sql, [req.body.account], (err, result) => {
                if (result.length) {
                    res.json({code: 2, message: '登录成功', id: result[0].id})
                } else {
                    let sql = 'insert into putonguser (account) values (?)';
                    con.query(sql, [req.body.account], (err, result) => {
                        if (err) {
                            res.json({code: 2, message: '注册失败'})
                        } else {
                            console.log(insertId)
                            res.json({code: 2, message: '注册成功', id: insertId})
                        }
                    })
                }
            })
        }
    })
});
server.post('/api/getputong', (req, res) => {
    let sql = 'select * from putonguser where id=?';
    con.query(sql, [req.body.id], (err, result) => {
        if (err) {
            res.json({code: 4, message: '获取错误'})
        } else {
            res.json(result[0]);
        }
    })
});
server.post('/api/check_denglu', (req, res) => {
    let sql = 'select * from user where account=? and pass=?';
    con.query(sql, [req.body.account, req.body.pass], (err, result) => {
        if (err) {
            res.json({code: 4, message: '账号或密码错误'});
        } else {
            let sql = 'select * from dianpu where uid=?';
            con.query(sql, [result[0].uid], (err, r) => {
                if (r) {
                    res.json({code: 2, message: '登录成功', data: result[0], has: true});
                } else {
                    res.json({code: 2, message: '登录成功', data: result[0], has: false});
                }
            })
        }
    })
});
server.post('/api/post_dianpu', (req, res) => {
    let sql = "insert into dianpu(name,uid,logo,yun,fei,gonggao,youhui,qison,huodong,dizhi,yingyeshijian,yingyezhizhao) values(?,?,?,?,?,?,?,?,?,?,?,?)";
    con.query(sql, [req.body.name, req.body.uid, req.body.logo, req.body.yun, req.body.fei, req.body.gonggao, req.body.youhui, req.body.qison, req.body.huodong, req.body.dizhi, req.body.yingyeshijian, req.body.yingyezhizhao], (err, result) => {
        if (err) {
            res.json({code: 4, message: "添加店铺失败"});
        } else {
            res.json({code: 2, message: '添加店铺成功'});
        }
    })
});
server.post('/api/post_shangbiao', (req, res) => {
    let sql = 'update dianpu set shangbiao=? where uid=?';
    con.query(sql, [req.body.shangbiao, req.body.uid], (err, result) => {
        if (err) {
            res.json({code: 4, message: '商标提交失败'});
        } else {
            res.json({code: 2, message: '商标提交成功'});
        }
    });
});
server.post('/api/dianpu_update', (req, res) => {
    let sql = 'update dianpu set name=?,logo=?,yun=?,fei=?,gonggao=?,youhui=?,qison=?,huodong=?,dizhi=?,shangbiao=?,yingyezhizhao=? where uid=?';
    con.query(sql, [req.body.name, req.body.logo, req.body.yun, req.body.fei, req.body.gonggao, req.body.youhui, req.body.qison, req.body.huodong, req.body.dizhi, req.body.shangbiao, req.body.yingyezhizhao, req.body.uid], (err, result) => {
        if (err) {
            res.json({code: 4, message: '修改失败'});
        } else {
            res.json({code: 2, message: '修改成功'});
        }
    })
});
server.post('/api/insert_goods', (req, res) => {
    let sql = 'insert into goods(g_name,g_desc,uid) values(?,?,?)';
    con.query(sql, [req.body.g_name, req.body.g_desc, req.body.uid], (err, result) => {
        if (err) {
            res.json({code: 4, message: '添加栏目失败'});
        } else {
            res.json({code: 2, message: '添加栏目成功'});
        }
    })
});
server.post('/api/del_goods', (req, res) => {
    let sql = 'delete from goods where g_name=?';
    con.query(sql, [req.body.g_name], (err, result) => {
        if (err) {
            res.json({code: 4, message: '删除栏目失败'});
        } else {
            res.json({code: 2, message: '删除栏目成功'});
        }
    })
});
server.get('/api/get_dianpuxinxi', (req, res) => {
    let sql = 'select * from dianpu where uid=?';
    con.query(sql, [req.query.uid], (err, result) => {
        if (err) {
            console.log(err.message);
        } else {
            res.json(result);
        }
    });
});////数据库查询数据
server.get('/', (req, res) => {
    res.sendFile(path.resolve('./index.html'));
});
server.get('/api/selectaddress', (req, res) => {
    let sql = 'select * from user_address where id=?';
    con.query(sql, [req.query.id], (err, result) => {
        if (err) {
            console.log(err.message);
        } else {
            res.json(result[0]);
        }
    })
});
server.post('/api/update_useraddress', (req, res) => {
    let sql = 'update user_address set  name=?, sex=?, phone=?, address1=?, address2=?, biaoqian=? where id=?';
    con.query(sql, [req.body.name, req.body.sex, req.body.phone, req.body.address1, req.body.address2, req.body.biaoqian, req.body.id], (err, result) => {
        if (err) {
            console.log(err)
            res.json({code: 4, message: '修改失败'});
        } else {
            res.json({code: 2, message: '修改成功'});
        }
    })
});
server.get('/api/get_goods', (req, res) => {
    let sql = 'select * from goods where uid=?';
    con.query(sql, [req.query.uid], (err, result) => {
        if (err) {
            console.log(err.message);
        } else {
            res.json(result);
        }
    });
});////数据库查询数据
server.get('/api/get_categories', (req, res) => {
    let sql = 'select * from categories where uid=?';
    con.query(sql, [req.query.uid], (err, result) => {
        if (err) {
            console.log(err.message);
        } else {
            res.json(result);
        }
    });
});
server.get('/api/get_dianpu', (req, res) => {
    let sql = 'select * from dianpu where id=?';
    con.query(sql, [req.query.id], (err, result) => {
        if (err) {
            console.log(err.message);
        } else {
            res.json(result);
        }
    })
});
server.get('/api/get_dianpuAll', (req, res) => {
    let sql = 'select * from dianpu';
    con.query(sql, (err, result) => {
        if (err) {
            console.log(err.message);
        } else {
            res.json(result);
        }
    })
});
server.get('/api/delete_address', (req, res) => {
    let sql = 'delete from user_address where id=?';
    con.query(sql, [req.query.id], (err, result) => {
        if (err) {
            console.log(err);
            res.json({code: 4, message: '删除失败'});
        } else {
            res.json({code: 4, message: '删除成功'});
        }
    })
});
//任何人访问/都会执行发送和请求
// 请求的地址
// console.log(req.url);
// 请求的头信息
// console.log(req.header);
//获取请求的查询字符串
// console.log(req.query);
// 获取用户的ip地址
// console.log(req.socket.remoteAddress);
// 请求以什么方式结束
// res.end(`<script></script>`);
// res.setHeader('Content-Type','text/html');
// 中间件
// server.use(express.static('/public'));
// server.use(function (req,res,next) {
//     console.log(req.socket.remoteAdderss);
//     if(req.url.startsWith===('/static')){
//         res.sendFile(path.resolve('./public'+req.url()));
//     }else{
//         next();
//     }
//
// })
// server.get('/api/get_goods', (req, res) => {
//     con.query('select g_id,g_name from goods where g_parentid=?',
//         [req.query.g_parentid],
//         (err, result) => {
//             if (err) {
//                 console.log(err.message);
//             } else {
//                 res.json(result);
//             }
//         });
// });////数据库查询数据
// server.get('/api/add_goods', (req, res) => {
//     let sql='insert into goods(g_parentid,g_name) values(?,?)';
//     con.query(sql,[req.query.g_parentid,req.query.g_name],(err,result)=>{
//         if (err) {
//             console.log(err.message);
//         } else {
//             res.json(result.affectedRows);
//         }
//     });
// });//////插入
// server.get('/api/update_goods', (req, res) => {
//     let sql='update goods set g_name=? where g_id=?';
//     con.query(sql,[req.query.g_name,req.query.g_id],(err,result)=>{
//         if (err){
//             console.log(err.message);
//         }else{
//             res.json(result.affectedRows);
//         }
//     });
// });//////更新
// server.get('/api/delete_goods', (req, res) => {
//     let sql='delete from goods where g_id=?';
//     con.query(sql,[req.query.g_id],(err,result)=>{
//         if (err){
//             console.log(err.message);
//         }else{
//             res.json(result.affectedRows);
//         }
//     })
// });/////删除单个
// server.get('/api/del_goods', (req, res) => {
//     let sql=`delete from goods where g_id in ($(req.query.ids))`;
//     con.query(sql,(err,result)=>{
//         if (err){
//             console.log(err.message);
//         }else{
//             res.json(result.affectedRows);
//         }
//     });
// });