// 全局变量a和b，分别获取用户框和密码框的value值
/*var a = document.getElementById("username").value;
var b = document.getElementById("password").value;

//用户框失去焦点后验证value值
/*function oBlur_1() {
    if (a == null) { //用户框value值为空
        document.getElementById("remind_1").innerHTML = "请输入用户名！";
        document.getElementById("change_margin_1").style.marginBottom = 1 + "px";
    } else { //用户框value值不为空
        oFocus_1();
    }
}

//用户框获得焦点的隐藏提醒
function oFocus_1() {
    document.getElementById("remind_1").innerHTML = "";
    document.getElementById("change_margin_1").style.marginBottom = 19.html + "px";
}

//密码框失去焦点后验证value值
function oBlur_2() {
    if (b == null) { //密码框value值为空
        document.getElementById("remind_2").innerHTML = "请输入密码！";
        document.getElementById("change_margin_2").style.marginBottom = 1 + "px";
        document.getElementById("change_margin_3").style.marginTop = 2 + "px";
    } else { //密码框value值不为空
        oFocus_2();
    }
}

//密码框获得焦点的隐藏提醒
function oFocus_2() {
    document.getElementById("remind_2").innerHTML = "";
    document.getElementById("change_margin_2").style.marginBottom = 19.html + "px";
    document.getElementById("change_margin_3").style.marginTop = 19.html + "px";
}
*/
//若输入框为空，阻止表单的提交
function submitTest() {
    var a = document.getElementById("username").value;
    var b = document.getElementById("password").value;
    /*if ((a == "") && (b == "")) { //用户框value值和密码框value值都为空
        document.getElementById("remind_1").innerHTML = "请输入用户名！";
        document.getElementById("change_margin_1").style.marginBottom = 1 + "px";
        a.focus();
        document.getElementById("remind_2").innerHTML = "请输入密码！";
        document.getElementById("change_margin_2").style.marginBottom = 1 + "px";
        document.getElementById("change_margin_3").style.marginTop = 2 + "px";
        b.focus();
        return false; //只有返回true表单才会提交
    } else */
    if (a == "") { //用户框value值为空
        document.getElementById("remind_1").innerHTML = "请输入用户名！";
        document.getElementById("change_margin_1").style.marginBottom = 10 + "px";
        return false;
    }
    if (b == "") { //密码框value值为空
        document.getElementById("remind_2").innerHTML = "请输入密码！";
        document.getElementById("change_margin_2").style.marginBottom = 10 + "px";
        document.getElementById("change_margin_3").style.marginTop = 20 + "px";
        return false;
    }
        return true;
}
$('#setregister').on('click',function() {
    $.post("http:192.168.1.101/lab/index.php/Admin/User/login",
    {
        account:$('#account').val(),
        password:$('#password').val(),
    },
    
    function(data,status){
        if(data.code == '1'){
            alert(data.message)
        }else{
            alert("注册成功！");
            window.location.href = 'denglujiemian.html';
        }
    
    } ,"jsonp");
    });