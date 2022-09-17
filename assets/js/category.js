function url() {
    const web = "http://localhost:8080";
    const url = "" + web + "/wp-content/plugins/filer/";
    return url;
}

function show_modal() {
    document.getElementById("categorymodal").classList.toggle("show")
}
function close_modal() {
    document.getElementById("categorymodal").classList.remove("show")
}
var data = [];
categories_get();
function categories_get() {
    document.getElementById("cate_del_btn").style.display = "none";
    fetch('' + url() + 'api/getdata.php', {
        method: 'POST',
        headers: { "Content-type": "application/json;charset=UTF-8" },
        body: JSON.stringify({ status: "get_cetegory" })
    }).then(response => response.text()).then(success => { data = success; categories_table(success); });
}
function categories_table(e) {
    const d = JSON.parse(e);
    if (d.message === "Veri Bulunamadı.") {
        document.getElementById("cate_table").innerHTML = "";
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
        document.getElementById("cate_table").innerHTML = "";
        setTimeout(() => {
            document.getElementById("loader").innerHTML = "";
            d.data.map((item) => {
                return (
                    document.getElementById("cate_table").innerHTML += "" +
                    "<tr class=\"searchdata\">" +
                    "<td class=\"col-[4] tds text-center\" scope=\"row\"><div class=\"my-auto items-center justify-content-center display-flex h-[40] text-sm\">" + item.id + "</div></td>" +
                    "<td class=\"col-[14] tds\"><div class=\"my-auto items-center display-flex h-[40] text-sm\">" + item.category + "</div></td>" +
                    "<td class=\"col-[40] tds\"><div class=\"my-auto items-center display-flex h-[40] text-sm\">" + item.category_text + "</div></td>" +
                    "<td class=\"col-[12] tds text-center\"><div class=\"my-auto items-center justify-content-center display-flex h-[40] text-sm\">" + item.category_create_date + "</div></td>" +
                    "<td class=\"col-[12] tds text-center\"><div class=\"my-auto items-center justify-content-center display-flex h-[40] text-sm\">" + item.category_update_date + "</div></td>" +
                    "<td class=\"col-[8] tds text-center\"><div class=\"my-auto items-center justify-content-center display-flex h-[40] text-sm\">" + item.category_auth + "</div></td>" +
                    "<td class=\"col-[10] tds\">" +
                    "<div class=\"my-auto items-center justify-content-center display-flex h-[40]\">" +
                    "<a class=\"flex items-center text-secondary mr-3 cursor-pointer  text-sm\" style=\"text-decoration:none;\"  onclick=\"show_cate_edit(" + item.id + ")\">" +
                    "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" icon-name=\"check-square\" data-lucide=\"check-square\" class=\"lucide lucide-check-square\" style=\"height:16px;\">" +
                    "<polyline points=\"9 11 12 14 22 4\"></polyline>" +
                    "<path d=\"M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11\"></path>" +
                    "</svg>" +
                    "Edit" +
                    "</a>" +
                    "<a class=\"flex items-center text-danger ml-5 cursor-pointer  text-sm\" style=\"text-decoration:none;\"  id=\"" + item.id + ", " + item.category + "\" onclick=\"category_del(event.target.id)\">" +
                    "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" icon-name=\"trash-2\" data-lucide=\"trash-2\" class=\"lucide lucide-trash-2\" style=\"height:16px;\">" +
                    "<polyline points=\"3 6 5 6 21 6\"></polyline>" +
                    "<path d=\"M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2\"></path>" +
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
function show_cate_edit(e) {

    document.getElementById("modal_content").innerHTML = "" +
        "<div class=\"modal fade\" id=\"modal" + e + "\" tabindex=\"-1\">" +
        "<div class=\"modal-dialog modal-dialog-centered  shadow-md\" role=\"document\">" +
        "<div class=\"modal-content shadow-lg\">" +
        "<div class=\"modal-body p-3\">" +
        "<div class=\"row\" style=\"margin-right:0px;\">" +
        "<div class=\"col-12 mt-1 p-0\">" +
        "<div class=\"row\">" +
        "<div class=\"col-8 p-0\">" +
        "<h5 class=\"modal-title\" id=\"exampleModalCenterTitle\">Update Category</h5>" +
        "</div>" +
        "<div class=\"col-4 p-0\">" +
        "<div class=\"cursor-pointer float-right\" onclick=\"close_cate_edit(" + e + ")\">" +
        "<i class=\"fa-regular fa-circle-xmark float-right\" style=\"font-size: 24px;\"></i>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<div class=\"col-12 mt-4 p-0\">" +
        "<input onfocus=\"old_value(event.target.value)\" id=\"category_name\" type=\"text\" class=\"form-control\" placeholder=\"Category Name\" style=\"border-color: #dee2e6;border-radius:0px;height:35px\" />" +
        "</div>" +
        "<div class=\"col-12 mt-2 p-0\">" +
        "<textarea id=\"category_text\" class=\"form-control\" placeholder=\"asdasd\" style=\"border-color: #dee2e6;border-radius:0px;\"></textarea>" +
        "</div>" +
        "<div class=\"col-12 mt-4 p-0\">" +
        "<button  class=\"btn btn-secondary btn-sm rounded-none float-right mr-2\" style=\"border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px\"  onclick=\"close_cate_edit(" + e + ")\">" +
        "Close" +
        "</button>" +
        "<button  class=\"btn btn-primary btn-sm rounded-none float-right mr-2\" style=\"border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px\" onclick=\"category_upt(" + e + ")\">" +
        "Save changes" +
        "</button>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "";


    fetch('' + url() + 'api/getdata.php', {
        method: 'POST',
        headers: { "Content-type": "application/json;charset=UTF-8" },
        body: JSON.stringify({ status: "get_cetegory_id", id: e })
    }).then(response => response.text()).then(success => {
        const d = JSON.parse(success);
        d.data.map((item) => {
            document.getElementById("category_name").value = item.category;
            document.getElementById("category_text").value = item.category_text;

        })
    });

    document.getElementById("modal" + e + "").classList.toggle("show")
}
function close_cate_edit(e) {
    document.getElementById("modal" + e + "").classList.remove("show")
}
var oldvalue = "";
function old_value(e) {
    oldvalue = e;
}
function category_upt(e) {

    const category_name = document.getElementById("category_name").value;
    const category_text = document.getElementById("category_text").value;

    if (category_name === "") {
        swal({ title: "Warning", text: "Category Name cannot be empty!", icon: "warning" })
    }
    else {
        if (category_text === "") {
            swal({ title: "Warning", text: "Category Text cannot be empty!", icon: "warning" })
        }
        else {


            log_set("Value updated from&nbsp;<b style=\"color:#0d6efd\">" + oldvalue + "</b>&nbsp;to&nbsp;<b style=\"color:#198754\">&nbsp;" + category_name + "</b>", "update")
            fetch('' + url() + 'api/setdata.php', {
                method: 'POST',
                headers: { "Content-type": "application/json;charset=UTF-8" },
                body: JSON.stringify({ status: "upt_category", id: e, name: category_name, text: category_text })
            }).then(response => response.text()).then(s => {
                document.getElementById("modal" + e + "").classList.remove("show")
                swal("Good job!", "File Update!", "success");
                categories_get();

            });
        }
    }





}
function category_add() {
    var category_name_add = document.getElementById("category_name_add").value;
    var category_text_add = document.getElementById("category_text_add").value;
    var category_name_aut = document.getElementsByClassName("display-name")[0].innerHTML;

    if (category_name_add === "") {
        swal({ title: "Warning", text: "Category Name cannot be empty!", icon: "warning" })
    }
    else {
        if (category_text_add === "") {
            swal({ title: "Warning", text: "Category Text cannot be empty!", icon: "warning" })
        }
        else {
            fetch('' + url() + 'api/getdata.php', {
                method: 'POST',
                headers: { "Content-type": "application/json;charset=UTF-8" },
                body: JSON.stringify({ status: "get_cetegory_control", category: category_name_add })
            }).then(response => response.text()).then(succses => {

                const d = JSON.parse(succses);
                if (d.status === true) {
                    swal({ title: "Warning", text: "There is a Category with the Same Name!", icon: "warning" })
                }
                else {

                    log_set("Added category <b style=\"color:#198754\">&nbsp;" + category_name_add + "</b>", "insert")
                    fetch('' + url() + 'api/setdata.php', {
                        method: 'POST',
                        headers: { "Content-type": "application/json;charset=UTF-8" },
                        body: JSON.stringify({ status: "set_category", name: category_name_add, text: category_text_add, auth: category_name_aut })
                    }).then(response => response.text()).then(s => {
                        swal("Good job!", "File Added!", "success");
                        document.getElementById("category_name_add").value = "";
                        document.getElementById("category_text_add").value = "";
                        document.getElementById("categorymodal").classList.remove("show")
                        categories_get();
                    });
                }
            });
        }
    }

}
function category_del(e) {


    var id = e.split(",")[0]
    var na = e.split(",")[1]
    console.log(na)
    swal({
        title: "Are you sure?",
        text: "If you delete this category, all linked top lists will be disbanded!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            log_set("Category <b style=\"color:#dc3545\">&nbsp;" + na + " &nbsp;</b> Delete", "delete")
            fetch('' + url() + 'api/putdata.php', {
                method: 'POST',
                headers: { "Content-type": "application/json;charset=UTF-8" },
                body: JSON.stringify({ status: "put_category", id: id })
            }).then(response => response.text()).then(s => {
                swal("Good job!", "File Delete!", "success");
                categories_get();
            });

        }
    });
}
function category_se(e) {
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



