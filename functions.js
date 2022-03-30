// 密码隐藏与消失
var getpassword = document.getElementById('password'),
    geteye = document.getElementById('eye');
flag = false;

geteye.onclick = function () {
    if (flag == true) {
        geteye.src = 'pictures/eyeop.ico';
        getpassword.type = 'text';
        flag = !flag;
    } else {
        getpassword.type = 'password';
        geteye.src = 'pictures/eyecl.ico';
        flag = !flag;
    }
};
//实现图片实时预览
function showImg() {
    //获取上传文件的信息
    var upfile = document.getElementById('pic').files[0];
    //生成文件url
    var src = window.URL.createObjectURL(upfile);
    //替换
    var preview = document.getElementById('preview');
    preview.src = src;
}
