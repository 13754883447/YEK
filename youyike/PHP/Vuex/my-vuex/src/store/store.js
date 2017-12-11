import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export  const store = new Vuex.Store({
    strict:true,
    state: {
        products:[
            {name:"马云",price:200},
            {name:"马化腾",price:140},
            {name:"马冬梅",price:20},
            {name:"马蓉",price:10}
        ]
    }
});