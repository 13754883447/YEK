<template>
    <div class="sg-bg">
        <div class="sg-top">
            <div class="back">
                <a @click="back">
                    <img src="../../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>已点歌曲</span>
            <div class="yidianyou">
                <a href="#">共6首</a>
            </div>
        </div>
        <div class="backimg">
            <img src="../../assets/img/sg3_02.png" alt="">
        </div>
        <div class="yidian-main">
            <ul class="yidian-middle">
                <li v-for="v in items" :key="v.id">
                    <div class="yd-shadow"></div>
                    <div class="yd-num">
                        <router-link :to="{name:'bofang',query:{id:v.id}}">
                            <img :src=v.gimg alt="">
                        </router-link>
                    </div>
                    <div class="yd-song">
                        <span class="name">{{v.name}}</span>
                        <span class="time" style="color: #cccccc;">{{v.time}}</span>
                    </div>
                    <div class="yd-add">
                        <div class="del" @click="del(v.id)"></div>
                        <div class="tops" @click="top(v.id)"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                items: JSON.parse(localStorage.lists)
            }
        },
        methods: {
            back() {
                history.back();
            },
            del(id) {
                let lists = JSON.parse(localStorage.lists);
                let remove = lists.filter(v=>v.id!=id);
                this.items=remove;
                localStorage.lists=JSON.stringify(remove);
            },
            top(id) {
                var currAr = this.items.findIndex(v=>v.id==id);
                this.items.unshift(this.items.splice(currAr,1)[0]);
                localStorage.lists = JSON.stringify(this.items)

            }
        },
        mounted() {

        }
    }
</script>
<style scoped>
    .yidianyou {
        width: .6rem;
        height: 0.24rem;
        border-radius: 0.06rem;
        margin-right: 0.12rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .yidianyou > a {
        color: #fff;
    }

    .backimg {
        position: absolute;
        top: .9rem;
        left: 0;
        width: 100%;
    }

    .backimg img {
        width: 100%;
        height: 1.98rem;
    }

    .yidian-main {
        position: absolute;
        top: .7rem;
        left: 0;
        width: 100%;
        z-index: 9;
        padding-left: 0.12rem;
        padding-right: 0.12rem;
    }
</style>