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
                    <el-form-item>
                        <el-button type="primary" @click="submit">
                            登录
                        </el-button>
                    </el-form-item>
                </el-form>
            </el-col>
        </el-row>
    </div>
</template>
<script>
    export default {
        name: 'denglu',
        data() {
            var validatePass = (rule, value, callback) => {
                if (value.length < 6) {
                    callback(new Error('密码不得低于6位'));
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
                    account: '13754883447',
                    pass: '123456',
                },
                rules: {
                    pass: [
                        {validator: validatePass, trigger: 'blur'}
                    ],
                    account: [
                        {validator: validateaccount, trigger: 'blur'}
                    ]
                }
            };
        },
        methods: {
            submit:function() {
                this.$refs.form.validate((valid) => {
                    if (valid) {
                        fetch('/api/check_denglu', {
                            method: 'POST',
                            headers: {'Content-Type': 'application/json'},
                            body: JSON.stringify(this.form)
                        })
                            .then(res => res.json())
                            .then(r => {
                                if (r.code === 2) {
                                    alert(r.message+r.data.id);
                                    location.href='#/Home?uid='+r.data.id;
                                } else {
                                    if (r.code === 4) {
                                        alert(r.message);
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
<!--<style>-->
    <!--.bg {-->
        <!--width: 100%;-->
        <!--height: 100%;-->
        <!--padding-top: 200px;-->
        <!--padding-bottom: 450px;-->
        <!--background: url("../assets/148148.jpg") no-repeat;-->
        <!--background-size: 100% 100%;-->
    <!--}-->
<!--</style>-->