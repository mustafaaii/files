<?php
front();
function front()
{


?>

    <link rel="stylesheet" href="http://localhost:8080/wp-content/plugins/filer/assets/css/style.app.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/brands.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css" />

    <div class="col-10 p-0">
        <div class="alert alert-primary h-35 pt-1 pb-0 w-[100] hidden" style="background-color:#4f46e5;color:#fff;padding-left:10px;border-radius:0px" role="alert">
            <i class="fa-solid fa-circle-info mt-1 mr-2"></i>
            This is a primary alert—check it out!
            <i class="fa-solid fa-circle-xmark float-right mt-1"></i>
        </div>
    </div>

    <div class="container">
        <div class="row mt-3">
            <div class="col-10">
                <div class="row h-35" style="margin-right:0px;">
                    <div class="col p-0">
                        <button class="btn btn-sm col-[100] text-sm" style="background-color:#6c757d;color:#fff;border-radius:0px;height:35px;">
                            <i class="fa-solid fa-bolt mr-2"></i>
                            Select File
                        </button>
                    </div>
                    <div class="col-3">
                        <div class="form-control text-sm" style="border-radius:0px;height:35px;">
                            Selected File Name
                        </div>
                    </div>
                    <div class="col-6">
                        <div onclick="dropdown_select()" name="multiple_select" id="multiple_select" class="form-control cursor-pointer p-0" style="border-radius:0px;height:35px;float:left;background-color:#fff;position: relative;z-index: 9;"></div>
                        <i id="option_arrow" class="fa-solid fa-caret-down" style="position: relative;float: right;justify-content: right;margin-top: -24px;margin-right: 10px;z-index: 99999;"></i>
                        <div id="hidden_select" class="row option" style="margin-right: 0px;"></div>
                    </div>
                    <div class="col p-0">
                        <button class="btn  btn-sm" style="background-color:#4f46e5;color:#fff;border-radius:0px;height:35px;">
                            <i class="fa-solid fa-cloud-arrow-up mr-2"></i>
                            Upload
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-sm  float-right" style="background-color:#8c8c8c;color:#fff;border-radius:0px;height:35px;">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i>Logout
                </button>
                <button class="btn btn-sm  float-right mr-2" style="background-color:#8c8c8c;color:#fff;border-radius:0px;height:35px;">
                    <i class="fa-solid fa-toolbox mr-2"></i>Admin
                </button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="row h-35" style="margin-right:0px;">
                    <div class="col-4 p-0">
                        <input type="text" class="form-control" placeholder="Search within a table" onkeyup="category_se(event.target.value)" style="border-color: #dee2e6;border-radius:0px;padding-left:30px;height:35px" />
                        <i class="fa-solid fa-magnifying-glass" style="margin-top:-24px;position:absolute;margin-left:10px;color:#a8a8a8"></i>
                    </div>
                    <div class="col-2">
                        <select class="form-select" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px">
                            <option>Category</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                            <option value="250">250</option>
                            <option value="300">300</option>
                            <option value="350">350</option>
                            <option value="400">400</option>
                            <option value="450">450</option>
                            <option value="1000">All</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <select class="form-select" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px">
                            <option>Show By Number</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                            <option value="250">250</option>
                            <option value="300">300</option>
                            <option value="350">350</option>
                            <option value="400">400</option>
                            <option value="450">450</option>
                            <option value="1000">All</option>
                        </select>
                    </div>
                    <div class="col p-0">
                        <input type="date" class="form-control" placeholder="Search within a table" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px" />
                    </div>
                    <div class="col p-0">
                        <button class="btn  btn-sm float-right" style="background-color:#4f46e5;color:#fff;border-radius:0px;height:35px;">
                            <i class="fa-solid fa-cloud-arrow-up mr-2"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </div>

        </div>


        <div class="row mt-5" style="margin-right: 0px;">
            <div class="col-6">
                <div class="row">
                    <div class="col-12 bg-gray h-[40] items-center display-flex border justify-content-center">
                        Category Name
                    </div>
                    <div class="col-12 items-center display-flex h-[40] border justify-content-center">
                        Category Text
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="row" style="margin-right: 0px;">
                            <div class="col-1 border h-[40] items-center display-flex justify-content-center">
                                1
                            </div>
                            <div class="col-5 border h-[40] items-center display-flex justify-content-center">
                                1
                            </div>
                            <div class="col-2 border h-[40] items-center display-flex justify-content-center">
                                1
                            </div>
                            <div class="col-2 border h-[40] items-center display-flex justify-content-center">
                                1
                            </div>
                            <div class="col-2 border h-[40] items-center display-flex justify-content-center">
                                1
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 bg-gray h-[40] items-center display-flex border justify-content-center">
                        Category Name
                    </div>
                    <div class="col-12 items-center display-flex h-[40] border justify-content-center">
                        Category Text
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="row" style="margin-right: 0px;">
                            <div class="col-1 border h-[40] items-center display-flex justify-content-center">
                                1
                            </div>
                            <div class="col-5 border h-[40] items-center display-flex justify-content-center">
                                1
                            </div>
                            <div class="col-2 border h-[40] items-center display-flex justify-content-center">
                                1
                            </div>
                            <div class="col-2 border h-[40] items-center display-flex justify-content-center">
                                1
                            </div>
                            <div class="col-2 border h-[40] items-center display-flex justify-content-center">
                                1
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="option_overlay" style="display: none;" class="option-overlay cursor-pointer" onclick="dropdown_select()"></div>
    </div>


    <script>
        function url() {
            const web = "http://localhost:8080";
            const url = "" + web + "/wp-content/plugins/filer/";
            return url;
        }
        var st = 0;
        const data = [];
        dropdown_list();

        function dropdown_list() {
            fetch('' + url() + 'api/getdata.php', {
                method: 'POST',
                headers: {
                    "Content-type": "application/json;charset=UTF-8"
                },
                body: JSON.stringify({
                    status: "get_cetegory"
                })
            }).then(response => response.text()).then(success => {
                const d = JSON.parse(success);
                var status = "";
                var seldat = []
                document.getElementById("hidden_select").innerHTML = "";
                d.data.map((item, index) => {

                    if (data[index] === item.category) {
                        status = "disabled"
                    } else {
                        status = ""
                    }

                    return (document.getElementById("hidden_select").innerHTML += "<button value=\"" + item.category + "\" onclick=\"select_item(event.target.value)\" class=\"col-12 min-h-40 border display-flex items-center select-hover\" style=\"background-color:#fff\" " + status + " >" + item.category + "</button>")


                })
            });
        }

        function dropdown_select() {
            st++;
            if (st === 1) {
                document.getElementById("option_overlay").style.display = "block";
                document.getElementById("hidden_select").setAttribute("class", "row option shadow-sm active")
            } else {
                document.getElementById("option_overlay").style.display = "none";
                document.getElementById("hidden_select").setAttribute("class", "row option")
                st = 0
            }
        }
        document.addEventListener("keydown", function(event) {
            if (event.which === 27) {
                document.getElementById("hidden_select").setAttribute("class", "row option")
            }
        })

        function select_item(e) {

            data.push(e);
            document.getElementById("multiple_select").innerHTML = "";
            data.map((item) => {
                return document.getElementById("multiple_select").innerHTML += "" +
                    "<div id=\"badge" + item + "\" class=\"badge   rounded-none  mr-2  \" style=\"background-color:#4f46e5;border-radius:0px;position: relative;z-index: 9;height: 33px;width:100px\">" +

                    "<div class=\"row items-center display-flex h-[20] \" style=\"margin-right:0px\">" +
                    "<div class=\"col-[70] mr-1 p-0 float-right\">" +
                    "" + item + "" +
                    "</div>" +
                    "<div class=\"col-[30]  p-0 \">" +
                    " <i class=\"fa-regular fa-circle-xmark float-right\" style=\"font-size:20px\" id=\"" + item + "\" onclick=\"remove_item(event.target.id)\"></i>" +
                    "</div>" +
                    "</div>" +

                    "</div>";
            })
            dropdown_list();
        }

        function remove_item(e) {

            const index = data.indexOf(e);
            if (index > -1) {
                data.splice(index, 1);
            }
            document.getElementById("badge" + e + "").remove();
            dropdown_list();
        }
    </script>






<?php
}
?>