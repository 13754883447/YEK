<template>
    <div class="su-bg">
        <div class="su-main">
            <h1>结果页</h1>
            <section class="su-content">
                <div class="su-center">
                    <img src="../../assets/img/tjcg.png" alt="">
                    <p>{{jieguo}}</p>
                </div>
                <a href="/" class="su-button">返回主页</a>
            </section>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                jieguo:this.$route.query.message
            }
        }
    }
</script>