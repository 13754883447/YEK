<template>
    <admin>
        <el-tabs type="border-card" class="ul100">
            <el-tab-pane label="订单" >
                <el-table
                        :data="orders"
                        style="width: 100%">
                    <el-table-column type="expand">
                        <template scope="props">
                            <el-form label-position="left" inline class="demo-table-expand">
                                <el-form-item label="商品：" class="w50">
                                <span>{{ getinfo(props.row.id )}}</span>
                            </el-form-item>
                                <el-form-item label="数量：" class="w50">
                                    <span>{{ getnum(props.row.id )}}</span>
                                </el-form-item>
                                <el-form-item label="总价：" class="w50">
                                    <span>￥{{ gettotal(props.row.id )}}</span>
                                </el-form-item>
                                <el-form-item label="客人名：" class="w50">
                                    <span>{{ props.row.uname }}</span>
                                </el-form-item>
                                <el-form-item label="客户地址：" class="w50">
                                    <span>{{ props.row.address1 }}{{ props.row.address2 }}</span>
                                </el-form-item>
                                <el-form-item label="客户手机：" class="w50">
                                    <span>{{ props.row.phone }}</span>
                                </el-form-item>
                                <el-form-item label="下单时间：" class="w50">
                                    <span>{{formdate( props.row.ctime)}}</span>
                                </el-form-item>
                            </el-form>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="客人"
                            prop="uname">
                    </el-table-column>
                    <el-table-column
                            label="手机号"
                            prop="phone">
                    </el-table-column>
                    <el-table-column label="操作">
                        <template scope="scope">
                            <el-button
                                    size="small"
                                    @click="Add(scope.row.id)" v-if="(scope.row.state)===0">接单
                            </el-button>
                            <el-button
                                    size="small"
                                    @click="Add(scope.row.id)" v-if="(scope.row.state)===1">已接单
                            </el-button>
                            <el-button
                                    size="small"
                                    @click="Add(scope.row.id)" v-if="(scope.row.state)===4">已完成
                            </el-button>
                            <el-button
                                    size="small"
                                    type="danger"
                                    @click="Del(scope.row.id)">删除
                            </el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>
    </admin>
</template>
<script>
    import admin from './admin.vue';
    export default {
        name:'shoping',
        components:{
            admin
        },
        data(){
            return{
                orders: [],
                goods:[],
                id:this.$route.query.uid
            }
        },
        methods:{
            open(string) {
                this.$message(string);
            },
            formdate(time) {
                let date = new Date(time);
                let y = [date.getFullYear(), date.getMonth() + 1, date.getDate()].join('-');
                let t = [date.getHours(), date.getMinutes()].join(':');
                return y + ' ' + t;
            },
            gettotal(oid) {
                let t = 0;
                this.goods.forEach(v => {
                    if (oid == v.oid) {
                        t = v.c_price * v.num;
                    }
                })
                return t;
            },
            getinfo(oid) {
                let s = '';
                this.goods.forEach(v => {
                    if (oid == v.oid) {
                        s += v.c_name;
                    }
                })
                return s;
            },
            getnum(oid) {
                return this.goods.filter(v => v.oid == oid).length;
            },
            Add(id){
                fetch('/api/jiedan?id='+id)
                    .then(res=>res.json())
                    .then(r=>{
                        if(r.code===2){
                            this.open(r.message)
                        }else{
                            if(r.code===4){
                                this.open(r.message);
                            }
                        }
                    })
            },
            Del(id){
                fetch('/api/shandan?id='+id)
                    .then(res=>res.json())
                    .then(r=>{
                        if(r.code===2){
                            this.open(r.message)
                        }else{
                            if(r.code===4){
                                this.open(r.message);
                            }
                        }
                    })
            }
        },
        mounted(){
            fetch('/api/shoping_dingdan?sid='+this.id)
                .then(res=>res.json())
                .then(r=>{
                    this.orders=r.data.goods;
                    this.goods=r.data.orders
        })
        }
    }

</script>
<style>
    .w50{
        width:40%;
    }
    .w30{
        width:30%;
    }
</style>