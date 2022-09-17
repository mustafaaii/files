<div class="row">
    <div class="col-12 mt-3">

        <div class="row ">
            <div class="col-8 pl-0">
                <div style="font-size:18px;font-weight:600;color:#a8a8a8">File List</div>
            </div>
            <div class="col-4 pr-0">
                <button class="btn btn-danger btn-sm rounded-none float-right hidden">
                    <i class="fa-solid fa-trash-can mr-2" style="font-size: 12px;"></i>&nbsp;All Delete
                </button>
            </div>

            <div class="col-[26] pl-0 mt-2">
                <input type="text" class="form-control" placeholder="Search within a table" onkeyup="category_se(event.target.value)" style="border-color: #dee2e6;border-radius:0px;padding-left:30px;height:35px" />
                <i class="fa-solid fa-magnifying-glass" style="margin-top:-24px;position:absolute;margin-left:10px;color:#a8a8a8"></i>
            </div>
            <div class="col-[12] pl-0 mt-2 hidden">
                <select class="form-control" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px">
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
            <div class="col-[12] pl-0 mt-2 hidden">
                <input onchange="category_se(event.target.value)" type="date" class="form-control" placeholder="Search within a table" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px" />
            </div>
            <div class="col pl-0 pr-0 mt-2">
                <button class="btn btn-danger btn-sm rounded-none hidden" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px">
                    Reset Filter
                </button>
            </div>
            <div class="col pl-0 pr-0 mt-2">
                <button id="cate_add_btn" class="btn btn-primary btn-sm rounded-none float-right" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px" onclick="show_modal()">
                    <i class="fa-solid fa-square-plus"></i>&nbsp;&nbsp;Add Category
                </button>

                <button id="cate_del_btn" class="btn btn-danger btn-sm rounded-none float-right" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px;display:none">
                    <i class="fa-solid fa-square-plus"></i>&nbsp;&nbsp;All Delete
                </button>
            </div>
            <table class="table table-bordered mt-2">
                <thead style="background-color:#f1f1f1;">
                    <tr>
                        <th class="h-6 col-[4] text-sm text-center">Id</th>
                        <th class="h-6 col-[14] text-sm">Name</th>
                        <th class="h-6 col-[40] text-sm">Text</th>
                        <th class="h-6 col-[12] text-sm text-center">Create Date</th>
                        <th class="h-6 col-[12] text-sm text-center">Update Date</th>
                        <th class="h-6 col-[8] text-sm text-center">Author's Name</th>
                        <th class="h-6 col-[10] text-sm text-center">Operation</th>
                    </tr>
                </thead>
                <tbody id="cate_table"></tbody>
            </table>
            <div id="loader"></div>
            <div id="empty_data"></div>
        </div>
    </div>
</div>

<div id="modal_content"></div>

<div class="modal fade" id="categorymodal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered  shadow-md" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-body p-3">
                <div class="row" style="margin-right:0px ;">
                    <div class="col-12 mt-1 p-0">
                        <div class="row">
                            <div class="col-8 p-0">
                                <h5  class="modal-title" id="exampleModalCenterTitle">New Category</h5>
                            </div>
                            <div class="col-4 p-0">
                                <div class="cursor-pointer float-right" onclick="close_modal()">
                                    <i class="fa-regular fa-circle-xmark float-right" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4 p-0">
                        <input id="category_name_add" type="text" class="form-control" placeholder="Category Name" style="border-color: #dee2e6;border-radius:0px;height:35px" />
                    </div>
                    <div class="col-12 mt-2 p-0">
                        <textarea id="category_text_add" class="form-control" placeholder="Category Text" style="border-color: #dee2e6;border-radius:0px;"></textarea>
                    </div>
                    <div class="col-12 mt-4 p-0">
                        <button onclick="close_modal()" class="btn btn-secondary btn-sm rounded-none float-right mr-2" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px" data-toggle="modal" data-target="#exampleModalCenter" onclick="show_modal()">
                            Close
                        </button>
                        <button onclick="category_add()" class="btn btn-primary btn-sm rounded-none float-right mr-2" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px">
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>