<template>
    <div class="bg">
        <el-row type="flex" justify="center" align="middle" class="row">
            <el-col :span="9" class="col">
                <el-form :model="form" :rules="rules" ref="form" label-width="100px" class="row" type="flex">
                    <el-form-item label="手机号" required prop="account">
                        <el-input type="text" v-model="form.account"></el-input>
                    </el-form-item>
                    <el-form-item label="密码" required prop="pass">
                        <el-input type="password" v-model="form.pass"></el-input>
                    </el-form-item>
                    <el-form-item label="确认密码" required prop="checkPass">
                        <el-input type="password" v-model="form.checkPass"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="submit">
                            注册
                        </el-button>
                        <router-link :to="{name:'denglu'}">
                            <el-button type="primary">已有账号去登陆</el-button>
                        </router-link>
                    </el-form-item>
                </el-form>
            </el-col>
        </el-row>
    </div>
</template>
<script>
    export default {
        name: 'Login',
        data() {
            var validatePass = (rule, value, callback) => {
                if (value.length < 6) {
                    callback(new Error('密码不得低于6位'));
                } else {
                    if (this.form.checkPass !== '') {
                        this.$refs.form.validateField('checkPass');
                    }
                    callback();
                }
            };
            var validatePass2 = (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('请再次输入密码'));
                } else if (value !== this.form.pass) {
                    callback(new Error('两次输入密码不一致!'));
                } else {
                    callback();
                }
            };
            var validateaccount = (rule, value, callback) => {
                var reg = /^\d{11}$/;
                if (reg.test(value)) {
                    callback();
                } else {
                    callback(new Error('不是合法的手机号'));
                }
            };
            return {
                form: {
                    account: '',
                    pass: '',
                    checkPass: ''
                },
                rules: {
                    pass: [
                        {validator: validatePass, trigger: 'blur'}
                    ],
                    checkPass: [
                        {validator: validatePass2, trigger: 'blur'}
                    ],
                    account: [
                        {validator: validateaccount, trigger: 'blur'}
                    ]
                }
            };
        },
        methods: {
            submit() {
                this.$refs.form.validate((valid) => {
                    if (valid) {
                        fetch('/api/post_Login', {
                            method: 'POST',
                            headers: {'Content-Type': 'application/json'},
                            body: JSON.stringify({account: this.form.account, pass: this.form.pass})
                        })
                            .then(res => res.json())
                            .then(data => {
                                if (data.code === 2) {
                                    alert(data.message);
                                    location.href = '#/denglu'
                                } else {
                                    if (data.code === 4) {
                                        alert(data.message)
                                    }
                                }
                            });
                    } else {
                        return false;
                    }
                })
            },
            open($message) {
                this.message($message);
            }
        }
    }
</script>
<style>
    .bg {
        width: 100%;
        height: 100%;
        padding-top: 200px;
        padding-bottom: 390px;
        background: url("../assets/148148.jpg") no-repeat;
        background-size: 100% 100%;
    }
</style>