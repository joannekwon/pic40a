<!--
var f = "";

function init() {
        check_update();
        setInterval(check_update2, 1000);
}

function check_update() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "responses.php", true);
        xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                                f = xhr.responseText;
                display_result(f);
                        }
        }
        xhr.send(null);
}

function check_update2() {
        var xhr = new XMLHttpRequest();
    xhr.open("GET", "responses.php", true);
    xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                        var res2 = xhr.responseText;
            display_result2(res2);
                }
        }
        xhr.send(null);
}

function display_result(conte) {
        var table_response = document.getElementById("table_response");
        var ntable = document.createElement("TABLE");

        var ntr = document.createElement("tr");
        var nth = document.createElement("th");

        nth.innerHTML = "Name";
        ntr.appendChild(nth);

        var nth = document.createElement("th");
        nth.innerHTML="Attend";
        ntr.appendChild(nth);

        var nth = document.createElement("th");
        nth.innerHTML="Dish";
        ntr.appendChild(nth);

        var nth = document.createElement("th");
        nth.innerHTML="Restrictions";   
        ntr.appendChild(nth);
     
        table_response.appendChild(ntr);
    
        var result = conte.split(",");
       
    for(var i = 0; i < result.length - 1; i++) {
        var ntr = document.createElement("tr");
        var ntd = document.createElement("td");
            
        ntd.innerHTML=result[i].split("/")[0];
        ntr.appendChild(ntd);

        var ntd = document.createElement("td");
        ntd.innerHTML=result[i].split("/")[1];
        ntr.appendChild(ntd);
            
        var ntd = document.createElement("td");
        ntd.innerHTML=result[i].split("/")[2];
        ntr.appendChild(ntd);
            
        var ntd = document.createElement("td");
        ntd.innerHTML=result[i].split("/")[3];
        ntr.appendChild(ntd);
                 
        table_response.appendChild(ntr);
    }
    }

    function display_result2(f2) {
        
       if (f.length < f2.length) {
                        
            var table_response = document.getElementById("table_response");
        
            while (table_response.hasChildNodes()) {
                table_response.removeChild(table_response.lastChild);
            }
        
            var ntr = document.createElement("tr");
            var nth = document.createElement("th");
        
            nth.innerHTML="Name";
            ntr.appendChild(nth);
        
            var nth = document.createElement("th");
            nth.innerHTML="Attend";
            ntr.appendChild(nth);
        
            var nth = document.createElement("th");
            nth.innerHTML="Dish";
            ntr.appendChild(nth);
    
            var nth = document.createElement("th");
            nth.innerHTML="Restrictions";
            ntr.appendChild(nth);
            table_response.appendChild(ntr);   
        
            var f3=f2.split(",");
        
            for (var i = 0; i < f3.length-1; i++)
            {
                var ntr = document.createElement("tr");
                var ntd = document.createElement("td");
        
                ntd.innerHTML= f3[i].split("/")[0];
                ntr.appendChild(ntd);
        
                var ntd = document.createElement("td");
                ntd.innerHTML=f3[i].split("/")[1];
                ntr.appendChild(ntd);

                var ntd = document.createElement("td");
                ntd.innerHTML=f3[i].split("/")[2];
                ntr.appendChild(ntd);   
     
                var ntd = document.createElement("td");
                ntd.innerHTML=f3[i].split("/")[3];
                ntr.appendChild(ntd);
        
                table_response.appendChild(ntr);
            }           
        }
        f = f2;
    }
        -->
