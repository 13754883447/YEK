<template>
    <section>
        <div class="8-25">
            <input type="text" ref="input">
        </div>
        <div class="1">
            <el-row>
                <el-col :span="24"><div class="grid-content bg-purple-dark"></div></el-col>
            </el-row>
            <el-row>
                <el-col :span="12"><div class="grid-content bg-purple"></div></el-col>
                <el-col :span="12"><div class="grid-content bg-purple-light"></div></el-col>
            </el-row>
            <el-row>
                <el-col :span="8"><div class="grid-content bg-purple"></div></el-col>
                <el-col :span="8"><div class="grid-content bg-purple-light"></div></el-col>
                <el-col :span="8"><div class="grid-content bg-purple"></div></el-col>
            </el-row>
            <el-row>
                <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
                <el-col :span="6"><div class="grid-content bg-purple-light"></div></el-col>
                <el-col :span="6"><div class="grid-content bg-purple"></div></el-col>
                <el-col :span="6"><div class="grid-content bg-purple-light"></div></el-col>
            </el-row>
            <el-row>
                <el-col :span="4"><div class="grid-content bg-purple"></div></el-col>
                <el-col :span="4"><div class="grid-content bg-purple-light"></div></el-col>
                <el-col :span="4"><div class="grid-content bg-purple"></div></el-col>
                <el-col :span="4"><div class="grid-content bg-purple-light"></div></el-col>
                <el-col :span="4"><div class="grid-content bg-purple"></div></el-col>
                <el-col :span="4"><div class="grid-content bg-purple-light"></div></el-col>
            </el-row>
        </div>
        <div class="2">
            <div class="demo-color-box bg-blue-light demo-typo-box typo-PingFang" style="width:200px; height:200px">Blue<div class="name value">#58B7FF</div></div>
        </div>
        <div class="3">
            <i class="el-icon-edit"></i>
            <i class="el-icon-share"></i>
            <i class="el-icon-delete"></i>
        </div>
        <div class="4">
            <el-button type="primary">主要</el-button>
            <el-button type="primary" :disabled="true">禁用</el-button>
            <el-button :plain="false" type="success">成功按钮</el-button>
            <el-button  type="warning">警告按钮</el-button>
            <el-button :plain="true" type="danger">危险按钮</el-button>
            <el-button type="primary">上传<i class="el-icon-upload el-icon--right"></i></el-button>
            <el-button-group>
                <el-button type="primary" icon="arrow-left">上一页</el-button>
                <el-button type="primary">下一页<i class="el-icon-arrow-right el-icon--right"></i></el-button>
            </el-button-group>
            <el-button type="primary" :loading="true">加载中</el-button>
            <el-button type="primary" size="large">大型按钮</el-button>
            <el-button type="primary" size="small">大型按钮</el-button>
        </div>
        <div class="5">
            <el-radio-group v-model="radio2">
                <el-radio :label="1">备选项</el-radio>
                <el-radio :label="2" :disabled="true">备选项</el-radio>
                <el-radio :label="3">备选项</el-radio>
            </el-radio-group>
            <el-checkbox-group v-model="checkList">
                <el-checkbox label="复选框 A"></el-checkbox>
                <el-checkbox label="复选框 B"></el-checkbox>
                <el-checkbox label="复选框 C"></el-checkbox>
                <el-checkbox label="禁用" disabled></el-checkbox>
                <el-checkbox label="选中且禁用" disabled></el-checkbox>
            </el-checkbox-group>
        </div>
        <div class="6">
            <el-input v-model="input" :disabled="true" placeholder="请输入" icon="search" :on-icon-click="sousuo"></el-input>
            <el-input-number v-model="num" @change="console" :min="0" :max="10" ></el-input-number>
            <el-select v-model="value" placeholder="请选择">
                <el-option v-for="item in options" :key="item.value" :label="item.label" :value="item.value" :disabled="item.disabled"></el-option>
            </el-select>
        </div>
    </section>
</template>
<script>
    export default {
        data () {
            return {
                radio2: 1,
                checkList: ['选中且禁用','复选框 A'],
                input:'',
                num:1,
                options: [{
                    value: '选项1',
                    label: '黄金糕'
                }, {
                    value: '选项2',
                    label: '双皮奶',
                    disabled:true,
                }, {
                    value: '选项3',
                    label: '蚵仔煎'
                }, {
                    value: '选项4',
                    label: '龙须面'
                }, {
                    value: '选项5',
                    label: '北京烤鸭'
                }],
                value:''
            };
        },
        methods:{
            sousuo(){
                location.href='#/Home'
            },
            console(value){
                console.log(value)
            }
    },
        mounted(){
            this.$refs.input.focus();//自动获取焦点,ref只作用域组件内部.
        }
    }
</script>
    <style>
        .el-row {
            margin-bottom: 20px;
        }
        .el-col {
            border-radius: 4px;
        }
        .bg-purple-dark {
            background: #99a9bf;
        }
        .bg-purple {
            background: #d3dce6;
        }
        .bg-purple-light {
            background: #e5e9f2;
        }
        .grid-content {
            border-radius: 4px;
            min-height: 36px;
        }
        .row-bg {
            padding: 10px 0;
            background-color: #f9fafc;
        }
    </style>