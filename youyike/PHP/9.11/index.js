// let fs = require('fs');
// fs.watchFile('./A.vue', () => {
//     fs.readFile('./A.vue', (err, result) => {
//         let s = result.toString();
//         let re = s.match(/\<template\>(.*)\<\/template\>/)[1];
//         let str = `
//                 let A=Vue.extend({
//                             template:'${re}'
//
//                 })
//         `;
//         fs.writeFile('./A.js', str, (er) => {
//             console.log('error');
//         })
//     });
// });
// let aa=require('c');