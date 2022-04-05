$("#toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

// Javascript Dashboard

window.addEventListener("DOMContentLoaded", (event) => {
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

//  Sidebar Active
var header = document.getElementById("layoutSidenav_nav");
var btns = header.getElementsByClassName("nav-link");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

// End Javascript Dashboard

// Datatables Acc Admin

// $(document).ready(function () {
//     var table = $("#tableAdmin").DataTable({
//         paging: false,
//         ordering: false,
//         info: false,
//         searching: false,
//     });

//     table.on("click", ".edit", function () {
//         $tr = $(this).closest("tr");
//         if ($($tr).hassClass("child")) {
//             $tr = $tr.prev(".parent");
//         }

//         var data = table.row($tr).data();

//         $("#nama").val(data[1]);
//         $("#alamat").val(data[2]);
//         $("#email").val(data[3]);
//         $("#no_hp").val(data[4]);
//         $("#role").val(data[5]);

//         $("#editAkun-btn").attr("action", "/acc-admin" + data[0]);
//         $("#popupEditAcc").modal("show");
//     });
// });

// End Datatables Acc Admin

$("#popupEditAc").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var nama = button.data("nama");
    var alamat = button.data("alamat");
    var email = button.data("email");
    var no_hp = button.data("no_hp");
    var role = button.data("role");

    var modal = $(this);

    modal.find(".modal-title").text("Edit Akun");
    modal.find(".modal-body #nama").val(nama);
    modal.find(".modal-body #alamat").val(alamat);
    modal.find(".modal-body #email").val(email);
    modal.find(".modal-body #no_hp").val(no_hp);
    modal.find(".modal-body #role").val(role);
});
