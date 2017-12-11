<template>
    <div class="fs-bg">
        <div class="fs-top">
            <div class="back">
                <a @click="back()">
                    <img src="../assets/img/icon_03.png" alt="">
                </a>
            </div>
            <span>-&nbsp;预约房间&nbsp;-</span>
            <div class="fs-you">
                <a href="#">
                    <img src="../assets/img/add_03.png" alt="">
                </a>
            </div>
        </div>
        <section class="fs-main">
            <ul class="fs-middle">
                <li v-for="item in room">
                    <div class="fs-imgbox">
                        {{item.number}}号房间
                        <!--<img :src=item.img alt="">-->
                    </div>
                    <div class="fs-song">
                        <div class="fs-people">
                            <span>房间大小===={{item.size}}</span>
                            <!--<img src="../assets/img/fans_06.png" alt="">-->
                        </div>
                        <span style="color: #CCCCCC">
                            {{item.jianjie}}
                        </span>
                    </div>
                    <div class="fs-add">
                        <p v-if="item.state===2">使用中</p>
                        <p v-if="item.state===1">已被预约</p>
                        <p v-if="item.state===0" @click="yuyue(item.id)">可以预约</p>
                    </div>
                </li>
            </ul>
        </section>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                userid: this.$route.query.id,
                room: []
            }
        },
        methods: {
            back() {
                history.back();
            },
            yuyue(id) {
                fetch('/api/update_room', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({id: id, useid: this.userid})
                })
                    .then(res => res.json())
                    .then(r => {
                        if (r.code === 2) {
                            location.href = '#/success?message='+r.message;
                        } else if (r.code === 4) {
                            console.log(r.message)
                        }
                    })
            }
        },
        mounted() {
            fetch('/api/select_room')
                .then(res => res.json())
                .then(r => this.room = r);
        }
    }
</script>