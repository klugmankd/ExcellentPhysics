$(function () {
    var user;
    $("#signUp").click(function () {
        user = {
            username: $("input[name='username']").val(),
            password: $("input[name='password']").val(),
            email: $("input[name='email']").val(),
            firstName: $("input[name='firstName']").val(),
            lastName: $("input[name='lastName']").val(),
            country: $("input[name='country']").val(),
            city: $("input[name='city']").val(),
            school: $("input[name='school']").val(),
            studyYear: $("input[name='studyYear']").val()
        };

        $.ajax({
            type: 'POST',
            url: 'UserController/createAction',
            data: user,
            response: 'text',
            success: function (data) {
                var buttonId = '#linkToSignIn';
                if (data) {
                    $('#signUp').attr('id', 'linkToSignIn');
                    $(buttonId).animate({"opacity": 0}, 300);
                    $(buttonId).removeClass("button icon fa-registered special 6u");
                    $(buttonId).addClass('button icon fa-sign-in alt 6u');
                    $(buttonId).attr('href', 'authorization');
                    $(buttonId).animate({"opacity": 1}, 1000);
                    $(buttonId).text('Перейти до входу');
                    console.log("ok");
                }
            }
        })
    });

    $("#signIn").click(function () {
        var section  = '#main';
        $(section).animate({"opacity": 0}, 500);

        user = {
            username: $("input[name='username']").val(),
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val()
        };

        $.ajax({
            type: 'POST',
            url: 'UserController/checkAction',
            data: user,
            response: 'text',
            success: function (data) {
                $(section).html(data).animate({"opacity": 1}, 900);
            }
        })
    })
});