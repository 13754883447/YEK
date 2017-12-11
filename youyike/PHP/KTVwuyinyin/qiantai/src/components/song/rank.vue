<template>
    <section>
        <div class="rank">
            <ul class="rankul">
                <li>
                    <div :class="{active:state===1}" @click="toggle(1)">月排行</div>
                </li>
                <li>
                    <div :class="{active:state===2}" @click="toggle(2)">季排行</div>
                </li>
                <li>
                    <div :class="{active:state===3}" @click="toggle(3)">年排行</div>
                </li>
            </ul>
        </div>
        <div class="rk-banner">
            <div class="swiper-container" v-show="state===1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="../../assets/img/rc1.png" alt="">
                    </div>
                </div>
            </div>
            <div class="swiper-container" v-show="state===2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="../../assets/img/rc2.png" alt="">
                    </div>
                </div>
            </div>
            <div class="swiper-container" v-show="state===3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="../../assets/img/rc1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="rk-main">
            <ul class="middle" v-show="state===1">
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
            </ul>
            <ul class="middle" v-show="state===2">
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
            </ul>
            <ul class="middle" v-show="state===3">
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
                <li>
                    <div class="num">
                        01
                    </div>
                    <div class="body">
                        <span class="name">光辉岁月</span>
                        <span class="time">03.40</span>
                    </div>
                    <div class="add">
                        <div class="jia"></div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</template>
<script>
    export default {
        data(){
          return{
              state:1
          }
        },
        methods:{
            toggle(num){
                this.state=num;
            }
        }
    }
</script>