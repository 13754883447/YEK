let click=new Vue({
    el:"#1",
    data:{
        message:'hello word',
        input:"",
        categories:[
            {id:1,value:'1'},
            {id:2,value:'2'},
            {id:3,value:'3'},
            {id:4,value:'4'}
        ]},
    methods:{
        reverseMessage:function () {
            //this特殊的对象，有data，methods里面的键
            this.message = 'hello word';
            console.log(this.input);
        },
        remove:function (i) {
            this.categories.splice(i,1);
        },
        add:function () {
            var maxId = -Infinity; //负无穷
            this.categories.forEach(v=>{
                if(v.id>maxId){
                    maxId=v.id;
                }
            })
            let o={
                id:maxId+1,
                value:this.input
            }
            this.categories.push(o);
            this.input=''
        }
    }
})