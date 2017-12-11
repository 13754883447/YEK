<template>
    <div class="sg-bg">
        <div class="sg-top">
            <div class="back">
                <a href="/">
                    <img src="../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>游戏</span>
            <div class="gm-you"></div>
        </div>
        <div class="gm-main">
            <ul class="gm-middle">
                <li v-for="v in game">
                    <img :src=v.img alt="">
                    <p>真心话大冒险</p>
                    <router-link :to="{name:'zhenxinhua',query:{id:v.id}}"></router-link>
                    <!--<a href="#/zhenxinhua"></a>-->
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'game',
        data() {
            return {
                game: []
            }
        },
        mounted() {
            fetch('/api/select_game')
                .then(res => res.json())
                .then(r => this.game = r)
        }
    }
</script>