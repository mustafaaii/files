function url() {
    const web = "http://localhost:8080";
    const url = "" + web + "/wp-content/plugins/filer/";
    return url;
}


log_table();
function log_table() {
    if (document.getElementById("log_table") !== null) {
        document.getElementById("log_table").innerHTML = "<div class=\"loader mt-5\"></div>";
        setTimeout(() => {
            fetch('' + url() + 'api/getdata.php', {
                method: 'POST',
                headers: { "Content-type": "application/json;charset=UTF-8" },
                body: JSON.stringify({ status: "get_log" })
            }).then(response => response.text()).then(success => {
                const d = JSON.parse(success);
                if (document.getElementById("log_table") !== null) {
                    if (d.status === false) {
                        document.getElementById("log_table").innerHTML = "" +
                            "<div class=\"col-12\">" +
                            "<div class=\"items-center display-flex text-center justify-content-center mt-5\"><i class=\"fa-solid fa-folder-open\" style=\"font-size:28px\"></i></div>" +
                            "<div class=\"items-center display-flex text-center justify-content-center\">No Data Found</div>" +
                            "</div>";
                    }
                    else {
                        document.getElementById("log_table").innerHTML = "";
                        var status = "";
                        d.data.map((item) => {

                            if (item.stat === "insert") {
                                status = "<span class=\"badge bg-success rounded-none col-[100]\">" + item.stat + "</span>"
                            }
                            else if (item.stat === "update") {
                                status = "<span class=\"badge bg-primary rounded-none col-[100]\">" + item.stat + "</span>"
                            }
                            else if (item.stat === "delete") {
                                status = "<span class=\"badge bg-danger rounded-none col-[100]\">" + item.stat + "</span>"
                            }
                            else if (item.stat === "login") {
                                status = "<span class=\"badge bg-secondary rounded-none col-[100]\">" + item.stat + "</span>"
                            }
                            else {

                            }
                            return (
                                document.getElementById("log_table").innerHTML += "" +
                                "<div class=\"col-12 p-0 mt-1 shadow-xs\">" +
                                "<div class=\"row\" style=\"margin-right: 0px;\">" +
                                "<div class=\"col-[74] min-h-40  display-flex items-center my-auto text-sm  border-nc-r border-c\">" + item.text + "</div>" +
                                "<div class=\"col-[10] min-h-40  display-flex items-center my-auto text-sm  border-nc-r border-c\">" + status + "</div>" +
                                "<div class=\"col-[16] min-h-40  display-flex items-center my-auto text-sm\">" + item.date + "</div>" +
                                "</div>" +
                                "</div>"
                            )
                        })
                    }
                }
            });
        }, 2000)
    }
}
function log_set(text, stat) {
    fetch('' + url() + 'api/setdata.php', {
        method: 'POST',
        headers: { "Content-type": "application/json;charset=UTF-8" },
        body: JSON.stringify({ status: "set_log", text: text, stat: stat })
    }).then(response => response.text()).then(s => { });
}

