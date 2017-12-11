<template>
    <div class="me-bg">
        <div class="me-head">
            <a href="/" class="me-back"></a>
            <p class="me-title">
                <span></span>
                个人中心
                <span></span>
            </p>
        </div>
        <div class="me-content">
            <router-link :to="{name:'yuyue',query:{id:user.id}}" class="yuyue">预约房间</router-link>
            <div class="me-logo">
                <div class="me-write"></div>
            </div>
            <ul class="me-titles">
                <li>{{user.name}}</li>
                <li>{{user.jieshao}}</li>
                <li>{{user.taxi}}</li>
            </ul>
            <ul class="me-nums">
                <li>
                    <p class="num">25</p>
                    <p class="word">关注</p>
                    <a href="#"></a>
                </li>
                <li>
                    <p class="num">{{fans.length}}</p>
                    <p class="word">我的粉丝</p>
                    <router-link :to="{name:'fans',query:{id:user.id}}"></router-link>
                </li>
                <li>
                    <p class="num">{{orders.length}}</p>
                    <p class="word">订单</p>
                    <router-link :to="{name:'orders',query:{id:user.id}}"></router-link>
                </li>
            </ul>
            <div class="me-works">我的作品</div>
            <ul class="me-work">
                <li v-for="v in zuopin">
                    <p class="me-song-name">{{v.songname}}-{{v.geshou}}</p>
                    <p class="me-time">{{formdate(v.Time)}}</p>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'me',
        data(){
            return{
                user:JSON.parse(localStorage.user),
                fans:[],
                orders:[],
                zuopin:[]
            }
        },
        mounted(){
            fetch('/api/select_fans?guanzhuid='+this.user.id)
                .then(res=>res.json())
                .then(r=>this.fans=r);
            fetch('/api/select_orders?fangjianid='+this.user.id)
                .then(res=>res.json())
                .then(r=>this.orders=r);
            fetch('/api/select_zuopin?userid='+this.user.id)
                .then(res=>res.json())
                .then(r=>this.zuopin=r);
        },
        computed:{

        },
        methods:{
            formdate(time) {
                let date = new Date(time);
                let y = [date.getFullYear(), date.getMonth() + 1, date.getDate()].join('-');
                let t = [date.getHours(), date.getMinutes()].join(':');
                return y + ' ' + t;
            }
        }
    }
</script>