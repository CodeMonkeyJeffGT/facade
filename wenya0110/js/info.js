function check(){
  　　var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$"); //正则表达式
  　　var obj = document.getElementById("email"); //要验证的对象
  　　if(obj.value === ""){ //输入不能为空
  　　　　alert("输入不能为空!");
  　　　　return false;
  　　}else if(!reg.test(obj.value)){ //正则验证不通过，格式不对
  　　　　alert("邮箱格式不正确");
  　　　　return false;
  　　}else{
  　　　　//alert("通过！");
  　　　　return true;
  　　}
  }