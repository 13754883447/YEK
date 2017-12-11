<template>
    <section>
        <div class="sg-search">
            <img src="../../assets/img/search_03.png" alt="">
            <input type="text" placeholder="请输入您需要查找的歌曲">
        </div>
        <div class="sg-main">
            <ul class="sg-middle">
                <li class="neidi" v-for="item in lanmu" style=":background: url(item.img)">
                    <router-link :to="{name:'gequxiangqing',query:{id:item.id}}">
                        <h2 class="sg-h2">{{item.lanmu}}</h2>
                    </router-link>
                </li>
                <!--<li class="neidi">-->
                    <!--<router-link :to="{name:'gequxiangqing',query:{id:1}}">-->
                        <!--<h2 class="sg-h2">内地偶像组合</h2>-->
                    <!--</router-link>-->
                <!--</li>-->
                <!--<li class="neidi">-->
                    <!--<router-link :to="{name:'gequxiangqing',query:{id:2}}">-->
                        <!--<h2 class="sg-h2">内地男歌手</h2>-->
                    <!--</router-link>-->
                <!--</li>-->
                <!--<li class="neidi">-->
                    <!--<a href=""><h2 class="sg-h2">港台歌手</h2></a>-->
                <!--</li>-->
                <!--<li class="neidi">-->
                    <!--<a href=""><h2 class="sg-h2">日韩女歌手</h2></a>-->
                <!--</li>-->
                <!--<li class="neidi">-->
                    <!--<a href=""><h2 class="sg-h2">内地女歌手</h2></a>-->
                <!--</li>-->
                <!--<li class="neidi">-->
                    <!--<a href=""><h2 class="sg-h2">青春偶像歌手</h2></a>-->
                <!--</li>-->
            </ul>
        </div>
    </section>
</template>
<script>
    export default {
        name:'index',
        data(){
            return{
                lanmu:[]
            }
        },
        mounted(){
            fetch('/api/song_lanmu')
                .then(res=>res.json())
                .then(r=>this.lanmu=r)
        }
    }
</script>