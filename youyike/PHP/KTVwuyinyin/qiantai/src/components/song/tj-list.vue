<template>
    <div class="sg-bg">
        <div class="sg-top">
            <div class="back">
                <a @click="back">
                    <img src="../../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>点歌</span>
            <div class="you">
                <a href="#/yidian">
                    已点歌曲
                </a>
            </div>
        </div>
        <div class="pp-backimg">
            <img src="../../assets/img/sg3_02.png" alt="">
        </div>
        <div class="pp-main">
            <ul class="yidian-middle">
                <li>
                    <router-link :to="{name:'bofang',query:{id:1}}">
                        <div class="yd-shadow"></div>
                        <div class="yd-num">
                            <a href="">
                                <img src="../../assets/img/zuhe0.jpg" alt="">
                            </a>
                        </div>
                        <div class="yd-song">
                            <span class="name">海空天空</span>
                            <span class="time" style="color: #cccccc;">03.40</span>
                        </div>
                        <div class="yd-add">
                            <div class="add" @click="del(1)"></div>
                            <div class="tops" @click="top(2)" style="display: none"></div>
                        </div>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{

            }
        },
        methods:{
            back(){
                history.back();
            }
        }
    }
</script>