<template>
    <div>
        <admin>
            <el-tabs type="border-card" @tab-click="get" >
                <el-tab-pane label="店铺信息" >
                    <el-form ref="form" :model="form" label-width="80px">
                        <el-form-item label="店铺名称">
                            <el-input v-model="form.name"></el-input>
                        </el-form-item>
                        <el-form-item label="配送方式" prop="type">
                            <el-select v-model="form.type" placeholder="请选择配送方式">
                                <el-option label="蜂鸟配送" value="shanghai"></el-option>
                                <el-option label="小区配送" value="beijing"></el-option>
                            </el-select>
                        </el-form-item>
                        <el-form-item label="配送时间">
                            <el-col :span="8">
                                <el-time-picker type="fixed-time" placeholder="选择时间" v-model="form.time"  style="width: 100%;"></el-time-picker>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="即时配送">
                            <el-switch on-text="" off-text="" v-model="form.delivery"></el-switch>
                        </el-form-item>
                        <el-form-item label="配送费">
                            <template>
                                <el-input-number v-model="form.num1" :min="1"></el-input-number>
                            </template>
                        </el-form-item>
                        <el-form-item label="起送费">
                            <template>
                                <el-input-number v-model="form.num2" :min="1"></el-input-number>
                            </template>
                        </el-form-item>
                        <el-form-item label="公告">
                            <el-input   v-model="form.desc"></el-input>
                        </el-form-item>
                        <el-form-item label="活动">
                            <el-input  v-model="form.activity"></el-input>
                        </el-form-item>
                        <el-form-item label="商家地址">
                            <el-input  v-model="form.pos"></el-input>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="primary" @click="onSubmit">修改信息</el-button>
                        </el-form-item>
                    </el-form>
                </el-tab-pane>


                <el-tab-pane label="管理商品">
                    <el-tabs v-model="editableTabsValue" type="card" editable @edit="handleTabsEdit">
                        <el-tab-pane
                                :key="item.name"
                                v-for="(item, index) in editableTabs"
                                :label="item.title"
                                :name="item.name"
                        >
                            <el-table
                                    :data="tableData"
                                    style="width: 100%">
                                <el-table-column
                                        prop="date"
                                        label="日期"
                                        width="180">
                                </el-table-column>
                                <el-table-column
                                        prop="name"
                                        label="姓名"
                                        width="180">
                                </el-table-column>
                                <el-table-column
                                        prop="address"
                                        label="地址">
                                </el-table-column>
                            </el-table>
                        </el-tab-pane>
                    </el-tabs>
                </el-tab-pane>
            </el-tabs>
        </admin>
    </div>
</template>
<script>
    import admin from  './admin.vue'
    export default{
        name:'store',
        components:{admin},
        data(){
            return {
                uid:this.$route.query.uid,
                active:'info',
                form: {
                    name: '',
                    time: '',
                    delivery: false,
                    type: '',
                    activity: '',
                    desc: '',
                    pos: '',
                    num1: 1,
                    num2: 1,
                },
                title1:[],
                sid:'',
                editableTabsValue: '2',
                editableTabs: [{
                    title: 'aa',
                    name: '1',
                    content: ''
                }, {
                    title: 'bb',
                    name: '2',
                    content: ''
                }],

                tabIndex: 2,

                tableData: [{
                    date: '2016-05-02',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, {
                    date: '2016-05-04',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1517 弄'
                }, {
                    date: '2016-05-01',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1519 弄'
                }, {
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1516 弄'
                }]
            }
        },
        mounted(){
            fetch('/api/get_user_store_info?uid='+this.uid)
                .then(res=>res.json())
                .then(data=>{
                    this.form=data;
                })
        },
        methods: {
            get:function () {
                fetch('/api/get_id',{
                    method:'POST',
                    headers:{'Content-Type':'application/json'},
                    body:JSON.stringify({uid:this.uid}),
                })
                    .then(res=>res.json())
                    .then(data=>{
                        let m=data.forEach(function (value,index) {
                            console.log( value.name);
                        });
                        this.title1.push(m);
                    })
            },
            onSubmit: function () {
                this.form.uid=this.uid;
                fetch('/api/update_store',{
                    method:'POST',
                    headers:{'Content-Type':'application/json'},
                    body:JSON.stringify(this.form),
                })
                    .then(res=>res.json())
                    .then(data=>{
                        if(data.code==2){
                            this.$message({
                                message:'信息更改成功',
                                duration:'500',
                                type:'success',
                            })
                        }
                    })
            },
            handleTabsEdit(targetName, action) {
                if (action === 'add') {
                    let newTabName = ++this.tabIndex + '';
                    this.editableTabs.push({
                        title: 'New Tab',
                        name: newTabName,
                        content: 'New Tab content'
                    });
                    this.editableTabsValue = newTabName;
                }
                if (action === 'remove') {
                    let tabs = this.editableTabs;
                    let activeName = this.editableTabsValue;
                    if (activeName === targetName) {
                        tabs.forEach((tab, index) => {
                            if (tab.name === targetName) {
                                let nextTab = tabs[index + 1] || tabs[index - 1];
                                if (nextTab) {
                                    activeName = nextTab.name;
                                }
                            }
                        });
                    }

                    this.editableTabsValue = activeName;
                    this.editableTabs = tabs.filter(tab => tab.name !== targetName);
                }
            }

        }

    }
</script>
<style></style>
