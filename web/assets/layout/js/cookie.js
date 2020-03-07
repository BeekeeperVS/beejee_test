var Cookie = function () {
    return {
        getCookie: getCookie,
        setCookie: setCookie,
        deleteCookie: deleteCookie,
    };


    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    function setCookie(name, value) {

        document.cookie = name + "=" + value + "; path=/;";
    }

    function deleteCookie(name) {
        setCookie(name, "", {
            'max-age': -1
        })
    }
}();
