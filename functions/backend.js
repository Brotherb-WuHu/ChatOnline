// 添加用户
// let userlist = document.querySelector('#usersList');
// let usertmp = document.querySelector('.usertmp');
// let btn = document.querySelector('#btn');

// const addnew = function () {
//     console.log('hi!');
//     let usertmpClone = usertmp.cloneNode(true);
//     userlist.append(usertmpClone);
// };

// btn.addEventListener('click', addnew);

// 关闭弹窗
let popupbtn = document.querySelector('#closebtn');
let popup = document.querySelector('#centreBody');
// 获取当前元素的样式，以对象伪数组形式

const disapear = () => {
    popup.style.display = 'none';
};

popupbtn.addEventListener('click', disapear);
