<template>
    <div class="Home-bg">
        <div class="Hm-top">
            <img src="../assets/img/dingwei_03.png" alt="">
            <div class="Hm-place">
                <span>杭州</span>
                <img src="../assets/img/index_xian_03.png" alt="">
            </div>
        </div>
        <div class="Hm-middle">
            <img src="../assets/img/zi_02.png" alt="">
        </div>
        <div class="Hm-bottom">
            <a :href="item.url" v-for="item in pindao">
                <img :src=item.img alt="">
            </a>
            <!--<a href="#/song">-->
            <!--<img src="../assets/img/index_diange.png" alt="">-->
            <!--</a>-->
            <!--<a href="#/game">-->
            <!--<img src="../assets/img/index_game.png" alt="">-->
            <!--</a>-->
            <!--<a href="#/store">-->
            <!--<img src="../assets/img/index_store.png" alt="">-->
            <!--</a>-->
            <!--<a href="#/me">-->
            <!--<img src="../assets/img/index_main.png" alt="">-->
            <!--</a>-->
        </div>
    </div>
</template>
<script>
    export default {
        name: 'Home',
        data() {
            return {
                pindao: []
            }
        },
        mounted() {
            if (!localStorage.user) {
                location.href = '#/login';
            }
            fetch('/api/select_pindao')
                .then(res => res.json())
                .then(r => this.pindao = r)
        }
    }
</script>