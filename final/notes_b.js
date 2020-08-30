function save() {
        var notess = document.getElementById("new_note").value;

        var expires = "";
        document.cookie = "my_cookie: " + notess + "/expires:" + expires;
}

function load() {
        document.getElementById("new_note").value= document.cookie.split(":")[1].split("/")[0];
}