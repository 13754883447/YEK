<template>
    <div>
        <template>
            <div class="sg-bg">
                <div class="sg-top">
                    <div class="back">
                        <a href="/">
                            <img src="../../assets/img/icon_03.png" alt="">
                        </a>
                    </div>
                    <span v-show="state===1">真心话</span>
                    <span v-show="state===2">大冒险</span>
                    <div class="you" style="border: 0.02rem solid #ccc;"><a href="" style="color: #ccc;">换一批</a></div>
                </div>
                <div class="gm-main">
                    <ul class="gm-middle" v-show="state===1">
                        <li class="zxh-li" v-for="(z,id,index) in zhenxinhua" @click="active(z.name,id)">
                            <p>{{z.name}}</p>
                        </li>
                    </ul>
                    <ul class="gm-middle" v-show="state===2">
                        <li class="zxh-li" v-for="(z,id,index) in damaoxian" @click="active(z.name,id)">
                            <p>{{z.name}}</p>
                        </li>
                    </ul>
                </div>
                <div class="zxh-mask " id="active"><!--active-->
                    <div class="zxh-require">
                        <div class="zxh-title">
                            <h2>真心话</h2>
                            <p>The truth of your heart</p>
                        </div>
                        <div class="zxh-wen">
                            <p>{{activename}}</p>
                        </div>
                        <a class="zxh-once" @click="close()">再来一次</a>
                        <div class="zxh-close">
                            <a @click="close()">
                                <img src="../../assets/img/zxh-close.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="zxh-careful">
                    <div class="item">
                        <h1>注意事项</h1>
                        <h2>
                            <p>MATTERS NEDING</p>
                            &nbsp; ATTENTION
                        </h2>
                    </div>
                    <div class="box"></div>
                    <div class="text">
                        <p>1.先选真心话还是大冒险；</p>
                        <p>2.再次从上方九宫格中选取一个点击打开，如果选中的无法实现，有一次机会重新选择。</p>
                    </div>
                </div>
                <div class="zxh-footer">
                    <div class="true" :class="{active:state===1}" @click="toggle(1)">真心话</div>
                    <div class="risk" :class="{active:state===2}" @click="toggle(2)">大冒险</div>
                </div>
            </div>
        </template>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                state: 1,
                zhenxinhua: [],
                damaoxian: [],
                activename: ''
            }
        },
        methods: {
            toggle(num) {
                this.state = num;
            },
            active(name,id){
                let active=document.querySelector('#active');
                let li=document.querySelectorAll('.zxh-li');
                li[id].classList.add('active');
                this.activename=name;
                active.classList.add('active');
            },
            close(){
                let active=document.querySelector('#active');
                active.classList.remove('active');
            }
        },
        mounted() {
            fetch('/api/zhenxinhua?gameid=' + 1)
                .then(res => res.json())
                .then(r => this.zhenxinhua = r);
            fetch('/api/zhenxinhua?gameid=' + 2)
                .then(res => res.json())
                .then(r => this.damaoxian = r)
        }
    }
</script>
<style scoped>
    .zxh-li {
        width: 1.05rem;
        height: 1.05rem;
        background-image: url(../../assets/img/question_03.png);
        background-size: contain;
        margin: 0.05rem;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 0.12rem;
        overflow: hidden;
        z-index: 10;
    }

    .zxh-li.active {
        background: #FE318E;
    }

    .zxh-li p {
        z-index: 0;
        font-size: 0.01rem;
        display: none;
    }

    .zxh-mask {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 13;
        background: rgba(0, 0, 0, 0.5);
        transition: all 0.5s ease;
        transform: scale(0, 0);
    }

    .zxh-mask.active {
        transform: scale(1, 1);
    }

    .zxh-mask .zxh-require {
        position: absolute;
        top: 1rem;
        left: 0;
        width: 100%;
        height: 3.5rem;
        background: url(../../assets/img/zxh-background.png);
        background-size: cover;
    }

    .zxh-mask .zxh-require .zxh-title {
        position: absolute;
        top: 1rem;
        left: 0;
        width: 100%;
        color: #FF3158;
        font-size: 0.13rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .zxh-mask .zxh-require .zxh-title h2 {
        width: 100%;
        text-align: center;
    }

    .zxh-mask .zxh-require .zxh-title p {
        width: 100%;
        text-align: center;
    }

    .zxh-mask .zxh-require .zxh-wen {
        position: absolute;
        top: 1.75rem;
        left: 0;
        font-size: 0.13rem;
        padding-left: 1.25rem;
        padding-right: 1.15rem;
        transform: rotate(5deg);
    }

    .zxh-mask .zxh-require .zxh-wen {
        text-align: center;
        color: #fff;
    }

    .zxh-mask .zxh-require .zxh-once {
        display: block;
        position: absolute;
        top: 2.85rem;
        left: 0;
        width: 1.71rem;
        height: 0.35rem;
        font-size: 0.18rem;
        text-align: center;
        line-height: 0.35rem;
        color: #fff;
        background: url(../../assets/img/zxh-button.png);
        background-size: contain;
        background-repeat: no-repeat;
        margin-left: 1rem;
        margin-right: 1rem;
    }

    .zxh-mask .zxh-require .zxh-close {
        position: absolute;
        top: 3.3rem;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 0.33rem;
    }

    .zxh-mask .zxh-require .zxh-close a {
        width: 0.33rem;
        height: 0.33rem;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }

    .zxh-mask .zxh-require .zxh-close a img {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 0.33rem;
        height: 0.33rem;
    }

    .zxh-careful {
        text-align: left;
        position: absolute;
        top: 4.7rem;
        left: 0;
        width: 100%;
        padding: 0 0.12rem 0 0.12rem;
        background: #fff;
        font-size: 0.12rem;
    }

    .zxh-careful .item {
        color: #FE3691;
    }

    .zxh-careful .item h1 {
        font-size: .15rem;
    }

    .zxh-careful .item h2 {
        font-size: 0.15rem;
        display: flex;
        /*justify-content: center;*/
        align-items: center;
        justify-content: flex-start;
    }

    .zxh-careful .item h2 p {
        color: #8C8C91;
        font-weight: normal;
    }

    .zxh-footer {
        position: absolute;
        top: 5.9rem;
        left: 0;
        width: 100%;
        height: 0.35rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .zxh-footer div {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 1.71rem;
        height: 100%;
        margin: 0 0.05rem 0 0.05rem;
        background: #FE318E;
        border: 0.01rem solid #FE318E;
        border-radius: 0.1rem;
        font-size: 0.15rem;
        color: #fff;
    }

    .zxh-footer div.active {
        background: #fff;
        color: #FE318E;
    }
</style>