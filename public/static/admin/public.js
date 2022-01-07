/* 获取url参数 */
function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
            return pair[1];
        }
    }
    return (false);
}

/* 时间戳转换 */
function getLocalTime(nS) {
    return new Date(parseInt(nS) * 1000).toLocaleString();
}