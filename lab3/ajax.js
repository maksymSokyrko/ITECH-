ajax = new XMLHttpRequest();

function forText(){
    ajax.onreadystatechange = function (){
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax.responseText);
                document.getElementById("result").innerHTML = ajax.response;
            }
        }
    }
    var processor = document.getElementById("processor").value;
    ajax.open("get", "text.php?processor=" + processor);
    ajax.send();
}

function forXML(){
    ajax.onreadystatechange = function (){
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax);
                let software = document.getElementById("software").value;
                let rows = ajax.responseXML.firstChild.children;
                let result = "Computer with software " + software;
                 result += "<ol>";
                for(var i = 0; i < rows.length; i++){
                    result += "<li>ID_computer: " + rows[i].children[0].firstChild.nodeValue + ", netname: " +
                    rows[i].children[1].firstChild.nodeValue + ", guarantee: " +
                    rows[i].children[2].firstChild.nodeValue + "</li>";
                }
                result += "</ol>";
                document.getElementById("result").innerHTML = result;
            }
        }
    }
    var software = document.getElementById("software").value;
    ajax.open("get", "xml.php?software=" + software);
    ajax.send();
}

function forJSON(){
    ajax.onreadystatechange = function (){
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax);
                let warranty = document.getElementById("warranty").value;
                let rows = JSON.parse(ajax.responseText);
                let result = "Computer with expired warranty for date: " + warranty;
                result += "<ol>";
                for(var i = 0; i < rows.length; i++){
                    result += "<li>ID_computer: " + rows[i].ID_Computer + ", netname: " +
                    rows[i].netname + ", guarantee: " +
                    rows[i].guarantee + "</li>";
                }
                result += "</ol>";
                document.getElementById("result").innerHTML = result;
            }
        }
    }
    var warranty = document.getElementById("warranty").value;
    ajax.open("get", "json.php?warranty=" + warranty);
    ajax.send();
}