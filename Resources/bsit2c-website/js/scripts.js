var a;

$(document).ready(function() {
    document.getElementById("elements").style.display = "none";
    $('#fname').text(localStorage.getItem("fname"));
    $('#lname').text(localStorage.getItem("lname"));

    if (localStorage.getItem("lname") == null || localStorage.getItem("lname") == '') {
        location.replace('http://localhost/bsit2c-website/www/login.html');
    } else {
        document.getElementById("elements").style.display = "block";
    }
});

function pull_data() {
    var str_html = '';
    var vtest = '';
    $.getJSON("http://localhost/bsit2c/customers/" + vtest, function(data) {
        console.log(data);
        a = data.payload;
        for (var i = 0; i < a.length; i++) {
            console.log(a[i].cust_num);
            var fullname = a[i].cust_lname + ', ' + a[i].cust_fname;
            var address = '';

            str_html += '<tr>';
            str_html += '<td>' + parseInt(i + 1) + '</td>';
            str_html += '<td>' + a[i].inv_num + '</td>';
            str_html += '<td>' + fullname + '</td>';
            str_html += '<td>' + address + '</td>';
            str_html += '<td><button onclick="show_name(' + i + ')">View</button><button onclick="delete_record(' + i + ')">Delete</button></td>';
            str_html += '</tr>';
        }
        $('#records').html(str_html);
    });
}

function show_name(indx) {
    $('#recno').val(a[indx].cust_recno);
    $('#fname').val(a[indx].cust_fname);
    $('#mname').val(a[indx].cust_mname);
    $('#lname').val(a[indx].cust_lname);
    $('#invnum').text(a[indx].inv_num);
    $('#invdate').text(a[indx].inv_date);
}

function add_record() {
    var fname = $("#fname").val();
    var mname = $("#mname").val();
    var lname = $("#lname").val();
    console.log(fname, mname, lname);
    $.ajax({
        url: "http://localhost/bsit2c/addcustomer",
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ 'fname': fname, 'mname': mname, 'lname': lname }),
        success: function(data) {
            console.log(data);
            pull_data();
        }
    });
}

function edit_record() {
    var recno = $("#recno").val();
    var fname = $("#fname").val();
    var mname = $("#mname").val();
    var lname = $("#lname").val();
    console.log(fname, mname, lname);
    $.ajax({
        url: "http://localhost/bsit2c/editcustomer",
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ 'recno': recno, 'fname': fname, 'mname': mname, 'lname': lname }),
        success: function(data) {
            console.log(data);
            pull_data();
        }
    });
}

function delete_record(indx) {
    var recno = a[indx].cust_recno;
    $.ajax({
        url: 'http://localhost/bsit2c/deletecustomer',
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ 'recno': recno }),
        success: function(data) {
            pull_data();
        }
    });
}

function register() {
    var uname = $('#usruname').val();
    var pword = $('#usrpword').val();
    var fname = $('#usrfname').val();
    var lname = $('#usrlname').val();
    var role = $('#usrrole').val();

    $.ajax({
        url: 'http://localhost/bsit2c/register',
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ uname, pword, fname, lname, role }),
        success: function(data) {
            console.log(data);
            location.replace('http://localhost/bsit2c-website/www/login.html');
        }
    });
}

function logout() {
    localStorage.setItem("lname", "");
    location.replace('http://localhost/bsit2c-website/www/login.html');
}