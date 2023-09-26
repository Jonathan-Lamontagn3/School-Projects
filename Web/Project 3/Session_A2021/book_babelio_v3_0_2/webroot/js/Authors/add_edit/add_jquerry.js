$(document).ready(function () {
    $('#continent-id').on('change', function () {
        var continentId = $(this).val();
        if (continentId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'continent_id=' + continentId,
                success: function (nationalities) {
                    $select = $('#nationality-id');
                    $select.find('option').remove();
                    $.each(nationalities, function (key, value) {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>')
                        });
                    });
                }
            });
        } else {
            $('#nationality-id').html('<option value="">Select Continent first</option>');
        }
    });
});

