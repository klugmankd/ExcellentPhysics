$(function () {
    var topic, paragraph;
    // selectTopics();
});


$(".topic").click(function () {
    var topic = $(this).attr("id").replace(/[^0-9]/g, "");
    selectParagraphs(topic);
    // $.ajax({
    //     type: 'GET',
    //     url: 'ParagraphController/readAllAction',
    //     data: {'id': topic},
    //     response: 'text',
    //     success: function (data) {
    //         $('html').html(data).show(100);
    //         // $(".paragraph").click(function () {
    //         //     var paragraph = $(this).attr("id").replace(/[^0-9]/g, "");
    //         //     alert(paragraph);
    //         // })
    //     }
    // });
});

function goHome() {
    $.ajax({
        url: 'PageController/homeAction',
        response: 'text',
        success: function (data) {
            $('html').html(data).show(100);
        }
    });
}

function selectTopics() {
    $.ajax({
        url: 'TopicController/readAllAction',
        response: 'text',
        success: function (data) {
            $('html').html(data);
            $(".topic").click(function () {
                var topic = $(this).attr("id").replace(/[^0-9]/g, "");
                selectParagraphs(topic);
            });
            $("#goBack").click(function () {
               goHome();
            })
        }
    })
}

function selectParagraphs(topic) {
    $.ajax({
        type: 'GET',
        url: 'ParagraphController/readAllAction',
        data: {id: topic},
        response: 'text',
        success: function (data) {
            $("html").html(data);
            $("#goBack").click(function () {
                selectTopics();
            });
            $(".paragraph").click(function () {
                var paragraph = $(this).attr("id").replace(/[^0-9]/g, "");
                // alert(paragraph);
                $.ajax({
                    type: 'GET',
                    url: 'ParagraphController/readAction',
                    data: {
                        id: paragraph,
                        topic: topic
                    },
                    response: 'text',
                    success: function (data) {
                        $("#main").html(data);
                        $("#goBack").click(function () {
                            selectParagraphs(topic);
                        });
                        readLastOrNext(topic);
                    }
                })
            })
        }
    })
}

function readLastOrNext(topic) {
    $(".last").click(function () {
        var id = $(this).attr("id").replace(/[^0-9]/g, "");
        $.ajax({
            type: 'GET',
            url: 'ParagraphController/readAction',
            data: {
                'id': id,
                'topic': topic
            },
            response: 'text',
            success: function (data) {
                $("#main").html(data);
                readLastOrNext(topic);
                $("#goBack").click(function () {
                    selectParagraphs(topic);
                });
            }
        })
    });

    $(".next").click(function () {
        var id = $(this).attr("id").replace(/[^0-9]/g, "");
        $.ajax({
            type: 'GET',
            url: 'ParagraphController/readAction',
            data: {
                'id': id,
                'topic': topic
            },
            response: 'text',
            success: function (data) {
                $("#main").html(data);
                readLastOrNext(topic);
                $("#goBack").click(function () {
                    selectParagraphs(topic);
                });
            }
        })
    })
}
