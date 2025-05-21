$(document).ready(function () {
    $("#search_text").keypress(function (e) {
        if (e.which == 13) {
            $('.data-table-list').bootstrapTable('refresh');
        }
    });

});

function searchQueryParams(params) {
    params.status = $("#status").val();
    params.text = $("#search_text").val();
    return params;
}

function refresh() {
    $('.data-table-list').bootstrapTable('refresh');
}

function close_popUp(name) {
    $('#' + name).modal('hide');
}

function DeleteData(id) {
    $.ajax({
        url: "views/navigation/ajax.php",
        type: "post",
        data: {
            "method": "form_delete",
            "id": id
        },
        beforeSend: function () {
            // $('#wait_process').show();
        },
        complete: function () {
            // $('#wait_process').hide();
        },
        success: function (data) {
            $('#modal_content_del').html(data);
            $('#modalDel').modal('show');
        }
    }).done(function (data) {

    }).fail(function (jqXHR, textStatus) {

    });
}