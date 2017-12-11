window.onready=function () {
    let name=document.querySelector("input[name='name']");
    let sex=document.querySelector("input[name='sex']");
    let phonenumber=document.querySelector("input[name='phonenumber']");
    name.onfoucs=function(){

    };
    name.onblur=function(){
        if(name=""){
            alert("请填写名字");
        }
    };
};
