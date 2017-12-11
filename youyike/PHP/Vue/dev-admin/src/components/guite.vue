<template>
    <div>
        <section class="top">
            <el-steps :space="150" :active="active" center>
                <el-step title="创建店铺"></el-step>
                <el-step title="上传营业执照"></el-step>
                <el-step title="审核"></el-step>
            </el-steps>
        </section>
        <section class="section">
            <div v-show="active===1">
                <el-row type="flex" justify="center" align="middle" class="row">
                    <el-col :span="9" class="col">
                        <el-form :model="form1" :rules="rules1" ref="form1" label-width="100px" class="row" type="flex">
                            <el-form-item label="店铺名称" required prop="name">
                                <el-input type="text" v-model="form1.name"></el-input>
                            </el-form-item>
                            <el-form-item label="店铺Logo：" prop="logo">
                                <el-upload class="upload-demo" action="https://jsonplaceholder.typicode.com/posts/"
                                           list-type="picture">
                                    <el-button size="small" type="primary">点击上传</el-button>
                                    <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
                                </el-upload>
                            </el-form-item>
                            <el-form-item label="配送方式：" required prop="yun">
                                <el-select v-model="form1.yun" placeholder="请选择">
                                    <el-option v-for="item in options" :key="item.value" :label="item.label"
                                               :value="item.value"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="配送费" prop="fei">
                                <el-input-number v-model="form1.fei" :min="0" :max="10"></el-input-number>
                            </el-form-item>
                            <el-form-item label="公告" prop="gonggao">
                                <el-input type="text" :model="form1.gonggao"></el-input>
                            </el-form-item>
                            <el-form-item label="优惠" prop="youhui">
                                <el-input type="text" :model="form1.youhui"></el-input>
                            </el-form-item>
                            <el-form-item label="起送" prop="qison">
                                <el-input-number v-model="form1.qison" :min="0" :max="50"></el-input-number>
                            </el-form-item>
                            <el-form-item label="地址" required prop="dizhi">
                                <el-input type="text" v-model="form1.dizhi"></el-input>
                            </el-form-item>
                            <el-form-item label="营业时间" prop="yingyeshijian">
                                <el-input v-model="form1.yingyeshijian"></el-input>
                                <!--<el-col :span="11">-->
                                <!--<el-time-picker type="fixed-time" placeholder="选择时间" v-model="form1.yingyeshijian1" style="width: 100%;"></el-time-picker>-->
                                <!--</el-col>-->
                                <!--<el-col class="line" :span="2">-</el-col>-->
                                <!--<el-col :span="11">-->
                                <!--<el-time-picker type="fixed-time" placeholder="选择时间" v-model="form1.yingyeshijian2" style="width: 100%;"></el-time-picker>-->
                                <!--</el-col>-->
                            </el-form-item>
                            <el-form-item label="商标" required prop="shangbiao">
                                <el-input type="text" v-model="form1.shangbiao"></el-input>
                            </el-form-item>
                        </el-form>
                    </el-col>
                </el-row>
            </div>
            <div v-show="active===2">
                <el-form :model="form2" :rules="rules2" ref="form2" label-width="100px" class="row" type="flex">
                    <el-upload class="avatar-uploader"
                               action="https://jsonplaceholder.typicode.com/posts/"
                               :show-file-list="false"
                               :on-success="handleAvatarSuccess"
                               :before-upload="beforeAvatarUpload" required prop="shangbiao">
                        <img v-if="imageUrl" :src="imageUrl" class="avatar">
                        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                    </el-upload>
                </el-form>
            </div>
            <div v-show="active===3">
                <div v-if="active">审核中</div>
                <el-button type="primary" @click="submit">
                    审核完成，到店铺管理页面
                </el-button>
            </div>
        </section>
        <section>
            <el-button type="primary" class="button-mg" @click="last" v-if="active!==1">
                上一步
            </el-button>
            <el-button type="primary" class="button-mg" @click="next" v-if="active!==3">
                下一步
            </el-button>
            <!--<el-button type="primary" class="button-mg" @click="submit" v-if="active===2">-->
            <!--提交-->
            <!--</el-button>-->
        </section>
    </div>
</template>
<script>
    export default {
        data() {
            let validatename = (rule, value, callback) => {
                if (value.length < 4) {
                    callback(new Error('店铺名称不得少于4位'));
                } else {
                    callback();
                }
            };
            let validatedizhi = (rule, value, callback) => {
                if (value.length < 8) {
                    callback(new Error('地址请详细填写，不得低于8个长度'));
                } else {
                    callback();
                }
            };
//            let validatelogo = (rule,value,callback)=>{
//                if (value.length == '') {
//                    callback(new Error('请上传店铺logo'));
//                } else {
//                    callback();
//                }
//            };
            let validateyun = (rule, value, callback) => {
                if (value == '') {
                    callback(new Error('请选择运送方式'));
                } else {
                    callback();
                }
            };
            let validateshangbiao = (rule, value, callback) => {
                if (value == '') {
                    callback(new Error('请填写商标！'));
                } else {
                    callback();
                }
            };
            return {
                active: 1,
                fileList: {name: '', url: ''},
                options: [
                    {id: 1, value: '蜂鸟配送', label: '蜂鸟配送'},
                    {id: 2, value: '自己配送', label: '自己配送'}
                ],
                shenhe: false,
                imageUrl: '',
                form1: {
                    name: '',
                    logo: '',
                    yun: '',
                    fei: 0,
                    qison: 0,
                    gonggao: '',
                    youhui: '',
                    dizhi: '',
//                    yingyeshijian1:'',
//                    yingyeshijian2:'',
//                    yingyeshijian: this.yingyeshijian1-this.yingyeshijian2,
                    yingyeshijian: '',
                    shangbiao: ''
                },
                rules1: {
                    name: [
                        {validator: validatename, trigger: 'change'}
                    ],
                    dizhi: [
                        {validator: validatedizhi, trigger: 'change'}
                    ],
//                    logo:[
//                        {validator:validatelogo,trigger:'change'}
//                    ],
                    yun: [
                        {validator: validateyun, trigger: 'change'}
                    ],
                    shangbiao: [
                        {validator: validateshangbiao, trigger: 'change'}
                    ]
                },
                form2: {
                    shangbiao: this.imageUrl,
                },
                rules2: {}
            };
        },
        methods: {
            next() {
                this.$refs.form1.validate((valid) => {
                    if (valid) {
                        let i = this.active;
                        this.active = i + 1 > 3 ? i : i + 1;
                    }
                })
//                this.$refs.form2.validate((valid) => {
//                    if(valid){
//                        let i = this.active;
//                        this.active = i + 1 > 3 ? i : i + 1;
//                    }
//                })
            },
            last() {
                let i = this.active;
                this.active = i - 1 < 1 ? i : i - 1;
            },
            handleAvatarSuccess(res, file) {
                this.imageUrl = URL.createObjectURL(file.raw);
            },
            beforeAvatarUpload(file) {
                const isJPG = file.type === 'image/jpeg';
                const isLt2M = file.size / 1024 / 1024 < 2;

                if (!isJPG) {
                    this.$message.error('上传头像图片只能是 JPG 格式!');
                }
                if (!isLt2M) {
                    this.$message.error('上传头像图片大小不能超过 2MB!');
                }
                return isJPG && isLt2M;
            },
            submit() {
                let uid = this.$route.query.uid;
                fetch('/api/post_dianpu', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(this.form1, this.form1.uid = uid, this.form1.yingyezhizhao = '')
                })
                    .then(res => res.json())
                    .then(r => {
                        if (r.code === 2) {
                            alert(r.message);
                            location.href = '#/admin?uid=' + this.$route.query.uid;
                        } else {
                            if (r.code === 4) {
                                alert(r.message);
                            }
                        }
                    });
//                fetch('/api/post_shangbiao', {
//                    method: 'POST',
//                    headers: {'Content-Type': 'application/json'},
//                    body: JSON.stringify(this.form2.shangiao=this.imageUrl,this.form2.uid = uid)
//                })
//                    .then(res => res.json())
//                    .then(r => {
//                        if (r.code === 2) {
//                            alert(r.message + r.data.uid);
//                        } else {
//                            if (r.code === 4) {
//                                alert(r.message);
//                            }
//                        }
//                    })
            }
        }
    }
</script>
<style>
    .top {
        padding: 20px;
    }

    .section {
        width: 80%;
        min-height: 600px;
        margin: auto;
        box-shadow: 0 2px 0 4px #CCCCCC;
        padding: 20px 0;
    }

    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .avatar-uploader .el-upload:hover {
        border-color: #20a0ff;
    }

    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 178px;
        height: 178px;
        line-height: 178px;
        text-align: center;
    }

    .avatar {
        width: 178px;
        height: 178px;
        display: block;
    }

    .button-mg {
        margin-top: 30px;
    }
</style>