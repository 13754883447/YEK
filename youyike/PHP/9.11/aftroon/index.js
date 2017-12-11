let request = require('request');
let fs = require('fs');
let base = 'http://cn.bing.com';
let url = "https://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1&nc=1505123315720&pid=hp";

function bing(fn) {
    request.get(url, (err, res, body) => {
        let data = JSON.parse(body).images[0];
        let url = data.url;
        request.get(base + url)
            .pipe(fs.createWriteStream(data.hsh + '.png'));
        fn(null, data.hsh + '.png')
    })
}

bing((err, r) => {
    console.log(r);
});
module.exports = bing;