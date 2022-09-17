function url() {
    const web = "http://localhost:8080";
    const url = "" + web + "/wp-content/plugins/filer/";
    return url;
}

file_category();
function file_category() {
    fetch('' + url() + 'api/getdata.php', {
        method: 'POST',
        headers: { "Content-type": "application/json;charset=UTF-8" },
        body: JSON.stringify({ status: "get_cetegory" })
    }).then(response => response.text()).then(success => {
        const d = JSON.parse(success);

        if (d.status == false) {
            document.getElementById("category").innerHTML = "<option value=\"0\">Select File Category</option>"
        }
        else {
            d.data.unshift({ id: 0, category: "Select File Category" })
            d.data.map((item) => { document.getElementById("category").innerHTML += "<option value=\"" + item.id + "\">" + item.category + "</option>"; })
        }
    });
}

var data = [];
file_get();
function file_get() {
    fetch('' + url() + 'api/getdata.php', {
        method: 'POST',
        headers: { "Content-type": "application/json;charset=UTF-8" },
        body: JSON.stringify({ status: "get_list" })
    }).then(response => response.text()).then(success => { data = success; file_table(success); });
}

function file_table(e) {

    const d = JSON.parse(e);
    if (d.message === "Veri Bulunamadı.") {
        document.getElementById("file_table").innerHTML = "";
        document.getElementById("empty_data").innerHTML = "" +
            "<div>" +
            "<div class=\"items-center display-flex text-center justify-content-center\"><i class=\"fa-solid fa-folder-open\" style=\"font-size:28px\"></i></div>" +
            "<div class=\"items-center display-flex text-center justify-content-center\">No Data Found</div>" +
            "</div>" +
            "";
    }
    else {
        document.getElementById("empty_data").innerHTML = "";
        document.getElementById("loader").innerHTML = "<div class=\"loader\"></div>";
        setTimeout(() => {
            document.getElementById("file_table").innerHTML = "";
            document.getElementById("loader").innerHTML = "";
            var category = [];
            d.data.map((item) => {
                for (let i = 0; i <= item.cate_name.split(",").length; i++) {
                    if (item.cate_name.split(",")[i] !== undefined) {
                        category += "<span class=\"badge badge-secondary p-2 rounded-none mr-2 ml-2\">" + item.cate_name.split(",")[i] + "</span>";
                    }
                }
                return (
                    document.getElementById("file_table").innerHTML += "" +
                    "<tr class=\"searchdata\">" +
                    "<th class=\"col-[4] tds text-center\" scope=\"row\"><div class=\"my-auto items-center justify-content-center display-flex h-[40] text-sm\">" + item.id + "</div></th>" +
                    "<td class=\"col-[22] tds\"><div class=\"my-auto items-center display-flex h-[40] text-sm\">" + item.filename + "</div></td>" +
                    "<td class=\"col-[28] tds\"><div class=\"my-auto items-center  display-flex h-[40] text-sm\">" + category + "</div></td>" +
                    "<td class=\"col-[6] tds text-center\"><div class=\"my-auto items-center justify-content-center display-flex h-[40] text-sm\">" + file_types(item.filetype, item.filename) + "</div></td>" +
                    "<td class=\"col-[8] tds text-center\"><div class=\"my-auto items-center justify-content-center display-flex h-[40] text-sm\">" + item.filesize + "</div></td>" +
                    "<td class=\"col-[8] tds text-center\"><div class=\"my-auto items-center justify-content-center display-flex h-[40] text-sm\">" + item.filedate + "</div></td>" +
                    "<td class=\"col-[8] tds text-center\"><div class=\"my-auto items-center justify-content-center display-flex h-[40] text-sm\">" + item.byname + "</div></td>" +
                    "<td class=\"col-[10] tds text-center\">" +
                    "<div class=\"my-auto items-center justify-content-center display-flex h-[40] text-sm\">" +
                    "<a class=\"flex items-center text-danger  cursor-pointer\" style=\"text-decoration:none;\" onclick=\"file_delete(" + item.id + ")\">" +
                    "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" icon-name=\"trash-2\" data-lucide=\"trash-2\" class=\"lucide lucide-trash-2\" style=\"height:16px;\">" +
                    "<polyline points=\"3 6 5 6 21 6\"></polyline>" +
                    " <path d=\"M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2\"></path>" +
                    "<line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\"></line>" +
                    "<line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\"></line>" +
                    "</svg>" +
                    "Delete" +
                    "</a>" +
                    "</div>" +
                    "</td>" +
                    "</tr>"
                )
            })
        }, 2000)

    }





}

function file_types(type, name) {

    switch (type) {
        case "PDF Document":
            return "" +
                "<a target=\"_blank\" href=\"" + url() + "" + name + "\" class=\"  mx-auto text-center text-secondary rounded-md\">" +
                "<div class=\"leading-none relative text-center\">" +
                "<span class=\"text-slate-700 font-xs \">" +
                "<i class=\"fa-solid fa-file-excel\" style=\"font-size:36px\"></i>" +
                "</span>" +
                "</div>" +
                "</a>";
        case "CVS Document":
            return "<a target=\"_blank\" href=\"" + url() + "" + name + "\" class=\" max-w-md mx-auto text-center text-secondary rounded-md\">" +
                "<div class=\"leading-none relative text-center\">" +
                "<span class=\"text-slate-700 font-xs \">" +
                "<i class=\"fa-solid fa-file-word\" style=\"font-size:36px\"></i>" +
                "</span>" +
                "</div>" +
                "</a>";
        case "DOCX Document":
            return "<a target=\"_blank\" href=\"" + url() + "" + name + "\" class=\" max-w-md mx-auto text-center text-secondary rounded-md\">" +
                "<div class=\"leading-none relative text-center\">" +
                "<span class=\"text-slate-700 font-xs \">" +
                "<i class=\"fa-solid fa-file-word\" style=\"font-size:36px\"></i>" +
                "</span>" +
                "</div>" +
                "</a>";
        case "DOC Document":
            return "<a target=\"_blank\" href=\"" + url() + "" + name + "\" class=\" max-w-md mx-auto text-center text-secondary  rounded-md\">" +
                "<div class=\"leading-none relative text-center\">" +
                "<span class=\"text-slate-700 font-xs \">" +
                "<i class=\"fa-solid fa-file-word\" style=\"font-size:36px\"></i>" +
                "</span>" +
                "</div>" +
                "</a>";
        case "EXCEL Document":
            return "<a target=\"_blank\" href=\"" + url() + "" + name + "\" class=\" max-w-md mx-auto text-center text-secondary rounded-md\">" +
                "<div class=\"leading-none relative text-center\">" +
                "<span class=\"text-slate-700 font-xs \">" +
                "<i class=\"fa-solid fa-file-excel\" style=\"font-size:36px\"></i>" +
                "</span>" +
                "</div>" +
                "</a>";
        case "JPEG Document":
            return "<a target=\"_blank\" href=\"" + url() + "" + name + "\"><img src=\"" + url() + "" + name + "\" style=\"height:20px;text-align:center;margin:auto;height: auto;\" /></a>";
        case "JPG Document":
            return "<a target=\"_blank\" href=\"" + url() + "" + name + "\"><img src=\"" + url() + "" + name + "\" style=\"height:20px;text-align:center;margin:auto;height: auto;\" /></a>";
        case "PNG Document":
            return "<a target=\"_blank\" href=\"" + url() + "" + name + "\"><img src=\"" + url() + "" + name + "\" style=\"height:20px;text-align:center;margin:auto;height: auto;\"/></a>";
        case "ZIP Document":
            return "<a target=\"_blank\" href=\"" + url() + "" + name + "\" class=\" max-w-md mx-auto text-center text-secondary rounded-md\">" +
                "<div class=\"leading-none relative text-center\">" +
                "<span class=\"text-slate-700 font-xs \">" +
                "<i class=\"fa-solid fa-file-zipper\" style=\"font-size:36px\"></i>" +
                "</span>" +
                "</div>" +
                "</a>";
        case "RAR Document":
            return "<a target=\"_blank\" href=\"" + url() + "" + name + "\" class=\" max-w-md mx-auto text-center text-secondary rounded-md\">" +
                "<div class=\"leading-none relative text-center\">" +
                "<span class=\"text-slate-700 font-xs \">" +
                "<i class=\"fa-solid fa-file-zipper\" style=\"font-size:36px\"></i>" +
                "</span>" +
                "</div>" +
                "</a>";
        case "TXT Document":
            return "<a target=\"_blank\" href=\"" + url() + "" + name + "\" class=\" max-w-md mx-auto text-center text-secondary rounded-md\">" +
                "<div class=\"leading-none relative text-center\">" +
                "<span class=\"text-slate-700 font-xs \">" +
                "<i class=\"fa-solid fa-file-lines\" style=\"font-size:36px\"></i>" +
                "</span>" +
                "</div>" +
                "</a>";
        default:
    }
    return;
}

function file_se(e) {
    console.log(e)
    let filter = e.toUpperCase();
    let rowss = document.getElementsByClassName("searchdata");
    let flag = false;

    for (let rows of rowss) {
        let cells = rows.getElementsByClassName("tds");
        for (let cell of cells) {
            if (cell.textContent.toUpperCase().indexOf(filter) > -1) {
                flag = true;
                break;
            }
        }
        if (flag) {
            rows.classList.remove("show_tb")
        }
        else {
            rows.setAttribute("class", "searchdata show_tb")
        }

        flag = false;
    }
}

function file_delete(e) {
    swal({
        title: "Are you sure?",
        text: "If you delete this file it will be completely removed!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {

            fetch('' + url() + 'api/putdata.php', {
                method: 'POST',
                headers: { "Content-type": "application/json;charset=UTF-8" },
                body: JSON.stringify({ status: "put_file", id: e })
            }).then(response => response.text()).then(s => {
                swal("Good job!", "File Delete!", "success");
                file_get();
            });

        }
    });
}