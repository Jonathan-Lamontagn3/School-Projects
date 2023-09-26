
// Update the tags data list
function getTags() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (data) {
                    var tagTable = $('#tagData');
                    tagTable.empty();
                    $.each(data.tags, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                value.id +
                                '" data-type="edit" data-toggle="modal" data-target="#modalTagAddEdit">' +
                                'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                'onclick="return confirm(\'Are you sure to delete data?\') ?' +
                                'tagAction(\'delete\', \'' +
                                value.id +
                                '\') : false;">delete</a>' +
                                '</td></tr>';
                        tagTable.append('<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + value.definition + editDeleteButtons);

                    });

                }

    });
}

/* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function tagAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var tagData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalTagAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        tagData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        ajaxUrl = ajaxUrl + "/" + id;
        tagData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(tagData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">Tag data has been ' + statusArr[type] + ' successfully.</p>');
                getTags();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

// Fill the tag's data in the edit form
function editTag(id) {
    $.ajax({
        type: 'GET',
        url: urlToRestApi + "/" + id,
        dataType: 'JSON',
        //data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.tag.id);
            $('#name').val(data.tag.name);
            $('#definition').val(data.tag.definition);
        }
    });
}

// Actions on modal show and hidden events
$(function () {
    $('#modalTagAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var tagFunc = "tagAction('add');";
        $('.modal-title').html('Add new tag');
        if (type == 'edit') {
            var rowId = $(e.relatedTarget).attr('rowID');
            tagFunc = "tagAction('edit'," + rowId + ");";
            $('.modal-title').html('Edit tag');
            editTag(rowId);
        }
        $('#tagSubmit').attr("onclick", tagFunc);
    });

    $('#modalTagAddEdit').on('hidden.bs.modal', function () {
        $('#tagSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});



