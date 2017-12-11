<template>
    <section>
        <div class="bg"></div>
        <div class="gs-imgbox">
            <img :src=geshou.img alt="">
        </div>
        <div class="yingying">
            <img src="../../assets/img/sg3_02.png" alt="">
        </div>
        <div class="sg-top" style="z-index: 20">
            <div class="back">
                <a @click="back">
                    <img src="../../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>{{geshou.name}}</span>
            <div class="you"><a href="#/yidian">已点歌曲</a></div>
        </div>
        <div class="song-list-header">
            <div class="song-list-shadow"></div>
            <div class="song-list-pic">
                <img :src=geshou.img alt="">
            </div>
            <ul class="song-list-section">
                <li>{{geshou.name}}</li>
                <li>
                    <img src="../../assets/img/sgif_pic2_06.png" alt="">歌曲&nbsp;&nbsp;{{geshou.num}}
                    <img src="../../assets/img/sgif_pic2_08.png" alt="">MV&nbsp;&nbsp;24
                </li>
                <li>本月点击量49252</li>
            </ul>

        </div>
        <div class="sgls-main">
            <ul class="sgls-middle">
                <li v-for="v in songlist" :key="v.id">
                    <div class="num">01</div>
                    <div class="body">
                        <span>{{v.name}}</span>
                        <span class="time">{{v.time}}</span>
                        <audio :src=v.url></audio>
                    </div>
                    <div class="add">
                        <div class="jia"
                             @click="addbofang(v.id,v.name,v.time,v.url,v.lrc,geshou.img,geshou.name)"></div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                geshouid: this.$route.query.id,
                geshou: {},
                songlist: [],
            }
        },
        mounted() {
            fetch('/api/geshou_one?id=' + this.geshouid)
                .then(res => res.json())
                .then(r => this.geshou = r);
            fetch('/api/songlist?geshouid=' + this.geshouid)
                .then(res => res.json())
                .then(r => this.songlist = r)
        },
        methods: {
            back() {
                history.back();
            },
            addbofang(songid, songname, songtime, songurl, songlrc, geshouimg, geshouname) {

                if (localStorage.lists) {
                    let arr = JSON.parse(localStorage.lists);
                    console.log(arr);
                    let song = {
                        id: songid,
                        name: songname,
                        time: songtime,
                        url: songurl,
                        lrc: songlrc,
                        gimg: geshouimg,
                        gname: geshouname
                    };
                    arr.push(song);
                    localStorage.lists = JSON.stringify(arr);
                } else {
                    let arr = [];
                    let song = {
                        id: songid,
                        name: songname,
                        time: songtime,
                        url: songurl,
                        lrc: songlrc,
                        gimg: geshouimg,
                        gname: geshouname
                    };
                    arr.push(song);
                    localStorage.lists = JSON.stringify(arr);
                }
            },
        },
        components() {

        }
    }
</script>
<style scoped>
    .bg {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 3;
        width: 100%;
        height: 1.5rem;
        background-image: url(../../assets/img/sg3bg_01.png);
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .gs-imgbox {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        width: 100%;
        height: 2.1rem;
    }

    .gs-imgbox img {
        position: absolute;
        top: -.5rem;
        left: 0;
        width: 100%;
    }

    .yingying {
        height: 3.59rem;
        position: absolute;
        top: 1.76rem;
        left: 0;
        z-index: 5;
        width: 100%;
        /*height: 3.96rem;*/
    }

    .yingying img {
        width: 100%;
        height: 100%;
    }

    .sgls-main {
        position: absolute;
        top: 1.99rem;
        left: 0;
        width: 100%;
        z-index: 9;
        padding-left: 0.12rem;
        padding-right: 0.12rem;
        box-sizing: border-box;
        background: #fff;
        /*height: 100%;*/
        overflow-y: scroll;
    }

    .sgls-middle {
        display: -webkit-flex;
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .sgls-middle > li {
        display: flex;
        justify-content: space-between;
        width: 100%;
        height: .585rem;
        border-bottom: 1px dotted #000;
        font-size: 0.12rem;
    }

    .num {
        display: flex;
        align-items: center;
        width: 0.275rem;
        height: 100%;
        color: #F73C5F;
    }

    .body {
        text-align: left;
        width: 3rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        -webkit-box-orient: vertical;
        color: #8C93A0;
    }

    .body span:nth-child(2) {
        color: #CCCCCC;
    }

    .add {
        width: .59rem;
        height: 100%;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .add > .jia {
        width: 0.24rem;
        height: 0.24rem;
        background-image: url(../../assets/img/sgif_pic2_14.png);
        background-size: contain;
        transition: all 0.5s ease;
    }
</style>