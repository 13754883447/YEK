<template>
    <div class="fs-bg">
        <div class="fs-top">
            <div class="back">
                <a @click="back()">
                    <img src="../../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>-&nbsp;我的订单&nbsp;-</span>
            <div class="fs-you">
                <a href="#">
                    <img src="../../assets/img/add_03.png" alt="">
                </a>
            </div>
        </div>
        <section class="fs-main">
            <ul class="fs-middle">
                <li v-for="item in orders">
                    <div class="fs-imgbox">
                        <img :src=item.img alt="">
                    </div>
                    <div class="fs-song">
                        <div class="fs-people">
                            <span>{{item.name}}X</span>
                            <span>{{item.num}}</span>
                        </div>
                        <!--<span style="color: #CCCCCC">-->
                            <!--{{item.price*item.num}}-->
                        <!--</span>-->
                    </div>
                    <div class="fs-add">
                        <p>{{item.price*item.num}}RMB</p>
                    </div>
                </li>
            </ul>
        </section>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                userid:this.$route.query.id,
                orders:[]
            }
        },
        methods:{
            back(){
                history.back();
            }
        },
        mounted(){
            fetch('/api/select_orders?fangjianid='+this.userid)
                .then(res=>res.json())
                .then(r=>this.orders=r);
        }
    }
</script>