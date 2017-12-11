<template>
    <div>
        <ul>
            <li v-for="item in items">{{item.name}}**{{item.price}}</li>
        </ul>
    </div>
</template>
<script>
    import {store} from 'vuex'
    export default {
        name:'demo2',
        computed:{
            items(){
                return this.$store.state.data;
            }
        }
    }
</script>