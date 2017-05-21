$(function () {
    showTest();
});

function showTest() {
    $.ajax({
        type: 'GET',
        url: 'TestsController/readAction',
        data: {'id': '1'},
        response: 'text',
        success: function (data) {
            $('#testsBlock').html(data);
            $('.answer').click(function () {
                var choiceAnswer = $(this).attr("id").replace(/[^0-9]/g, "");
                $.ajax({
                    type: 'POST',
                    url: 'TestsController/checkAction',
                    data: {
                        'idAnswer': choiceAnswer
                    },
                    response: 'text',
                    success: function (data) {
                        $('#result').html(data)
                    }
                })
            })
        }
    })
}