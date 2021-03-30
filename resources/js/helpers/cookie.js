 //设置cookie
export function setCookie(cname, cvalue, mins) {
        var d = new Date();
        // d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        d.setTime(d.getTime() + (mins *60 * 1000));
        var expires = "expires=" + d.toGMTString();
        // console.info(cname + "=" + cvalue + "; " + expires + "; path=/");
        console.log(cname + "=" + cvalue + "; " + expires + "; path=/")
        window.location.pathname
        document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
        // console.info(document.cookie);
}
//获取cookie
export function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1);
            if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
        }
        return "";
}
//清除cookie
export function clearCookie(cname) {
    this.setCookie(cname, "", -1);

}

export function checkCookie() {
    var user = this.getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
            this.setCookie("username", user, 365);
        }
    }
}
