<template>
  <div>
    <div class="header">
      <div class="header-box">
        <div class="header-left">
          <span class="storecenter">KTV管理中心</span>
        </div>
        <div class="header-right">
          <span>客服电话：020-202020</span>
        </div>
      </div>
    </div>
    <el-row>
      <el-col :span="4" >
        <div class="admin-left">
          <el-menu :default-active="this.$route.name" class="ul100">
            <router-link :to="{name:'songlanmu',query:this.$route.query}">
              <el-menu-item index="songlanmu">
                <i class="el-icon-menu"></i>歌手管理
              </el-menu-item>
            </router-link>
            <router-link :to="{name:'lanmu',query:this.$route.query}">
              <el-menu-item index="shoping">
                <i class="el-icon-setting"></i>歌曲
              </el-menu-item>
            </router-link>
          </el-menu>
        </div>
      </el-col >
      <el-col :span='20'>
        <div class="admin-right">
          <slot></slot>
        </div>
      </el-col>
    </el-row>
  </div>
</template>
<script>
    export default{
        name:'admin',
        data(){
            return {
            }
        },
        methods: {
        },
    }
</script>
<style scoped>
  .header {
    width: 100%;
    height: 50px;
    background: repeating-linear-gradient(to left, #fc005f, #f500ff);
  }
  .header-box{
    width: 800px;
    margin:0  auto;
    display: flex;
    justify-content: space-between;
  }
  .header-left{
    color: #fff;
    line-height: 50px;
  }
  .header-right{
    color: #fff;
    line-height: 50px;
  }
  .admin-left,.admin-right{
    height: calc(100vh - 50px);
  }
  .admin-right{
    background: #fff;
  }
  .ul100{
    height: 100%;
  }
</style>