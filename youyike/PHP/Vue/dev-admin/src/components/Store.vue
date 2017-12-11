<template>
    <div>
        <admin>
            <el-tabs type="border-card" class="ul100">
                <el-tab-pane label="店铺信息">
                    <div class="dianpuxinxi">店铺名称：{{dianpu.name}}</div>
                    <div class="dianpuxinxi">店铺logo：{{dianpu.logo}}</div>
                    <div class="dianpuxinxi">运送方式：{{dianpu.yun}}</div>
                    <div class="dianpuxinxi">配送费：{{dianpu.fei}}</div>
                    <div class="dianpuxinxi">店铺公告：{{dianpu.gonggao}}</div>
                    <div class="dianpuxinxi">店铺优惠：{{dianpu.youhui}}</div>
                    <div class="dianpuxinxi">起送价：{{dianpu.qison}}</div>
                    <div class="dianpuxinxi">店铺活动：{{dianpu.huodong}}</div>
                    <div class="dianpuxinxi">店铺地址：{{dianpu.dizhi}}</div>
                    <div class="dianpuxinxi">营业时间：{{dianpu.yingyeshijian}}</div>
                    <div class="dianpuxinxi">营业执照：{{dianpu.yingyezhizhao}}</div>
                    <div class="dianpuxinxi">店铺商标：{{dianpu.shangbiao}}</div>
                </el-tab-pane>
                <el-tab-pane label="店铺信息更改">
                    <el-form :ref="form" :model="form" class="row" type="flex">
                        <el-form-item label="店铺名称">
                            <el-col :span="8">
                                <el-input v-model="form.name"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="店铺logo">
                            <el-col :span="8">
                                <el-input v-model="form.logo"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="运送方式">
                            <el-col :span="8">
                                <el-input v-model="form.yun"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="运送费">
                            <el-col :span="8">
                                <el-input v-model="form.fei"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="店铺公告">
                            <el-col :span="8">
                                <el-input v-model="form.gonggao"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="店铺优惠">
                            <el-col :span="8">
                                <el-input v-model="form.youhui"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="起送价">
                            <el-col :span="8">
                                <el-input v-model="form.qison"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="店铺活动">
                            <el-col :span="8">
                                <el-input v-model="form.huodong"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="店铺地址">
                            <el-col :span="8">
                                <el-input v-model="form.dizhi"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="营业时间">
                            <el-col :span="8">
                                <el-input v-model="form.yinyeshijian"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="商标">
                            <el-col :span="8">
                                <el-input v-model="form.shangbiao"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-form-item label="营业执照">
                            <el-col :span="8">
                                <el-input v-model="form.yinyezhizhao"></el-input>
                            </el-col>
                        </el-form-item>
                        <el-button type="primary" @click="update">提交</el-button>
                    </el-form>
                </el-tab-pane>
                <el-tab-pane label="管理商品">
                    <el-tabs v-model="value" type="card" editable @edit="handleTabsEdit" :plain="true">
                        <el-tab-pane v-for="(v,i) in  goods" :name="v.g_name" :label="v.g_name" :key="v.id">
                            <el-table style="width:100%" :data="filterData(v.g_id)">
                                <el-table-column prop="c_id" label="ID">
                                </el-table-column>
                                <el-table-column prop="c_name" label="商品名">
                                </el-table-column>
                                <el-table-column prop="c_img" label="商品图片">
                                </el-table-column>
                                <el-table-column prop="c_sale" label="商品月售">
                                </el-table-column>
                                <el-table-column prop="c_pin" label="商品好评率">
                                </el-table-column>
                                <el-table-column prop="c_price" label="商品价格">
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
    import admin from './admin.vue'

    export default {
        name: 'store',
        components: {admin},
        data() {
            return {
                dianpu: {},
                goods: [],
                categories: [],
                value: '2',
                tabIndex: '2',
                form: {
                    name: '',
                    logo: '',
                    yun: '',
                    fei: '',
                    gonggao: '',
                    youhui: '',
                    qison: '',
                    huodong: '',
                    dizhi: '',
                    yingyeshijian: '',
                    shangbiao: '',
                    yingyezhizhao: ''
                }
            }
        },
        methods: {
            open(string) {
                this.$message(string);
            },
            filterData: function (gid) {
                return this.categories.filter(v => v.cid == gid)
            },
            handleTabsEdit(targetName, action) {
                let uid = this.$route.query.uid;
                if (action === 'add') {
                    this.$prompt('请输入栏目名', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                    }).then(({value}) => {
                        fetch('/api/insert_goods', {
                            method: 'POST',
                            headers: {'Content-Type': 'application/json'},
                            body: JSON.stringify({g_name: value, g_desc: '', uid: uid})
                        })
                            .then(res => res.json())
                            .then(r => {
                                if (r.code === 2) {
                                    this.open(r.message);
                                } else {
                                    if (r.code === 4) {
                                        this.open(r.message);
                                    }
                                }
                            })
                    }).catch(() => {
                        this.$message({
                            type: 'info',
                            message: '取消输入'
                        });
                    })
                }
                if (action === 'remove') {
                    this.$confirm('此操作将永久删除该商品栏目, 是否继续?', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    })
                        .then(() => {
                            let tabs = this.goods;
                            let activeName = this.value;
                            fetch('/api/del_goods', {
                                method: 'POST',
                                headers: {'Content-Type': 'application/json'},
                                body: JSON.stringify({g_name: activeName})
                            })
                                .then(res => res.json())
                                .then(r => {
                                    if (r.code === 2) {
                                        this.goods = this.goods.filter((v, i) => {
                                            if (v.name === targetName) {
                                                if (targetName) {
                                                    let del = this.goods[i + 1] || this.goods[i - 1]
                                                    if (del) {
                                                        this.value = del.name;
                                                    }
                                                }
                                            }
                                            return v.name !== targetName;
                                        })
                                        this.$message({
                                            type: 'success',
                                            message: '删除成功'
                                        })
                                    } else {
                                        if (r.code === 4) {
                                            this.$message({
                                                type: 'info',
                                                message: '删除失败'
                                            })
                                        }
                                    }
                                })
                        }).catch(() => {
                        this.$message({
                            type: 'info',
                            message: '已取消删除'
                        })
                    });
//                    if(activeName===targetName){
//                        tabs.forEach((tab,index)=>{
//                            if(tab.g_name===targetName){
//                                let nextTab = tabs[index + 1] || tabs[index - 1];
//                                if (nextTab) {
//                                    activeName = nextTab.g_name;
//                                }
//                            }
//                        });
//                    }
//                    this.value = activeName;
//                    this.goods = tabs.filter(tab => tab.name !== targetName);
                }
            },
            update() {
                let uid = this.$route.query.uid;
                fetch('api/dianpu_update', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(this.form, this.form.uid = uid)
                })
                    .then(res => res.json())
                    .then(r => {
                        if (r.code === 2) {
                            this.open(r.message);
                        } else {
                            if (r.code === 4) {
                                this.open(r.message);
                            }
                        }
                    })
            }
        },
        mounted: function () {
            let uid = this.$route.query.uid;
            fetch('/api/get_dianpuxinxi?uid=' + uid)
                .then(res => res.json())
                .then(data => this.dianpu = data[0],);
            fetch('api/get_goods?uid=' + uid)
                .then(res => res.json())
                .then(data => this.goods = data);
            fetch('api/get_categories?uid=' + uid)
                .then(res => res.json())
                .then(data => this.categories = data);
        }
    }
</script>
<style>
    .dianpuxinxi {
        text-align: left;
        padding: 5px;
    }

    .ul100 {
        height: 100%;
    }
</style>
