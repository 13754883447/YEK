#!usr/bin/env node
// const fs=require('fs');
// const os=require('os');
// function wyygetip() {
//     // let homedir=os.homedir();
//     let ip=os.networkInterfaces();
//     let r='127.0.0.1';
//     for(let i in ip){
//         let v=ip[i];
//         let tmp=v.filter(t=>t.family=='IPv4');
//         if(tmp.length){
//             r=tmp[0].address;
//         }
//         return r;
//     }
// }
// console.log('系统根目录'+os.homedir());
// console.log('系统空闲内存'+Math.ceil((os.freemem()/1024/1024/1024))+'G');
// console.log('系统IP地址'+wyygetip());
// console.log('系统'+os.platform());
// console.log('系统缓存区域'+os.tmpdir());
// console.log('系统总内存'+(os.totalmem()/1024/1024/1024)+'G');
// module.exports=wyygetip();
const fs = require('fs');
const os = require('os');
// fs.readFile('310210.jpg',(err,r)=>{
//     console.log(r);
// });
// fs.writeFile('12312.text','310210.jpg',(err,r)=>{
//    console.log('ok');
// });
// fs.unlink('12312.text',(err,r)=>{
//     console.log('ok');
// });
// fs.createReadStream('310210.jpg').pipe(fs.createWriteStream('1.jpg'));
// fs.rename('360wallpaper.jpg','123.jpg',()=>{
//    console.log('ok');
// });
//文件夹
// fs.readdir('.',(e,r)=>{
//    console.log(r);
// });
// if(!fs.existsSync('wyy')){
//     fs.mkdir('wyy',()=>{
//         console.log('ok');
//     });
// }
// fs.rmdir('wyy',()=>{
//    console.log('ok')
// });
// fs.renameSync('wyy','XXX');
//拷贝目录
// const path=require('path');
// function kaobei(dir,fn) {
//     let files = fs.readdirSync(dir);
//     files.forEach(file => {
//         let xx=path.join(dir,file);
//         let t=fs.lstatSync(xx);
//         if(t.isDirectory()){
//             kaobei(xx,fn);
//         }else if(t.isFile()){
//             console.log(file)
//         }
//     })
// }
// kaobei(__dirname,(file)=>{
//
// });

//获取
const request = require('request');
const url = require('url');
// fs.watch(__dirname,(event,file)=>{
//     console.log(event,file);
// });
// console.log(url.parse('https://www.bilibili.com'));
// console.log(url.format('https://www.bilibili.com'));
// console.log(escape('我靠'));
// console.log(unescape('%u6211%u9760'));
const cheerio = require('cheerio');
const querystring = require('querystring');
let o = url.format({
    host: 'http://www.baidu.com',
    pathname: '/s',
    search: querystring.stringify({
            wd: '香子兰与巧克力'
        }
    )
});
request.get(o, (e, r, bd) => {
    // console.log(bd);
    let $ = cheerio.load(bd);
    let t = $('#1 .c-span6 img').attr('src');
    request({
        url: t,
        headers: {
            "Referer": "https://www.baidu.com/s?ie=UTF-8&wd=%E9%A6%99%E5%AD%90%E5%85%B0%E4%B8%8E%E5%B7%A7%E5%85%8B%E5%8A%9B",
            "User-Agent": "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36"
        }
    }).pipe(fs.createWriteStream('香子兰与巧克力.jpeg'))
});