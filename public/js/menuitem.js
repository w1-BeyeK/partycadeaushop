$("#submitMenuItem").on("click", function() {
    $.ajax({
        url: "/ajax/menu/" + getId() + "/update",
        type: "POST",
        data: $("#menuItemForm").serialize(),
        success: function() {
            $("#menuItemModal").modal("hide");
            location.reload();
        }
    })
});

function showEditModal(id) {
    get(id, function(data) {
        $("#menuItemModal").data("id", data.menu_item_id);
        $("#menuItemLabel").text(data.title);
        $("#title").val(data.title);
        $("#url").val(data.url);
        $("#menuItemModal").modal("show");
    })
}

function get(id, callback) {
    $.ajax({
        url: "/ajax/menu/item/" + id,
        type: "GET",
        success: function(result) {
            var data = JSON.parse(result);

            callback(data);
        },
        error: function() {
            return null;
        }
    })
}

function getId() {
    var id = $("#menuItemModal").data("id");
    if(id > 0) {
        return id;
    } else {
        return -1;
    }
}