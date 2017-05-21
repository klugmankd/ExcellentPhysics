$(function () {
    selectTopics();
});

function selectTopics() {
    $.ajax({
        url: 'TopicController/readAllAction',
        response: 'text',
        success: function (data) {
            $("#practiceBlock").html(data);
            $(".topic").click(function () {
                var topic = $(this).attr("id").replace(/[^0-9]/g, "");
                selectSections(topic);
            })
        }
    })
}

function selectSections(topic) {
    $.ajax({
        type: 'GET',
        url: 'SectionController/readAllAction',
        data: {id: topic},
        response: 'text',
        success: function (data) {
            $("#practiceBlock").html(data);
            $("#goBack").click(function () {
                selectTopics();
            });
            $(".section").click(function () {
                var section = $(this).attr("id").replace(/[^0-9]/g, "");
                $.ajax({
                    type: 'GET',
                    url: 'TaskController/readAllAction',
                    data: {id: section},
                    response: 'text',
                    success: function (data) {
                        $("#practiceBlock").html(data);
                        $(".task").click(function () {
                            var task = $(this).attr("id").replace(/[^0-9]/g, "");
                            $.ajax({
                                type: 'GET',
                                url: 'TaskController/readAction',
                                data: {
                                    id: task,
                                    section: section
                                },
                                response: 'text',
                                success: function (data) {
                                    $("#practiceBlock").html(data);
                                    checkAnswer(task);
                                    $("#goBack").click(function () {
                                        selectSections(topic);
                                    });
                                    readLastOrNext(topic);
                                }
                            })
                        });
                        $("#goBack").click(function () {
                            selectSections(topic);
                        });
                        readLastOrNext(topic);
                    }
                })
            })
        }
    })
}

function checkAnswer(task) {
    $("#checkAnswer").click(function () {
        var answer = $("input[name='answer']").val();
        $.ajax({
            type: 'GET',
            url: 'TaskController/checkAnswerAction',
            data: {
                'id': task,
                'answer': answer
            },
            response: 'text',
            success: function (data) {
                $('#result').html(data);
            }
        })
    });
}

function readLastOrNext(section) {
    $(".last").click(function () {
        var id = $(this).attr("id").replace(/[^0-9]/g, "");
        $.ajax({
            type: 'GET',
            url: 'TaskController/readAction',
            data: {
                'id': id,
                'section': section
            },
            response: 'text',
            success: function (data) {
                $("#practiceBlock").html(data);
                checkAnswer(id);
                readLastOrNext(section);
                $("#goBack").click(function () {
                    selectSections(section);
                });
            }
        })
    });

    $(".next").click(function () {
        var id = $(this).attr("id").replace(/[^0-9]/g, "");
        $.ajax({
            type: 'GET',
            url: 'TaskController/readAction',
            data: {
                'id': id,
                'section': section
            },
            response: 'text',
            success: function (data) {
                $("#practiceBlock").html(data);
                checkAnswer(id);
                readLastOrNext(section);
                $("#goBack").click(function () {
                    selectSections(section);
                });
            }
        })
    })
}
