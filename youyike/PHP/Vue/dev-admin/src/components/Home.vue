<template>
    <div>
        <admin v-if="active"></admin>
        <guite v-else></guite>
    </div>
</template>
<script>
    import admin from './admin.vue';
    import guite from './guite.vue';
    export default {
        data(){
            return{
                active:false
            }
        },
        components:{
            guite:guite,
            admin:admin
        },
        mounted(){
            let uid=this.$route.query.uid;
            console.log(uid);
            fetch('/api/havedianpu?uid='+uid)
                .then(res=>res.json())
                .then(r=>{
                    if(r.code===2){
                        this.active=true;
                        console.log(this.active)
                    }else if(r.code===4){
                        this.active=false;
                        console.log(this.active)
                    }
                })
        }
    }
</script>