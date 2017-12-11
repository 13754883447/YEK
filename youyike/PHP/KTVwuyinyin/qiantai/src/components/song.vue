<template>
    <div class="sg-bg">
        <div class="sg-top">
            <div class="back">
                <a href="/">
                    <img src="../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>点歌</span>
            <div class="you">
                <a href="#/yidian">
                    已点歌曲
                </a>
            </div>
        </div>
        <ul class="sg-liebiao">
            <li>
                <a href="#/index">
                    <img src="../assets/img/icon_07.png" alt="">
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
                    <span class="iconfont icon-tuijian1"></span>推荐歌单
                </a>
            </li>
        </ul>
        <router-view></router-view>
    </div>
</template>