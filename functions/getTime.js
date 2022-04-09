function getDatetime() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var day = now.getDate();
    var hh = now.getHours();
    var mm = now.getMinutes();
    var clock = year + '-';
    if (month < 10) clock += '0';
    clock += month + '-';
    if (day < 10) clock += '0';
    clock += day + ' ';
    if (hh < 10) clock += '0';
    clock += hh + ':';
    if (mm < 10) clock += '0';
    clock += mm + ':';
    return clock;
}

function formatTime(timestamp) {
    var date = new Date(timestamp);
    var Y = date.getFullYear() + '-';
    var M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '-';
    var D = date.getDate() < 10 ? '0' + date.getDate() : date.getDate() + ' ';
    var hh = date.getHours() < 10 ? '0' + date.getHours() : date.getHours() + ':';
    var mm = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes() + '';
    return Y + M + D + '-' + hh + mm;
}

let dateNow = formatTime(getDatetime());

export default {
    dateNow,
};
