$(document).ready(function() {
    db.transaction(queryDB, errorCB);

    $('#btn_submit_yes').click(function(event) {
        submitquiz();
    });
});
/*$(document).on("pagebeforechange", function(e, data) {
    if (typeof data.toPage === "string") {
        if (data.toPage === "#quiz1") {
            var value = $("#list_choices1 :radio:checked").val();
            console.log(value);
            if (value === undefined || value === null) {
                alert('Please select an answer!');
                e.preventDefault();
            }
        } else if (data.toPage === "#quiz2") {
            var value = $("#list_choices2 :radio:checked").val();
            console.log(value);
            if (value === undefined || value === null) {
                alert('Please select an answer!');
                e.preventDefault();
            }
        } else if (data.toPage === "#quiz3") {
            var value = $("#list_choices3 :radio:checked").val();
            console.log(value);
            if (value === undefined || value === null) {
                alert('Please select an answer!');
                e.preventDefault();
            }
        } else if (data.toPage.indexOf("quiz4")) {
            var value = $("#list_choices4 :radio:checked").val();
            if (value === undefined || value === null) {
                alert('Please select an answer!');
                e.preventDefault();
            }
        } else if (data.toPage.indexOf("quiz5")) {
            var value = $("#list_choices5 :radio:checked").val();
            if (value === undefined || value === null) {
                alert('Please select an answer!');
                e.preventDefault();
            }
        } else if (data.toPage.indexOf("quiz6")) {
            var value = $("#list_choices6 :radio:checked").val();
            if (value === undefined || value === null) {
                alert('Please select an answer!');
                e.preventDefault();
            }
        } else if (data.toPage.indexOf("quiz7")) {
            var value = $("#list_choices7 :radio:checked").val();
            if (value === undefined || value === null) {
                alert('Please select an answer!');
                e.preventDefault();
            }
        } else if (data.toPage.indexOf("quiz8")) {
            var value = $("#list_choices8 :radio:checked").val();
            if (value === undefined || value === null) {
                alert('Please select an answer!');
                e.preventDefault();
            }
        } else if (data.toPage.indexOf("quiz9")) {
            var value = $("#list_choices9 :radio:checked").val();
            if (value === undefined || value === null) {
                alert('Please select an answer!');
                e.preventDefault();
            }
        }
    }
});
*/

function shuffle(array) {
    var tmp, current, top = array.length;

    if (top)
        while (--top) {
            current = Math.floor(Math.random() * (top + 1));
            tmp = array[current];
            array[current] = array[top];
            array[top] = tmp;
        }

    return array;
}

function queryDB(tx) {
    var value = window.localStorage.getItem("sSQL");
    console.log('sSQL: ' + value);
    tx.executeSql(value, [], querysuccessfull, errorCB);
};

function errorCB(err) {
    console.log("Error processing SQL: " + err.code + ' ' + err.message);
}

function querysuccessfull(tx, result) {
    var len = result.rows.length;
    var resultArray = [];
    var questArr = [];

    for (var i = 0; i < result.rows.length; i += 1) {
        resultArray.push(result.rows.item(i));
    }

    var shuffledArray = shuffle(resultArray);

    for (var i = 0; i < shuffledArray.length; i++) {
        var quest = new Object();

        quest.No = i + 1;
        quest.page = ('quiz' + (i + 1));
        quest.ID = shuffledArray[i].ID;
        quest.question = shuffledArray[i].question;
        quest.qanswer1 = shuffledArray[i].qanswer1;
        quest.qanswer2 = shuffledArray[i].qanswer2;
        quest.qanswer3 = shuffledArray[i].qanswer3;
        quest.qanswer4 = shuffledArray[i].qanswer4;
        quest.answer = shuffledArray[i].answer;
        questArr[i] = quest;
    }
    window.localStorage['quiz'] = JSON.stringify(questArr);
    showquestion();
};

function showquestion() {
    console.log('showquestion');

    $.mobile.loading("show");

    var quiz = JSON.parse(window.localStorage['quiz'] || '{}');

    $('#res_question_1').empty();
    $('#res_question_2').empty();
    $('#res_question_3').empty();
    $('#res_question_4').empty();
    $('#res_question_5').empty();
    $('#res_question_6').empty();
    $('#res_question_7').empty();
    $('#res_question_8').empty();
    $('#res_question_9').empty();

    $('#res_your_1').empty();
    $('#res_your_2').empty();
    $('#res_your_3').empty();
    $('#res_your_4').empty();
    $('#res_your_5').empty();
    $('#res_your_6').empty();
    $('#res_your_7').empty();
    $('#res_your_8').empty();
    $('#res_your_9').empty();

    $('#res_answer_1').empty();
    $('#res_answer_2').empty();
    $('#res_answer_3').empty();
    $('#res_answer_4').empty();
    $('#res_answer_5').empty();
    $('#res_answer_6').empty();
    $('#res_answer_7').empty();
    $('#res_answer_8').empty();
    $('#res_answer_9').empty();

    $("#questionnumber1").text("Question " + quiz[0].No + ": ");
    $("#question1").text(quiz[0].question);
    $('#list_choices1 input:radio[id=radio-choice-1]').val(quiz[0].qanswer1);
    $('#list_choices1 input:radio[id=radio-choice-2]').val(quiz[0].qanswer2);
    $('#list_choices1 input:radio[id=radio-choice-3]').val(quiz[0].qanswer3);
    $('#list_choices1 input:radio[id=radio-choice-4]').val(quiz[0].qanswer4);
    $('#qanswer1-1').text(quiz[0].qanswer1);
    $('#qanswer2-1').text(quiz[0].qanswer2);
    $('#qanswer3-1').text(quiz[0].qanswer3);
    $('#qanswer4-1').text(quiz[0].qanswer4);

    $("#questionnumber2").text("Question " + quiz[1].No + ": ");
    $("#question2").text(quiz[1].question);
    $('#list_choices2 input:radio[id=radio-choice-1]').val(quiz[1].qanswer1);
    $('#list_choices2 input:radio[id=radio-choice-2]').val(quiz[1].qanswer2);
    $('#list_choices2 input:radio[id=radio-choice-3]').val(quiz[1].qanswer3);
    $('#list_choices2 input:radio[id=radio-choice-4]').val(quiz[1].qanswer4);
    $('#qanswer1-2').text(quiz[1].qanswer1);
    $('#qanswer2-2').text(quiz[1].qanswer2);
    $('#qanswer3-2').text(quiz[1].qanswer3);
    $('#qanswer4-2').text(quiz[1].qanswer4);

    $("#questionnumber3").text("Question " + quiz[2].No + ": ");
    $("#question3").text(quiz[2].question);
    $('#list_choices3 input:radio[id=radio-choice-1]').val(quiz[2].qanswer1);
    $('#list_choices3 input:radio[id=radio-choice-2]').val(quiz[2].qanswer2);
    $('#list_choices3 input:radio[id=radio-choice-3]').val(quiz[2].qanswer3);
    $('#list_choices3 input:radio[id=radio-choice-4]').val(quiz[2].qanswer4);
    $('#qanswer1-3').text(quiz[2].qanswer1);
    $('#qanswer2-3').text(quiz[2].qanswer2);
    $('#qanswer3-3').text(quiz[2].qanswer3);
    $('#qanswer4-3').text(quiz[2].qanswer4);

    $("#questionnumber4").text("Question " + quiz[3].No + ": ");
    $("#question4").text(quiz[3].question);
    $('#list_choices4 input:radio[id=radio-choice-1]').val(quiz[3].qanswer1);
    $('#list_choices4 input:radio[id=radio-choice-2]').val(quiz[3].qanswer2);
    $('#list_choices4 input:radio[id=radio-choice-3]').val(quiz[3].qanswer3);
    $('#list_choices4 input:radio[id=radio-choice-4]').val(quiz[3].qanswer4);
    $('#qanswer1-4').text(quiz[3].qanswer1);
    $('#qanswer2-4').text(quiz[3].qanswer2);
    $('#qanswer3-4').text(quiz[3].qanswer3);
    $('#qanswer4-4').text(quiz[3].qanswer4);

    $("#questionnumber5").text("Question " + quiz[4].No + ": ");
    $("#question5").text(quiz[4].question);
    $('#list_choices5 input:radio[id=radio-choice-1]').val(quiz[4].qanswer1);
    $('#list_choices5 input:radio[id=radio-choice-2]').val(quiz[4].qanswer2);
    $('#list_choices5 input:radio[id=radio-choice-3]').val(quiz[4].qanswer3);
    $('#list_choices5 input:radio[id=radio-choice-4]').val(quiz[4].qanswer4);
    $('#qanswer1-5').text(quiz[4].qanswer1);
    $('#qanswer2-5').text(quiz[4].qanswer2);
    $('#qanswer3-5').text(quiz[4].qanswer3);
    $('#qanswer4-5').text(quiz[4].qanswer4);

    $("#questionnumber6").text("Question " + quiz[5].No + ": ");
    $("#question6").text(quiz[5].question);
    $('#list_choices6 input:radio[id=radio-choice-1]').val(quiz[5].qanswer1);
    $('#list_choices6 input:radio[id=radio-choice-2]').val(quiz[5].qanswer2);
    $('#list_choices6 input:radio[id=radio-choice-3]').val(quiz[5].qanswer3);
    $('#list_choices6 input:radio[id=radio-choice-4]').val(quiz[5].qanswer4);
    $('#qanswer1-6').text(quiz[5].qanswer1);
    $('#qanswer2-6').text(quiz[5].qanswer2);
    $('#qanswer3-6').text(quiz[5].qanswer3);
    $('#qanswer4-6').text(quiz[5].qanswer4);

    $("#questionnumber7").text("Question " + quiz[6].No + ": ");
    $("#question7").text(quiz[6].question);
    $('#list_choices7 input:radio[id=radio-choice-1]').val(quiz[6].qanswer1);
    $('#list_choices7 input:radio[id=radio-choice-2]').val(quiz[6].qanswer2);
    $('#list_choices7 input:radio[id=radio-choice-3]').val(quiz[6].qanswer3);
    $('#list_choices7 input:radio[id=radio-choice-4]').val(quiz[6].qanswer4);
    $('#qanswer1-7').text(quiz[6].qanswer1);
    $('#qanswer2-7').text(quiz[6].qanswer2);
    $('#qanswer3-7').text(quiz[6].qanswer3);
    $('#qanswer4-7').text(quiz[6].qanswer4);

    $("#questionnumber8").text("Question " + quiz[7].No + ": ");
    $("#question8").text(quiz[7].question);
    $('#list_choices8 input:radio[id=radio-choice-1]').val(quiz[7].qanswer1);
    $('#list_choices8 input:radio[id=radio-choice-2]').val(quiz[7].qanswer2);
    $('#list_choices8 input:radio[id=radio-choice-3]').val(quiz[7].qanswer3);
    $('#list_choices8 input:radio[id=radio-choice-4]').val(quiz[7].qanswer4);
    $('#qanswer1-8').text(quiz[7].qanswer1);
    $('#qanswer2-8').text(quiz[7].qanswer2);
    $('#qanswer3-8').text(quiz[7].qanswer3);
    $('#qanswer4-8').text(quiz[7].qanswer4);

    $("#questionnumber9").text("Question " + quiz[8].No + ": ");
    $("#question9").text(quiz[8].question);
    $('#list_choices9 input:radio[id=radio-choice-1]').val(quiz[8].qanswer1);
    $('#list_choices9 input:radio[id=radio-choice-2]').val(quiz[8].qanswer2);
    $('#list_choices9 input:radio[id=radio-choice-3]').val(quiz[8].qanswer3);
    $('#list_choices9 input:radio[id=radio-choice-4]').val(quiz[8].qanswer4);
    $('#qanswer1-9').text(quiz[8].qanswer1);
    $('#qanswer2-9').text(quiz[8].qanswer2);
    $('#qanswer3-9').text(quiz[8].qanswer3);
    $('#qanswer4-9').text(quiz[8].qanswer4);


    $.mobile.loading("hide");
};

function submitquiz() {
    var quiz = JSON.parse(window.localStorage['quiz'] || '{}');

    var answer1 = $("#list_choices1 :radio:checked").val();
    var trueanswer1 = quiz[0].answer;
    var question1 = quiz[0].question;

    var answer2 = $("#list_choices2 :radio:checked").val();
    var trueanswer2 = quiz[1].answer;
    var question2 = quiz[1].question;

    var answer3 = $('#list_choices3 :radio:checked').val();
    var trueanswer3 = quiz[2].answer;
    var question3 = quiz[2].question;

    var answer4 = $("#list_choices4 :radio:checked").val();
    var trueanswer4 = quiz[3].answer;
    var question4 = quiz[3].question;

    var answer5 = $("#list_choices5 :radio:checked").val();
    var trueanswer5 = quiz[4].answer;
    var question5 = quiz[4].question;

    var answer6 = $("#list_choices6 :radio:checked").val();
    var trueanswer6 = quiz[5].answer;
    var question6 = quiz[5].question;

    var answer7 = $("#list_choices7 :radio:checked").val();
    var trueanswer7 = quiz[6].answer;
    var question7 = quiz[6].question;

    var answer8 = $("#list_choices8 :radio:checked").val();
    var trueanswer8 = quiz[7].answer;
    var question8 = quiz[7].question;

    var answer9 = $("#list_choices9 :radio:checked").val();
    var trueanswer9 = quiz[8].answer;
    var question9 = quiz[8].question;

    if (answer1 == trueanswer1) {
        score = score + 20;
        console.log('1 SCORE: ' + score);
    }

    if (answer2 == trueanswer2) {
        score = score + 20;
        console.log('2 SCORE: ' + score);
    }

    if (answer3 == trueanswer3) {
        score = score + 20;
        console.log('3 SCORE: ' + score);
    }

    if (answer4 == trueanswer4) {
        score = score + 20;
        console.log('4 SCORE: ' + score);
    }

    if (answer5 == trueanswer5) {
        score = score + 20;
        console.log('5 SCORE: ' + score);
    }

    if (answer6 == trueanswer6) {
        score = score + 20;
        console.log('6 SCORE: ' + score);
    }

    if (answer7 == trueanswer7) {
        score = score + 20;
        console.log('7 SCORE: ' + score);
    }

    if (answer8 == trueanswer8) {
        score = score + 20;
        console.log('8 SCORE: ' + score);
    }

    if (answer9 == trueanswer9) {
        score = score + 20;
        console.log('9 SCORE: ' + score);
    }

    $('#game_score').text(score);
	$('#game_point').text(score/10);

    $('#res_question_1').text(quiz[0].No + '. ' + quiz[0].question);
    $('#res_question_2').text(quiz[1].No + '. ' + quiz[1].question);
    $('#res_question_3').text(quiz[2].No + '. ' + quiz[2].question);
    $('#res_question_4').text(quiz[3].No + '. ' + quiz[3].question);
    $('#res_question_5').text(quiz[4].No + '. ' + quiz[4].question);
    $('#res_question_6').text(quiz[5].No + '. ' + quiz[5].question);
    $('#res_question_7').text(quiz[6].No + '. ' + quiz[6].question);
    $('#res_question_8').text(quiz[7].No + '. ' + quiz[7].question);
    $('#res_question_9').text(quiz[8].No + '. ' + quiz[8].question);

    $('#res_your_1').text($("#list_choices1 :radio:checked").val());
    $('#res_your_2').text($("#list_choices2 :radio:checked").val());
    $('#res_your_3').text($("#list_choices3 :radio:checked").val());
    $('#res_your_4').text($("#list_choices4 :radio:checked").val());
    $('#res_your_5').text($("#list_choices5 :radio:checked").val());
    $('#res_your_6').text($("#list_choices6 :radio:checked").val());
    $('#res_your_7').text($("#list_choices7 :radio:checked").val());
    $('#res_your_8').text($("#list_choices8 :radio:checked").val());
    $('#res_your_9').text($("#list_choices9 :radio:checked").val());

    $('#res_answer_1').text(quiz[0].answer);
    $('#res_answer_2').text(quiz[1].answer);
    $('#res_answer_3').text(quiz[2].answer);
    $('#res_answer_4').text(quiz[3].answer);
    $('#res_answer_5').text(quiz[4].answer);
    $('#res_answer_6').text(quiz[5].answer);
    $('#res_answer_7').text(quiz[6].answer);
    $('#res_answer_8').text(quiz[7].answer);
    $('#res_answer_9').text(quiz[8].answer);

    $.mobile.changePage($("#result"));

    setTimeout(function() {
        $('#popupScore').popup('open');
    }, 1000);
};
