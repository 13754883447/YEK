<template>
    <div class="fs-bg">
        <div class="fs-top">
            <div class="back">
                <a @click="back()">
                    <img src="../../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>-&nbsp;我的粉丝&nbsp;-</span>
            <div class="fs-you">
                <a href="#">
                    <img src="../../assets/img/add_03.png" alt="">
                </a>
            </div>
        </div>
        <section class="fs-main">
            <ul class="fs-middle">
                <li v-for="item in fans">
                    <div class="fs-imgbox">
                        <img :src=item.img alt="">
                    </div>
                    <div class="fs-song">
                        <div class="fs-people">
                            <span>{{item.name}}</span>
                            <img src="../../assets/img/fans_06.png" alt="">
                        </div>
                        <span style="color: #CCCCCC">
                            {{item.jianjie}}
                        </span>
                    </div>
                    <div class="fs-add">
                        <p>特别关注</p>
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
                fans:[]
            }
        },
        methods:{
            back(){
                history.back();
            }
        },
        mounted(){
            fetch('/api/select_fans?guanzhuid='+this.userid)
                .then(res=>res.json())
                .then(r=>this.fans=r);
        }
    }
</script>