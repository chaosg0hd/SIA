function loginuser() {
    var uname = $('#loguname').val();
    var pword = $('#logpword').val();

    $.ajax({
        url: 'http://localhost/bsit2c/login',
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ uname, pword }),
        success: function(data) {
            console.log(data.payload);
            location.replace('http://localhost/bsit2c-website/www/index.html');
            localStorage.setItem("lname", data.payload.lname);
            localStorage.setItem("fname", data.payload.fname);
        }
    });
}