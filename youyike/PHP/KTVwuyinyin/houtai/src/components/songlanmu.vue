<template>
    <div>
        <admin>
            <el-tabs type="border-card" class="ul100">
                <el-tab-pane
                        :label="v.lanmu"
                        v-for="v in lanmu"
                        :key="v.id">
                    <el-tabs
                        type="card"
                        editable @edit="handleTabsEdit">
                    <el-tab-pane v-for="(item,index) in geshou"
                                 :key="item.id"
                                 :label="item.name"
                                 :name="item.name"
                                 v-if="item.lanmuid==v.id">
                        <el-form :ref="form" :model="form" class="row" type="flex">
                            <el-form-item label="歌手ID">
                                <el-col :span="8">
                                    <el-input v-model="form.id" :placeholder="item.id">
                                    </el-input>
                                </el-col>
                            </el-form-item>
                            <el-form-item label="歌曲名称">
                                <el-col :span="8">
                                    <el-input v-model="form.name" :placeholder="item.name"></el-input>
                                </el-col>
                            </el-form-item>
                            <el-form-item label="歌手图片">
                                <el-col :span="8">
                                    <el-input v-model="form.img" :placeholder="item.img"></el-input>
                                </el-col>
                            </el-form-item>
                            <el-form-item label="歌手所属">
                                <el-col :span="8">
                                    <el-input v-model="form.lanmuid" :placeholder="item.lanmuid">
                                    </el-input>
                                </el-col>
                            </el-form-item>
                            <el-button type="primary" @click="update">提交</el-button>
                        </el-form>
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
                lanmu:[],
                geshou:[],
                lanmuid:0,
                form:{
                    id:'',
                    name:'',
                    img:'',
                    lanmuid:''
                }
            }
        },
        methods: {
            open(string) {
                this.$message(string);
            },
            handleTabsEdit(targetName, action) {
                if (action === 'add') {
                    this.$prompt('请输入栏目名', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                    }).then(({value}) => {
                        fetch('/api/insert_geshou', {
                            method: 'POST',
                            headers: {'Content-Type': 'application/json'},
                            body: JSON.stringify(form)
                        })
                            .then(res=>res.json())
                            .then(r=>{
                                if(r.code){
                                    alert(r.message);
                                }
                            })
                    })
                }
            },
            update(){
                if(this.form.id!=''&&this.form.name!=''&&this.form.img!=''&&this.form.lanmuid!=''){
                    fetch('/api/update_geshou',{
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(this.form)
                    })
                        .then(res=>res.json())
                        .then(r=>{
                            if(r){
                                this.open(r.message)
                            }
                        })
                }
            }
        },
        mounted: function () {
            fetch('/api/song_lanmu')
                .then(res=>res.json())
                .then(r=>this.lanmu=r);
            fetch('/api/select_geshou')
                .then(res=>res.json())
                .then(r=>this.geshou=r)
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
