<template>
    <div class="sg-bg">
        <div class="sp-top">
            <div class="back">
                <a @click="back">
                    <img src="../../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>-&nbsp;{{fangjian}}房间已选择商品&nbsp;-</span>
            <div class="gm-you"></div>
        </div>
        <div class="sp-number">
            共
            <span>4</span>
            件
        </div>
        <section class="sp-main">
            <ul class="sp-content">
                <li v-for="l in lists">
                    <div class="pic">
                        <img :src=l.img alt="">
                    </div>
                    <ul class="text">
                        <li class="sp-cname">
                            {{l.name}}
                        </li>
                        <!--<li class="sp-cml">350ml</li>-->
                        <li class="sp-cnum-rmb">
                            <div class="sp-num-left">
                                <span class="sp-minus" @click="del(l)"></span>
                                <span class="sp-num">{{l.num}}</span>
                                <span class="sp-add" @click="add(l)"></span>
                            </div>
                            <div class="sp-price">{{(l.price * l.num).toFixed(2)}}</div>
                            <div class="sp-pic"></div>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sp-total">
                <div class="sp-total-left"></div>
                <div class="sp-total-division"></div>
                <div class="sp-total-right">
                    <div class="sp-sum">
                        <p>总价</p>
                        <p>RMB</p>
                    </div>
                    <div class="sp-prices">{{(total).toFixed(2)}}</div>
                </div>
            </div>
            <button class="confirm" @click="submit(lists)">
                确认提交
            </button>
        </section>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                fangjian: localStorage.user.name,
                jiushui: JSON.parse(localStorage.jiushui),
                lingshi: JSON.parse(localStorage.lingshi)
            }
        },
        methods: {
            back() {
                history.back();
            },
            del(t) {
                if (t.num <= 0) {
                    return
                } else {
                    t.num -= 1;
                }
                console.log(t)
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
            },
            submit(l) {
                l.forEach(v => {
                    fetch('/api/submit', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(v, v.fangjian = this.fangjian)
                    })
                        .then(res => res.json())
                        .then(r => {
                            if (r.code === 2) {
                                location.href = '#/success?message='+r.message;
//                                let j=localStorage.jiushui;
//                                let s=localStorage.lingshi;
                                localStorage.removeItem(j)
//                                localStorage.clear(this.lingshi);
                            }
                        })
                })
            }
        },
        computed: {
            lists() {
                let lists = [];
                let l = this.jiushui.filter(v => v.num != 0);
                let s = this.lingshi.filter(v => v.num != 0);
                for (var b in s) {
                    lists.push(s[b]);
                }
                for (var i in l) {
                    lists.push(l[i]);
                }
                return lists;
            },
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
        }
    }
</script>