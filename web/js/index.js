$(function () {
    // $(".menuButton").click(function () {
    //    var to = $(this).val();
    //    $.scrollTo(to, 1300);
    // });
    $("#checkTest").click(function () {
        checkTest();
        $('html, body').animate({
            scrollTop: $("#main").offset().top-50
        }, 1000);
    });
    $("#goBackButton").show(300);
    $(".paragraph").click(function () {
        var topic = $("h3").attr('id').replace(/[^0-9]/g, "");
        var paragraph = $(this).attr('id').replace(/[^0-9]/g, "");
        selectParagraph(topic, paragraph);
        $("#goBackButton").show(300);
        $('html, body').animate({
            scrollTop: $("#main").offset().top-50
        }, 1000);

    });
    $(".section").click(function () {
        var topic = $("h3").attr('id').replace(/[^0-9]/g, "");
        var section = $(this).attr('id').replace(/[^0-9]/g, "");
        selectSection(topic, section);
        $("#goBackButton").show(300);
        $('html, body').animate({
            scrollTop: $("#main").offset().top-50
        }, 1000);
    });

    $(".scrollToElement").click(function () {
        var to = $(this).attr('id').replace(/[^0-9]/g, "");
        var toPlace = '#section' + to;
        $('html, body').animate({
            scrollTop: $(toPlace).offset().top-50
        }, 1000);
    });
});

function checkTest() {
    var answers = {};
    var answer, question;
    for (var number = 1; number <= 4; number++) {
        answer = $("input[name='question" + number + "']").val();
        question = $("input[name='number" + number + "']").val();
        answers['answer' + number] = answer;
        answers['questionNumber' + number] = question;
    }
    $.ajax({
        type: 'GET',
        url: 'TestsController/checkAction',
        data: answers,
        response: 'text',
        success: function (data) {
            $("#testsBlock").html(data);
        }
    });
}

function selectTask(topic, task, section) {
    $.ajax({
        type: 'GET',
        url: '../../TaskController/readAction',
        data: {
            'task': task,
            'section': section
        },
        response: 'text',
        success: function (data) {
            $("#main").html(data);
            $("#taskBlock").animate({"opacity": 1}, 1000);
            readLastOrNextTask(topic, section);
            $("#goBackButton").show(300);
            $("#goBackButton").click(function () {
                selectSection(topic, section)
            });
            $("input[name='answer']").bind("change keyup input", function() {
                $('#check').animate({"opacity": 1}, 300);
            });
            $('#check').click(function () {
                var task = $("h3").attr('id').replace(/[^0-9]/g, "");
                var answer = $("input[name='answer']").val();
                checkAnswer(task, answer, topic, section);
            })
        }
    })
}

function selectParagraph(topic, paragraph) {
    $.ajax({
        type: 'GET',
        url: '../../ParagraphController/readAction',
        data: {
            'topic': topic,
            'paragraph': paragraph
        },
        response: 'text',
        success: function (data) {
            $("#main").html(data);
            readLastOrNext(topic);
            $("#goBackButton").show(300)
        }
    })
}

function selectSection(topic, section) {
    $.ajax({
        type: 'GET',
        url: '../../TaskController/readAllAction',
        data: {
            'topic': topic,
            'section': section
        },
        response: 'text',
        success: function (data) {
            $("#main").html(data);
            $(".task").click(function () {
                var id = $(this).attr("id").replace(/[^0-9]/g, "");
                selectTask(topic, id, section);
            });
            $("#goBackButton").show(300)
        }
    })
}

function checkAnswer(task, answer, topic, section) {
    $.ajax({
        type: 'GET',
        url: '../../TaskController/checkAnswerAction',
        data: {
            'task': task,
            'answer': answer
        },
        response: 'text',
        success: function (data) {
            $("#result").html(data);
            $("#resultSection").show(300);
            $("#goBackButton").show(300);
            $('html, body').animate({
                scrollTop: $("#resultSection").offset().top-50
            }, 1000);
            $("#goBackButton").click(function () {
                selectSection(topic, section)
            });
            $('#check').click(function () {
                var newAnswer = $("input[name='answer']").val();
                checkAnswer(task, newAnswer, topic, section);
            })
        }
    })
}

function readLastOrNext(topic) {
    $(".last").click(function () {
        var id = $(this).attr("id").replace(/[^0-9]/g, "");
        $.ajax({
            type: 'GET',
            url: '../readAction',
            data: {
                'topic': topic,
                'paragraph': id
            },
            response: 'text',
            success: function (data) {
                $("#main").html(data);
                readLastOrNext(topic);
                $("#goBackButton").show(300);
                $('html, body').animate({
                    scrollTop: $("#main").offset().top-50
                }, 1000);

            }
        })
    });

    $(".next").click(function () {
        var id = $(this).attr("id").replace(/[^0-9]/g, "");
        $.ajax({
            type: 'GET',
            url: '../readAction',
            data: {
                'topic': topic,
                'paragraph': id
            },
            response: 'text',
            success: function (data) {
                $("#main").html(data);
                $('html, body').animate({
                    scrollTop: $("#main").offset().top-50
                }, 1000);
                readLastOrNext(topic);
                $("#goBackButton").show(300)

            }
        })
    })
}

function readLastOrNextTask(topic, section) {
    $(".last").click(function () {
        var id = $(this).attr("id").replace(/[^0-9]/g, "");
        $.ajax({
            type: 'GET',
            url: '../../TaskController/readAction',
            data: {
                'task': id,
                'section': section
            },
            response: 'text',
            success: function (data) {
                $("#main").html(data);
                $('html, body').animate({
                    scrollTop: $("#main").offset().top-50
                }, 1000);
                $("#taskBlock").animate({"opacity": 1}, 200);
                readLastOrNextTask(topic, section);
                $("#goBackButton").show(300);
                $("#goBackButton").click(function () {
                    selectSection(topic, section)
                });
                $("input[name='answer']").bind("change keyup input", function() {
                    $('#check').animate({"opacity": 1}, 300);
                });
                $('#check').click(function () {
                    var task = $("h3").attr('id').replace(/[^0-9]/g, "");
                    var answer = $("input[name='answer']").val();
                    checkAnswer(task, answer, topic, section);
                })
            }
        })
    });

    $(".next").click(function () {
        var id = $(this).attr("id").replace(/[^0-9]/g, "");
        $.ajax({
            type: 'GET',
            url: '../../TaskController/readAction',
            data: {
                'task': id,
                'section': section
            },
            response: 'text',
            success: function (data) {
                $("#main").html(data);
                $('html, body').animate({
                    scrollTop: $("#main").offset().top-50
                }, 1000);
                $("#taskBlock").animate({"opacity": 1}, 200);
                readLastOrNextTask(topic, section);
                $("#goBackButton").show(300);
                $("#goBackButton").click(function () {
                    selectSection(topic, section)
                });
                $("input[name='answer']").bind("change keyup input", function() {
                    $('#check').animate({"opacity": 1}, 300);
                });
                $('#check').click(function () {
                    var task = $("h3").attr('id').replace(/[^0-9]/g, "");
                    var answer = $("input[name='answer']").val();
                    checkAnswer(task, answer, topic, section);
                })
            }
        })
    })
}
