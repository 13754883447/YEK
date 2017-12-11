<template>
    <div class="st-bg">
        <div class="st-top">
            <div class="back">
                <a href="/">
                    <img src="../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>商店</span>
            <div class="gm-you"></div>
        </div>
        <div class="st-xuanze">
            <ul class="st-choice">
                <li :class="{'active':state===v.id}" @click="setState(v.id)" v-for="v in store">
                    <span>{{v.name}}</span>
                    <span class="water">{{v.num}}</span>
                </li>
                <!--<li :class="{'active':state===2}" @click="setState(2)">-->
                <!--<span>零食</span>-->
                <!--<span class="foot">0</span>-->
                <!--</li>-->
            </ul>
        </div>
        <div class="st-main">
            <ul class="st-list" v-show="state===1">
                <li class="st-list-item" v-for="item in jiushui">
                    <div class="pic">
                        <img :src=item.img alt="">
                    </div>
                    <ul class="text">
                        <li>
                            <span class="name">{{item.name}}</span>
                            <span class="fire"></span>
                        </li>
                        <li>
                            <span class="pricebox">
                                ￥
                                <span class="price">8.6</span>
                                /
                                <span class="unit">
                                    {{item.danwei}}
                                </span>
                            </span>
                        </li>
                        <li class="xuan">
                            <span class="del" @click="del(item)"></span>
                            <span class="num">{{item.num}}</span>
                            <span class="add" @click="add(item)"></span>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="st-list" v-show="state===2">
                <li class="st-list-item" v-for="s in lingshi">
                    <div class="pic">
                        <img :src=s.img alt="">
                    </div>
                    <ul class="text">
                        <li>
                            <span class="name">{{s.name}}</span>
                            <span class="fire"></span>
                        </li>
                        <li>
                            <span class="pricebox">
                                ￥
                                <span class="price">{{s.price}}</span>
                                /
                                <span class="unit">
                                    {{s.danwei}}
                                </span>
                            </span>
                        </li>
                        <li class="xuan">
                            <span class="del" @click="del(s)"></span>
                            <span class="num">{{(s.num).toFixed(2)}}</span>
                            <span class="add" @click="add(s)"></span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <footer class="st-footer">
            <div class="st-choiced">
                <p>已选</p>
                <div class="box">
                    <nobr v-for="a in arr" :key="a.id" v-if="a.num">
                        {{a.name}}
                        <p>{{a.num}}</p>
                        {{a.danwei}}
                        <!--崂山必究-->
                        <!--<p>1</p>-->
                        <!--瓶-->
                    </nobr>
                </div>
                <div class="omit">
                    <div class="one"></div>
                    <div class="two"></div>
                    <div class="three"></div>
                </div>
            </div>
            <div class="st-result">
                <div class="st-RMB">
                    <span class="s1">合计</span>
                    <span class="s2">{{(total).toFixed(2)}}</span>
                    <span class="s3">RMB</span>
                </div>
                <button class="st-go" @click="goods()">
                    · 选好了 ·
                </button>
            </div>
        </footer>
    </div>
</template>
<script>
    export default {
        name: 'store',
        data() {
            return {
                state: 1,
                jiushui: [],
                lingshi: [],
                store: [],
                num: 0,
                arr: [],
                nobr: [],
                rmb: 0.00
            }
        },
        methods: {
            setState(state) {
                return this.state = state;
            },
            del(t) {
                if (t.num <= 0) {
                    return;
                } else {
                    t.num -= 1;
                }
            },
            add(t) {
                t.num += 1;
                var fg = true;
                if (t.storeid == 1) {
                    this.jiushui.forEach(v => {
                        if (v.id == t.id) {
                            fg = false;
                            v.num = t.num;
                        }
                    });
                } else if (t.storeid == 2) {
                    this.jiushui.forEach(v => {
                        if (v.id == t.id) {
                            fg = false;
                            v.num = t.num;
                        }
                    });
                }
                if (fg) {
                    this.jiushui.push(t);
                }
            },
            goods() {
                localStorage.jiushui = JSON.stringify(this.jiushui);
                localStorage.lingshi = JSON.stringify(this.lingshi);
                location.href = '#/shoping';
            }
        },
        computed: {
            total() {
                let s = 0;
                this.jiushui.forEach(v => {
                    s += v.price * v.num;
                });
                this.lingshi.forEach(v => {
                    s += v.price * v.num;
                });
                return s;
            }
        },
        watch: {},
        mounted() {
            fetch('/api/select_store')
                .then(res => res.json())
                .then(r => this.store = r.map(v => {
                    v.num = 0;
                    return v;
                }));
            fetch('/api/select_shop')
                .then(res => res.json())
                .then(r => this.arr = r.map(v => {
                    v.num = 0;
                    return v
                }))
                .then(r => {
                    this.jiushui = r.filter(v => v.storeid == 1);
                    this.lingshi = r.filter(v => v.storeid == 2);
                })
        }
    }
</script>