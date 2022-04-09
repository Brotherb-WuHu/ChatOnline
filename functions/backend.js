// 关闭弹窗
let popupbtn = document.querySelector('#closebtn');
let popup = document.querySelector('#centreBody');

const disapear = () => {
    popup.className += 'disapear';
};

popupbtn.addEventListener('click', disapear);

// 添加聊天的当前时间
import datenow from './getTime.js';
let date = datenow.dateNow;
let dateSend = document.querySelector('#date');
dateSend.innerHTML = date;

// 获取用户列表获取用户姓名，向php发送姓名查询，将返回结果替换到中间的弹窗
let usertmpList = document.querySelectorAll('.usertmp');
let frameList = document.querySelectorAll('.frame');
let winimg = document.querySelector('#windowuserimg');

const xhrRequest = name => {
    let xhr = new XMLHttpRequest();

    let json = {
        name: '',
    };
    json.name = name;
    // 输出测试 name 是否从forEach那里传过来
    console.log(name);

    xhr.open('POST', './getClickUser.php');
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let rspdata = JSON.parse(xhr.responseText);
                frameList[0].innerHTML = rspdata.name;
                frameList[1].innerHTML = rspdata.acc;
                frameList[2].innerHTML = rspdata.sex;
            }
        }
    };
    xhr.setRequestHeader('Content-Type', 'application/json;charset=utf-8');
    xhr.send(JSON.stringify(json));
};

usertmpList.forEach(node => {
    node.addEventListener('click', () => {
        // 显示弹窗
        popup.classList.remove('disapear');

        // 向隔壁php传name并验证
        let name = node.children[1].innerHTML;
        xhrRequest(name);

        // 将点击的图片替换到中间的div中
        let windowimg = node.children[0].innerHTML;

        winimg.innerHTML = windowimg;
        console.log(windowimg.innerHTML);
        winimg.children[0].classList.remove('userimg');

        winimg.children[0].classList.add('windowuserimg');
    });
});
