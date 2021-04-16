var gameArr = new Array();
var score = 0;
var indexquestion = 0;
var countAnswer = 0;
var questionArray = [];
var sSQL = "";
var db = window.openDatabase("quizdb", "1.0", "iQuizIT", 1000000);

document.addEventListener("deviceready", onDeviceReady, false);


function onDeviceReady() {
    // if (db != null && db != undefined && db != "") {
    db.transaction(populatedb, errorCB, successCB);
    // }
}

$(document).ready(function() {
    // if (db != null && db != undefined && db != "") {
    db.transaction(populatedb, errorCB, successCB);
    // }
});


function successCB() {
    console.log("success!");
    // db.transaction(queryDB, errorCB);
}

function showinput() {
    $('#popupScore').popup('open');
}

function closeInput(transaction, resultSet) {
    $('#popupScore').popup('close');
    console.log('Query completed: ' + JSON.stringify(resultSet));
    // home();

}

function home() {
    window.location.href = 'index.html#type';
}

function goToHP() {
    window.location.href = 'index.html';
}

function closeApp() {
    console.log('closeApp');
    navigator.app.exitApp();
}

function leaderboard() {
    window.location.href = 'score.html';
}

function endgameload() {
    var itemscore = sessionStorage.getItem('yourscore');
    $("#game_score").innerHTML = itemscore;
}

function errorCDB(err) {
    var db = window.openDatabase("quizdb", "1.0", "iQuizIT", 1000000);
    db.transaction(CreateQuestions, errorCB, CreateQuestSuccessFul);
}

function errorCB(err) {
    console.log("Error processing SQL: " + err.code + ' ' + err.message);
}

function CreateQuestSuccessFul() {
    var db = window.openDatabase("quizdb", "1.0", "Quiz Database", 1000000);
    db.transaction(queryDB, errorCB);
}

function gameload(param, slesson) {

    localStorage.clear();

    window.localStorage.setItem('lesson', slesson);

    console.log('param: ', param);

    if (param == 'quiz') {
        sSQL = 'SELECT * FROM quiztbl WHERE lesson_id="4";';
        window.localStorage.setItem("sSQL", sSQL);
        window.localStorage.setItem("param", param);
        window.location.href = 'quiz.html';
 //   } else if (param == 'config') {
 //       sSQL = 'SELECT * FROM quiztbl2 WHERE lesson_id="2";'
 //       window.localStorage.setItem("sSQL", sSQL);
 //       window.localStorage.setItem("param", param);
 //       window.location.href = 'config_quiz.html';
    } else {
        var value = sessionStorage.getItem('param');
        if (value == 'quiz') {
            sSQL = 'SELECT * FROM quiztbl WHERE lesson_id="4";';
            window.localStorage.setItem("sSQL", sSQL);
            window.localStorage.setItem("param", value);
            window.location.href = 'quiz.html';
       // } else if (param == 'config') {
       //    sSQL = 'SELECT * FROM quiztbl2 WHERE lesson_id="2";'
       //     window.localStorage.setItem("sSQL", sSQL);
       //     window.localStorage.setItem("param", value);
       //    window.location.href = 'config_quiz.html';
		}
    }
}

function saveScore(category) {
    if ($('#un').val() == '') {
        alert('Please enter you Name');
        return;
    }

    var lesson = window.localStorage['lesson'];

    db.transaction(function(tx) {
        var sSQL = 'INSERT INTO scores(player_name,score,lesson,category) VALUES ("' + $('#un').val() + '","' + $('#game_score').text() + '","' + lesson + '","' + category + '")';

        console.log(sSQL);

        tx.executeSql(sSQL, [], closeInput, errorCB);

        alert('Score successfully saved');

    }, errorCB);

}

function populatedb(tx) {

    // tx.executeSql('DROP TABLE IF EXISTS scores');
    tx.executeSql('DROP TABLE IF EXISTS category');
    tx.executeSql('DROP TABLE IF EXISTS lesson');
    tx.executeSql('DROP TABLE IF EXISTS quiztbl');
    tx.executeSql('DROP TABLE IF EXISTS quiztbl2');
    tx.executeSql('DROP TABLE IF EXISTS quiztbl3');

    tx.executeSql('CREATE TABLE IF NOT EXISTS scores(s_id INTEGER PRIMARY KEY AUTOINCREMENT, player_name VARCHAR(255),score VARCHAR(25),lesson text,category VARCHAR(45))');
    tx.executeSql('CREATE TABLE IF NOT EXISTS category(c_id INTEGER PRIMARY KEY AUTOINCREMENT, c_name VARCHAR(150))');
    tx.executeSql('CREATE TABLE IF NOT EXISTS lesson(lesson_id INTEGER PRIMARY KEY AUTOINCREMENT, c_id INTEGER REFERENCES category (c_id) ON DELETE CASCADE ON UPDATE CASCADE, lesson_detail TEXT)');
    tx.executeSql('CREATE TABLE IF NOT EXISTS quiztbl (ID INTEGER PRIMARY KEY AUTOINCREMENT,lesson_id INTEGER REFERENCES lesson (lesson_id) ON DELETE CASCADE ON UPDATE CASCADE, question text, qanswer1 text, qanswer2 text, qanswer3 text, qanswer4 text, answer text)');
    tx.executeSql('CREATE TABLE IF NOT EXISTS quiztbl2 (ID INTEGER PRIMARY KEY AUTOINCREMENT,lesson_id INTEGER REFERENCES lesson (lesson_id) ON DELETE CASCADE ON UPDATE CASCADE, question text, qanswer1 text, qanswer2 text, answer text)');
    tx.executeSql('CREATE TABLE IF NOT EXISTS quiztbl3 (ID INTEGER PRIMARY KEY AUTOINCREMENT,lesson_id INTEGER REFERENCES lesson (lesson_id) ON DELETE CASCADE ON UPDATE CASCADE, question text, qanswer1 text, qanswer2 text, qanswer3 text, answer text)');

    tx.executeSql('INSERT INTO lesson(c_id,lesson_detail) VALUES ("1","Assessment")');

//Multiple choice
    tx.executeSql('INSERT INTO quiztbl (lesson_id,question, qanswer1, qanswer2, qanswer3, qanswer4, answer) VALUES ("4","Which part is the (brain) of the computer?", "Monitor", "RAM", "CPU", "ROM"  ,"CPU")');
    tx.executeSql('INSERT INTO quiztbl (lesson_id,question, qanswer1, qanswer2, qanswer3, qanswer4, answer) VALUES ("4","What is the permanent memory built into your computer called?", "RAM", "ROM", "CPU", "CD-ROM" ,"ROM")');
    tx.executeSql('INSERT INTO quiztbl (lesson_id,question, qanswer1, qanswer2, qanswer3, qanswer4, answer) VALUES ("4","Approximately how many bytes make one Megabyte.", "One Million", "One Thousand", "Ten Thousand", "One Hundred" ,"One Million")');
	tx.executeSql('INSERT INTO quiztbl (lesson_id,question, qanswer1, qanswer2, qanswer3, qanswer4, answer) VALUES ("4","Which of the following is an operating system you would be using on the computer?", "Internet Explorer", "Netscape", "Microsoft Windows", "Microsoft Word" ,"Microsoft Windows")');
	tx.executeSql('INSERT INTO quiztbl (lesson_id,question, qanswer1, qanswer2, qanswer3, qanswer4, answer) VALUES ("4","The capacity of your hard drive is measured in", "MHz", "Gigabytes", "Mbps", "52X" ,"Gigabytes")');
	tx.executeSql('INSERT INTO quiztbl (lesson_id,question, qanswer1, qanswer2, qanswer3, qanswer4, answer) VALUES ("4","Which of the following is not an input device?", "Keyboard", "Monitor", "Joystick", "Microphone" ,"Monitor")');
	tx.executeSql('INSERT INTO quiztbl (lesson_id,question, qanswer1, qanswer2, qanswer3, qanswer4, answer) VALUES ("4","Which of the following is not an output device?", "Keyboard", "Monitor", "Printer", "Speakers" ,"Keyboard")');
	tx.executeSql('INSERT INTO quiztbl (lesson_id,question, qanswer1, qanswer2, qanswer3, qanswer4, answer) VALUES ("4","Which device allows your computer to talk to other computers over a telephone line as well as access the internet?", "RAM", "Modem", "CD-ROM drive", "Hard Drive" ,"Modem")');
	tx.executeSql('INSERT INTO quiztbl (lesson_id,question, qanswer1, qanswer2, qanswer3, qanswer4, answer) VALUES ("4","How much information can a CD (Compact Disk) usually store?", "1.4 Mb", "150 Mb", "10 Mb", "650 Mb" ,"650 Mb")');
	tx.executeSql('INSERT INTO quiztbl (lesson_id,question, qanswer1, qanswer2, qanswer3, qanswer4, answer) VALUES ("4","DOS stands for", "Dual Operating System", "Dual Organized System", "Disk Operating System", "Disk Organized System" ,"Disk Operating System")');
  

}
