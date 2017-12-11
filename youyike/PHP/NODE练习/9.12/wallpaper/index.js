// #!/usr/bin/env node
// const request = require('request');
const fs = require('fs');
// const wallpaper = require('wallpaper');
// let base = 'http://cn.bing.com';
// let url = "https://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1&nc=1505123315720&pid=hp";
//
// function bing(fn) {
//     request.get(url, (err, res, body) => {
//         let data = JSON.parse(body).images[0];
//         let url = data.url;
//         let w=fs.createWriteStream(data.hsh + '.png')
//         request.get(base + url).pipe(w);
//         fn(null, data.hsh + '.png');
//
//         w.on('finish',()=>{
//             wallpaper.set(data.hsh + '.png').then(() => {
//             console.log(done)
//         });
//         });
//         // wallpaper.get(data.hsh + 'png').then(imagePath => {
//         //     console.log(imagePath);
//         // })
//     })
// }
// bing((err, r) => {
//     console.log(r);
// });
// module.exports = bing;
// 加密 Buffer
// const crypto=require('crypto');
// const str='5454565';
// const hash=crypto.createHmac('sha256',str).update('I love U').digest('sex');
// console.log(hash);
//流
const stream=require('stream');

