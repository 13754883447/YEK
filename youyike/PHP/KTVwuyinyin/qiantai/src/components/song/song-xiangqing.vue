<template>
    <div class="sg-bg">
        <div class="sg-top">
            <div class="back">
                <a href="/">
                    <img src="../../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>歌手</span>
            <div class="you">
                <a href="/yidian">
                    已点歌曲
                </a>
            </div>
        </div>
        <ul class="sg-liebiao">
            <li>
                <a href="#">
                    <img src="../../assets/img/icon_07.png" alt="">
                    歌手
                </a>
            </li>
            <li>
                <a href="#/rank">
                    <span class="iconfont icon-paihang"></span>排行
                </a>
            </li>
            <li>
                <a href="#/popular">
                    <span class="iconfont icon-changgui"></span>常唱
                </a>
            </li>
            <li>
                <a href="#/recommend">
                    <span class="iconfont icon-tuijian1"></span>推荐
                </a>
            </li>
        </ul>
        <div class="sg-search">
            <img src="../../assets/img/search_03.png" alt="">
            <input type="text" placeholder="请输入您需要查找的歌曲">
        </div>
        <div class="sg-main">
            <ul class="sgxq-middle">
                <li v-for="item in geshou">
                    <router-link :to="{name:'gequlist',query:{id:item.id}}">
                        <div class="bg" :style="{'background-image':`url(${item.img})`}"></div>
                    </router-link>
                    <h3>{{item.name}}{{item.num}}</h3>
                </li>
                <!--<li>-->
                    <!--<router-link :to="{name:'gequlist',query:{id:1}}">-->
                        <!--<div class="bg"></div>-->
                    <!--</router-link>-->
                    <!--<h3>好妹妹乐队{{382}}</h3>-->
                <!--</li>-->
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                lanmuid:this.$route.query.id,
                geshou:[]
            }
        },
        mounted(){
            fetch('/api/geshou?lanmuid='+this.lanmuid)
                .then(res=>res.json())
                .then(r=>this.geshou=r)
        }
    }
</script>
<style scoped>
    .sgxq-middle{
        display: -webkit-flex;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        width: 100%;
        padding-top: 0.01rem;
    }
    .sgxq-middle li{
        width: 1.05rem;
        height: 1.76rem;
    }
    .sgxq-middle li a{
        width: 1.05rem;
        height: 1.47rem;
        display: block;
    }
    .sgxq-middle li a .bg{
        width: 1.05rem;
        height: 1.47rem;
        background: url(../../assets/img/zuhe0.jpg) 50%/cover;
    }
    h3{
        height: 0.29rem;
        text-align: left;
        line-height: 0.29rem;
        font-size: .12rem;
    }
</style>