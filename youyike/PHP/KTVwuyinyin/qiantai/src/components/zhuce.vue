<template>
    <div class="Home-bg">
        <form v-model="form" ref="form">
            <input type="text" v-model="form.user" class="longininput" placeholder="请输入您的账号">
            <input type="password" v-model="form.pass" class="longinpass" placeholder="请输入您的密码">
            <!--<input type="file">-->
            <button @click.prevent="submit" class="loginbutton">提交</button>
        </form>
        <div v-model="tishi" class="logintishi">{{tishi}}</div>
    </div>
</template>
<script>
    export default {
        name: 'zhuce',
        data() {
            return {
                form: {
                    user: '',
                    pass: '',
//                    img:''
                },
                tishi: ''
            }
        },
        methods: {
            submit() {
                if (this.form.user&&this.form.pass) {
                    fetch('/api/insert_user', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(this.form)
                    })
                        .then(res => res.json())
                        .then(r => {
                            if (r.code === 4) {
                                console.log(this.tishi);
                                this.tishi = r.message;
                            } else{
                                localStorage.user=JSON.stringify(r);
                                location.href = '/'
                            }
                        })
                }
            }
        },
        mounted() {

        }
    }
</script>
<style>
    .longininput {
        border: none;
        height: .3rem;
        text-align: center;
        background: rgba(177, 7, 60, 0.5);
        position: absolute;
        color: #fff;
        top: 2.8rem;
        left: 1rem;
    }
    .longinpass {
        border: none;
        height: .3rem;
        text-align: center;
        background: rgba(177, 7, 60, 0.5);
        position: absolute;
        color: #fff;
        top: 3.5rem;
        left: 1rem;
    }
    .loginbutton {
        border: none;
        /*height: .2rem;*/
        text-align: center;
        /*background: rgba(3, 252, 255, 0.5);*/
        background: none;
        position: absolute;
        top: 60%;
        left: 1.5rem;
        color: #0fe6f5;
        font-size: .24rem;
    }

    .logintishi {
        font-size: .24rem;
        position: absolute;
        top: 2rem;
        left: 1rem;
        text-align: center;
        color: #fff;
    }
</style>