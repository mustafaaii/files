
dash_cate_count();
function dash_cate_count() {
    fetch('' + url() + 'api/getdata.php', {
        method: 'POST',
        headers: { "Content-type": "application/json;charset=UTF-8" },
        body: JSON.stringify({ status: "get_cetegory_count" })
    }).then(response => response.text()).then(cate_count => {
        fetch('' + url() + 'api/getdata.php', {
            method: 'POST',
            headers: { "Content-type": "application/json;charset=UTF-8" },
            body: JSON.stringify({ status: "get_file_count" })
        }).then(response => response.text()).then(file_count => { dash_table(cate_count, file_count) });
    });
}

function dash_table(cate_count, file_count) {
    const data = [
        {
            id: 0,
            icon: "<i class=\"fa-solid fa-layer-group text-secondary\" style=\"font-size:26px;color:#888\"></i>",
            value: file_count,
            date: "15-09-2022",
            title: "Total Number of Files",
            subtitle: "Last File Upload Time",
        },
        {
            id: 1,
            icon: "<i class=\"fa-solid fa-timeline text-secondary\" style=\"font-size:26px;color:#888\"></i>",
            value: cate_count,
            date: "15-09-2022",
            title: "Total Number of Category",
            subtitle: "Last Category Used Time",
        }
    ]
    document.getElementById("dash_table").innerHTML = "<div class=\"loader mt-5\"></div>";
    setTimeout(() => {
        document.getElementById("dash_table").innerHTML = "";
        data.map((item) => {
            return (
                document.getElementById("dash_table").innerHTML += "" +
                "<div class=\"col pl-0 \">" +
                "<div class=\"card p-1\">" +
                "<div class=\"row mt-3 mb-3\" style=\"margin-right:0px ;\">" +
                "<div class=\"col-2\">" +
                "" + item.icon + "" +
                "</div>" +
                "<div class=\"col-10 text-right\">" +
                "<div style=\"font-size:24px;color:#888;\"></div>" +
                "</div>" +
                "<div class=\"col-12\">" +
                "<div style=\"font-size:30px;font-weight:600;color:#797979;\">" + item.value + "</div>" +
                "</div>" +
                "<div class=\"col-12\">" +
                "<div style=\"font-size:16px;font-weight:400;color:#888\">" + item.title + "</div>" +
                "</div>" +
                "<div class=\"col-8 mt-2\">" +
                "<div style=\"font-size:12px;font-weight:400;color:#888\">" + item.subtitle + "</div>" +
                "</div>" +
                "<div class=\"col-4 mt-2 text-right\">" +
                "<div style=\"font-size:12px;font-weight:400;color:#888;\">" + item.date + "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                ""
            )
        })
    }, 2000)


}




