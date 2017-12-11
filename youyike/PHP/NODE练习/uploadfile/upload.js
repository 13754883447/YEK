const fs = require('fs');
const body = require('body-parser');
const express = require('express');
const server = express();
const os = require('os');
const path = require('path');
const multer = require('multer');
// const upload=multer({dest:os.tmpdir()});
const upload = multer({dest: './'});
// const user=require('./router/user');//引入router模块
// server.use('/user',user);
const cookie = require('cookie-parser');
const session = require('express-session');
// server.use(user());
server.use(session({
    secret: 'keyboard cat',
    resave: false,
    saveUninitialized: true
}));
server.use(body.json());
server.use(body.urlencoded());
server.use(express.static('./public'));
server.use(cookie());












//session
// server.get('/',
//     (req, res, next) => {
//         if (req.session.login) {
//             next();
//         } else {
//             res.redirect('/login')
//         }
//     },
//     (req, res) => {
//         res.sendFile(path.resolve('./index.html'));
//     }
// );
// server.get('/login',
//     (req, res, next) => {
//         if (!req.session.login) {
//             next();
//         } else {
//             res.redirect('/')
//         }
//     },
//     (req, res) => {
//         res.sendFile(path.resolve('./login.html'));
//     }
// );
// server.post('/check', (req, res) => {
//     if (req.body.user == '123' && req.body.pass == '123') {
//         req.session.login=true;
//         res.json({code: 2, message: '登录成功'})
//     }
// });
// server.get('/api/*',
//     (req, res, next) => {
//         if (req.session.login) {
//             next();
//         } else {
//             res.json({code: 403, message: 'forbidden'})
//         }
//     },
// );


//cookie
// server.get('/',
//     (req,res,next)=>{
//         if (req.cookies.done) {
//             next();
//         } else {
//             res.redirect('/login')
//         }
//     },
//     (req,res)=>{
//         res.sendFile(path.resolve('./index.html'));
//     }
// );
// server.get('/login',
//     (req,res,next)=>{
//         if (!req.cookies.done) {
//             next();
//         } else {
//             res.redirect('/')
//         }
//     },
//     (req,res)=>{
//         res.sendFile(path.resolve('./login.html'));
//     }
// );
// server.post('/check',(req,res)=>{
//    if(req.body.user=='123'&&req.body.pass=='123'){
//       res.cookie('done','true',{
//          expires:new Date(Date.now()+7*24*24*1000),
//           path:'/',
//           httpOnly:true
//       });
//       res.json({code:2,message:'登录成功'})
//    }
// });
// server.get('/api/*',
//     (req,res,next)=> {
//         if (req.cookies.done) {
//             next();
//         } else {
//             res.json({code:403,message:'forbidden'})
//         }
//     },
// );


//保存文件
// server.post('/upload',upload.single('file'),(req,res)=>{
//    let file=req.file;
//    fs.rename(
//        file.path,
//        path.join('./public',file.filename+'.'+file.mimetype.split('/')[1]),
//        ()=>{
//           res.end('上传成功');
//        }
//    )
// });
server.listen(6332);
//
// const express = require('express');
// const server = express();
// const port = 3333;
//
// const path = require('path');
// const fs = require('fs');
// const os = require('os');
//
// const multer = require('multer');
// const upload = multer({dest:'./'});
//
// //全局中间件
// server.use(express.static('./public'));
//
// const bodyParser = require('body-parser');
// server.use(bodyParser.json());
//
// server.get('/',(req,res)=>{
//     res.sendFile(path.resolve('./index.html'));
// });
//
// server.post('/upload',upload.single('file'),(req,res)=>{
//     console.log(req.file);
//     let file = req.file;
//     fs.rename(
//         file.path,
//         path.join('./public',file.filename+'.'+file.mimetype.split('/')[1]),
//         ()=>{
//             res.end('ok')
//         }
//     )
// })
//
// server.listen(port);
