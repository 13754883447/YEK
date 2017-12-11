<template>
  <div>
    <!--<h1 @click="add()">{{msg+num}}</h1>-->
    <ul>
      <li v-for="item in items">{{item.name}}**{{item.price}}</li>
    </ul>
  </div>
</template>

<script>
  export default {
    name: 'HelloWorld',
    data () {
      return {
        msg: 'Welcome to Your Vue.js App',
          num:1,
          items:this.$store.state.products
      }
    },
      methods:{
        add(){
            this.num++;
        }
      },
      computed:{
//          items(){
//              return this.$store.state.products;
//          }
      }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
