$(document).on('pageinit', '#result', function(e, data) {

    var value = localStorage.getItem('result');
    console.log('value: ', value);

    if (value == 'word') {
        db.transaction(wordDB, errorCB);
    } else if (value == 'excel') {
        db.transaction(excelDB, errorCB);
    } else if (value == 'power') {
        db.transaction(powerDB, errorCB);
    } else if (value == 'software') {
        db.transaction(softwareDB, errorCB);
    } else if (value == 'browser') {
        db.transaction(browserDB, errorCB);
    } else if (value == 'os') {
        db.transaction(osDB, errorCB);
    } else if (value == 'parts') {
        db.transaction(partsDB, errorCB);
    } else if (value == 'config') {
        db.transaction(configDB, errorCB);
    } else if (value == 'specs') {
        db.transaction(specsDB, errorCB);
    }
});

function showScore(param) {
    window.localStorage.setItem('result', param);
    $.mobile.changePage($("#result"));
}

function wordDB(tx) {
    tx.executeSql('SELECT * FROM scores WHERE category="word" ORDER BY score DESC;', [], querysuccessfull, errorCB);
};

function excelDB(tx) {
    tx.executeSql('SELECT * FROM scores WHERE category="excel" ORDER BY score DESC;', [], querysuccessfull, errorCB);
};

function powerDB(tx) {
    tx.executeSql('SELECT * FROM scores WHERE category="power" ORDER BY score DESC;', [], querysuccessfull, errorCB);
};

function softwareDB(tx) {
    tx.executeSql('SELECT * FROM scores WHERE category="software" ORDER BY score DESC;', [], querysuccessfull, errorCB);
};

function browserDB(tx) {
    tx.executeSql('SELECT * FROM scores WHERE category="browser" ORDER BY score DESC;', [], querysuccessfull, errorCB);
};

function partsDB(tx) {
    tx.executeSql('SELECT * FROM scores WHERE category="parts" ORDER BY score DESC;', [], querysuccessfull, errorCB);
};

function osDB(tx) {
    tx.executeSql('SELECT * FROM scores WHERE category="os" ORDER BY score DESC;', [], querysuccessfull, errorCB);
};

function configDB(tx) {
    tx.executeSql('SELECT * FROM scores WHERE category="config" ORDER BY score DESC;', [], querysuccessfull, errorCB);
};

function specsDB(tx) {
    tx.executeSql('SELECT * FROM scores WHERE category="specs" ORDER BY score DESC;', [], querysuccessfull, errorCB);
};


function errorCB(err) {
    console.log("Error processing SQL: " + err.code + ' ' + err.message);
}

function querysuccessfull(tx, result) {
    var len = result.rows.length;
    console.log(len);
    $("#lvScore").html('');
    if (len > 0) {
        for (var i = 0; i < result.rows.length; i += 1) {
            var row = result.rows.item(i);
            console.log(row);
            var html = '<li>\
                  <h2>' + row.player_name + '</h2>\
                  <p><strong>' + row.lesson + '</strong></p>\
                  <span class="ui-li-count">' + row.score + '</span>\
                </li>';
            $("#lvScore").append(html);
        }

        var $the_ul = $('#lvScore');
        if ($the_ul.hasClass('ui-listview')) {
            $the_ul.trigger('create');
            $the_ul.listview('refresh');
        } else {
            $the_ul.trigger('create');
        }
    }


};
