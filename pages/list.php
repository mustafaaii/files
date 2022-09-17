<div class="row">
    <div class="col-12 mt-3">

        <div class="row ">
            <div class="col-8 pl-0">
                <div style="font-size:18px;font-weight:600;color:#a8a8a8">File List</div>
            </div>
            <div class="col-4 pr-0">
                <button class="btn btn-danger btn-sm rounded-none float-right hidden"><i class="fa-solid fa-trash-can mr-2" style="font-size: 12px;"></i>&nbsp;All Delete</button>
            </div>

            <div class="col-[26] pl-0 mt-2">
                <input onkeyup="file_se(event.target.value)"  type="text" class="form-control" placeholder="Search within a table" style="border-color: #dee2e6;border-radius:0px;padding-left:30px;height:35px" />
                <i class="fa-solid fa-magnifying-glass" style="margin-top:-24px;position:absolute;margin-left:10px;color:#a8a8a8"></i>
            </div>
            <div class="col-[12] pl-0 mt-2">
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
            <div class="col-[12] pl-0 mt-2">
                <select id="category" class="form-control" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px">
                </select>
            </div>
            <div class="col-[12] pl-0 mt-2">
                <input type="date" class="form-control" placeholder="Search within a table" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px" />
            </div>
            <div class="col pl-0 pr-0 mt-2">
                <button class="btn btn-danger btn-sm rounded-none hidden" style="border-color: #dee2e6;border-radius:0px;height:35px;margin-top:-1px">
                    Reset Filter
                </button>
            </div>
            <table class="table table-bordered mt-2">
                <thead style="background-color:#f1f1f1;">
                    <tr>
                        <th class="h-6 col-[4] text-sm text-center">Id</th>
                        <th class="h-6 col-[22] text-sm">Name</th>
                        <th class="h-6 col-[28] text-sm">Category</th>
                        <th class="h-6 col-[6] text-sm text-center">File</th>
                        <th class="h-6 col-[8] text-sm text-center">Size</th>
                        <th class="h-6 col-[8] text-sm text-center">Date</th>
                        <th class="h-6 col-[8] text-sm text-center">Author's Name</th>
                        <th class="h-6 col-[10] text-sm text-center">Operation</th>
                    </tr>
                </thead>
                <tbody id="file_table"></tbody>
            </table>
            <div id="loader"></div>
            <div id="empty_data"></div>
        </div>
    </div>
</div>