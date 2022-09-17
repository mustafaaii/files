
tabs_menu();
function tabs_menu() {
    data = [
        {
            id: 0,
            name: "Dashboard",
            link: "" + url() + "wp-admin/admin.php?page=glowfile",
            icon: "<i class=\"fa-solid fa-gauge\"></i>",
        },
        {
            id: 1,
            name: "List",
            link: "" + url() + "wp-admin/admin.php?page=filelist",
            icon: "<i class=\"fa-regular fa-rectangle-list\"></i>",
        },
        {
            id: 2,
            name: "Category",
            link: "" + url() + "wp-admin/admin.php?page=filecategory",
            icon: "<i class=\"fa-solid fa-timeline\"></i>",
        },
        {
            id: 5,
            name: "Connect",
            link: "" + url() + "wp-admin/admin.php?page=fileconnect",
            icon: "<i class=\"fa-solid fa-circle-nodes\"></i>",
        },
        {
            id: 5,
            name: "Plugins",
            link: "" + url() + "wp-admin/admin.php?page=fileplugins",
            icon: "<i class=\"fa-solid fa-plug-circle-bolt\"></i>",
        },
    ];

    var active = "";
    data.map((item) => {

        if (window.location.href === item.link) {
            active = "active";
        }
        else {
            active = "";
        }

        return (
            document.getElementById("glow_tabs").innerHTML += "" +
            "<a class=\"btn btn-outline-secondary w-20 btn-sm gtb " + active + "\" href=\"" + item.link + "\">" +
            "" + item.icon + "&nbsp;&nbsp;" + item.name + "" +
            "</a>"
        )
    })



}


function tabs_action(data) {
    console.log(data)
    location.href = data;
}