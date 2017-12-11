<template>
    <div>
        <div class="bf-body" :style="{ 'background-Image':`url(${items[i].gimg})`}">
            <img src="../../assets/img/play_bg.png" alt="" class="bf-bg1">
            <img src="../../assets/img/play_bg2.png" alt="" class="bf-bg2">
            <div class="bf-ktv">
                <input type="hidden" value="往事只能回味">
                <audio :src=items[i].url id="audio"></audio>
                <div class="bf-head">
                    <div class="more" @click="back()"></div>
                    <p>{{items[i].name}}</p>
                </div>
                <ul class="geci" ref="geciul">
                    <li v-for="(v,n) in lrc" :class="{hot:n==xiabiao}" >
                        {{v.text}}
                    </li>
                </ul>
                <ul class="buttonbox">
                    <li>
                        <a href="">
                            <img src="../../assets/img/btn1.png" alt="">
                            <span>原/伴</span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <img src="../../assets/img/btn2.png" alt="" @click="indexadd()">
                            <span>切歌</span>
                        </a>
                    </li>
                    <li class="button play">
                        <div class="a">
                            <img src="../../assets/img/btn3.png" alt="" id="play1" class="button-img" @click="play()"
                                 :class="{active:active===1}">
                            <img src="../../assets/img/btn3s.png" alt="" id="stop1" :class="{active:active===2}"
                                 class="button-img" @click="stop()">
                        </div>
                    </li>
                    <li>
                        <a href="">
                            <img src="../../assets/img/btn4.png" alt="">
                            <span>重唱</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../../assets/img/btn5.png" alt="">
                            <span>录歌</span>
                        </a>
                    </li>
                </ul>
                <div class="voice">
                    <div class="voice1">
                        <div class="micro"></div>
                        <div class="long">
                            <div class="long1"></div>
                            <div class="circle"></div>
                        </div>
                    </div>
                    <div class="voice2">
                        <div class="sound" @click="jinying()"></div>
                        <div class="longs" @click="down($event)">
                            <div class="longs1"></div>
                            <div class="circles"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                xiabiao:0,
                audio: document.querySelector("#audio"),
                index: this.$route.query.id,
                items: JSON.parse(localStorage.lists),
                active: 1,
                i: 0,
                lrc: [],
                time:0,
            }
        },
        watch:{
            time(){
                let box=this.$refs.geciul;
                let n=this.lrc.findIndex((v,i)=>{
                    if(this.time>=v.time){
                        this.xiabiao=i
                    }
                });
                box.scrollTop=this.xiabiao*24-250;
            }
        },
        computed:{

            timeindex(){
                let timeindex=0;
                this.lrc.forEach((v,i)=>{
                    if(this.time>=v.time){
                        timeindex=i;
                    }
                })
                return timeindex;
            }
        },
        components() {

        },
        methods: {
            back() {
                history.back();
            },
            stop() {
                audio.pause();
                this.active = 1;
            },
            play() {
                audio.play();
                this.active = 2;

                audio.ontimeupdate=()=>{ //audio监听
                    let audiotime=audio.currentTime;
                    this.time=audiotime*1000;
                }
            },
            jinying() {
                if (audio.volume) {
                    audio.volume = 0;
                } else {
                    audio.volume = 1;
                }
            },
            indexadd() {
                if (this.i == this.items.length - 1) {
                    this.i = 0;
                } else {
                    this.i++;
                    if(this.active==2){
                        audio.autoplay = true;
                    }
                }
                fetch(this.items[this.i].lrc)
                    .then(res=>res.text())
                    .then(r=>{
                        let t=r.split('\n');
//                        console.log(t);
                        let o=[];
                        t.forEach(v=>{
                            if(v){
                                let time=this.str(v.match(/\[(.*)\]/)[1]);
                                o.push({time:time,text:v.replace(/\[.*\]/,'')});
                            }
                        });
                        this.lrc=o;
//                        console.log(this.lrc);
                    });
            },
            down: function ($event) {
                //$event 用户的行为
                var longs = document.querySelector(".longs");//总长度
                var longs1 = document.querySelector(".longs1");//当前音量长度
                var circles = document.querySelector(".circles");//按钮
                var VOL = 1;
                let Width = $event.offsetX;
                longs1.style.width = Width / 100 + 'rem';
                circles.style.left = Width / 100 + 'rem';
                audio.volume = Width / longs1.parentElement.offsetWidth;
                circles = audio.volume;
            },
            str(string){
                let m=0;
                string.split(':').forEach((v,i)=>{
                    switch (i){
                        case 0:m+=v*60*1000; break;
                        case 1:m+=v*1000; break;
                        case 2:m+=Number(v); break;
                    }
                })
                return m;
            }
        },
        mounted() {
            this.i = this.items.findIndex(v => v.id == this.index);
            console.log(this.i)
            fetch(this.items[this.i].lrc)
                .then(res=>res.text())
                .then(r=>{
                    let t=r.split('\n');
                    let o=[];
                    t.forEach(v=>{
                        if(v){
                            let time=this.str(v.match(/\[(.*)\]/)[1]);
                            o.push({time:time,text:v.replace(/\[.*\]/,'')});
                        }
                    });
                    this.lrc=o;
                    console.log(this.lrc);
                });
        }
    }
</script>
<style scoped>
    .bf-body {
        height: 6.67rem;
        background: url(../../assets/img/zuhe0.jpg) 50%/cover;
    }

    .bf-bg1 {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4.54rem;
        opacity: 0.6;
        z-index: 0;
    }

    .bf-bg2 {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2.6rem;
        z-index: 0;
    }

    .bf-ktv {
        width: 100%;
        height: 100%;
        background-size: cover;
        padding: 0 0.12rem;
        box-sizing: border-box;
    }

    .bf-head {
        width: 100%;
        height: 0.44rem;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bf-head .more {
        width: 0.25rem;
        height: 0.25rem;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        background: url(../../assets/img/more.png) center center no-repeat/100%;
    }

    .bf-head .more a {
        display: block;
        width: 100%;
        height: 100%;
    }

    .bf-head p {
        font-size: .18rem;
        color: #fff;
        font-weight: 600;
    }

    .geci {
        position: absolute;
        width: 96%;
        height: 3.92rem;
        overflow-y: scroll;
        margin-top: .05rem;
        z-index: 10;
        overflow-x: hidden;
    }

    .geci li {
        margin: .05rem 0;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: .15rem;
        transform: scale(1, 1);
        transition: all 1s ease;
    }

    .geci li.hot {
        color: yellow;
        transform: scale(1.2, 1.2);
    }

    .buttonbox {
        position: absolute;
        top: 3.9rem;
        left: 0;
        width: 100%;
        height: 1.61rem;
        display: flex;
        /*justify-content: center;*/
        align-items: center;
        justify-content: space-around;
        box-sizing: border-box;
        padding-top: .25rem;
    }

    .buttonbox li .a {
        width: 100%;
        height: 100%;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-direction: column;
    }

    .buttonbox li a img {
        display: block;
        width: 0.44rem;
        height: 0.44rem;
        margin-bottom: .09rem;
    }

    .buttonbox li a span {
        display: block;
        color: #000;
        font-size: .11rem;
    }

    .button.play .a {
        position: relative;
    }

    .button .button-img {
        width: .55rem;
        height: .55rem;
        margin-top: -.13rem;
        display: none;
    }

    .button .button-img.active {
        display: block;
    }

    .voice {
        position: absolute;
        top: 5.55rem;
        left: 0;
        width: 100%;
        height: .72rem;
    }

    .voice .voice1 {
        width: 100%;
        height: 50%;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .voice .voice1 .micro {
        width: 0.165rem;
        height: 0.275rem;
        background: url(../../assets/img/v1.png) center center no-repeat;
        background-size: cover;
    }

    .voice .voice2 {
        width: 100%;
        height: 50%;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .voice .voice2 .sound {
        width: 0.21rem;
        height: 0.215rem;
        background: url(../../assets/img/v2.png) center center no-repeat;
        background-size: cover;
    }

    .voice .voice1 .long {
        width: 70%;
        height: 0.07rem;
        border-radius: 5px;
        background: #ddd;
        position: relative;
    }

    .voice .voice2 .longs {
        width: 70%;
        height: 0.07rem;
        border-radius: 5px;
        background: #ddd;
        position: relative;
    }

    .voice .voice1 .long .long1 {
        width: 60%;
        height: 100%;
        border-radius: 0.015rem;
        background: #FA62A5;
    }

    .voice .voice1 .long .circle {
        width: 0.15rem;
        height: 0.15rem;
        border-radius: 50%;
        position: absolute;
        top: -50%;
        left: 58%;
        background: #fff;
        box-shadow: 0.5px 0.5px 2px 1px rgba(0, 0, 0, 0.32);
    }

    .voice .voice2 .longs .longs1 {
        width: 60%;
        height: 100%;
        border-radius: 0.015rem;
        background: #FA62A5;
        position: relative;
        z-index: 9;
    }

    .voice .voice2 .longs .circles {
        width: 0.15rem;
        height: 0.15rem;
        border-radius: 50%;
        position: absolute;
        top: -50%;
        left: 58%;
        background: #fff;
        box-shadow: 0.5px 0.5px 2px 1px rgba(0, 0, 0, 0.32);
        z-index: 9;
    }
</style>
