const request = require('request');
const fs = require('fs');
const url = require('url');
const querystring = require('querystring');
const path = require('path');

function getlrc(name) {
    request.post({
        url: 'https://music.163.com/api/search/pc',
        form: {
            s: name,
            type: 1
        }
    }, (err, res, body) => {
        let id = JSON.parse(body).result.songs[0].id;
        request.get(url.format({
            host: 'http://music.163.com',
            pathname: '/api/song/lyric',
            search: querystring.stringify({
                id: id,
                lv: -1,
                kv: -1,
                tv: -1
            })
        }), (err, res, body) => {
            let lrc = JSON.parse(body).lrc.lyric;
            fs.writeFile(path.join('./', `${name}.lrc`), lrc, () => {
                console.log('下载成功')
            })
        })
    })
}

getlrc('蒋明,冬子,刘东明 - 啊朋友 再见');