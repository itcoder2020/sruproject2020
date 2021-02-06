function admin_Login(username, password) {
    if (username == '' || password == '') {
        Swal.fire("ใส่ข้อมูลไม่ครบถ้วน", '', 'error')
    } else {
        $.ajax({
            url: 'api/admin_login',
            method: 'post',
            data: {
                username: username,
                password: password,
            },
            success: function (res) {
                if (res.status == true) {
                    Swal.fire(res.message, '', 'success').then(function () {
                        window.location.href = "admin/manage_date"
                    });
                    $("#login_admin").attr("disabled", true);
                } else {
                    Swal.fire(res.message, '', 'error')
                }
            },
            error: function (request, status, error) {
                var val = request.responseText;
                alert("error" + val);
            }
        })
    }
}
$('#login_admin').click(() => {
    let username = $('#usernamea_login').val()
    let password = $('#passworda_login').val()
    admin_Login(username, password)
})
$('#admin_logout').click(() => {
    $.ajax({
        url: '../api/admin_logout',
        method: 'get',
        success: function (res) {
            if (res.status == true) {
                window.location.reload()
            } else {}
        },
        error: function (request, status, error) {
            var val = request.responseText;
            alert("error" + val);
        }
    })
})
$("#passworda_login").keypress(function (e) {
    if (e.which == 13) {
        var username = $("#usernamea_login").val();
        var password = $("#passworda_login").val();
        admin_Login(username, password)
    }
});

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
$('#Register').click(() => {
    let status = 0
    let affiliated_agencies = $('select[id=affiliated_agencies]').find('option:selected').val();
    let personneltype = $('select[id=personneltype]').find('option:selected').val();
    let officialposition = $('select[id=officialposition]').find('option:selected').val();
    // alert(personneltype)
    if (officialposition == 1) {
        status = 0
    }
    let managementposition = $('select[id=managementposition]').find('option:selected').val();
    if (managementposition == 4) {
        status = 1
    }
    if (managementposition == 1) {
        status = 2
    }
    let email = $('#email').val();
    let name = $('#name').val();
    let username = $('#username').val();
    let password = $('#password').val();
    let con_password = $('#con_password').val();
    if (email == '' || name == '' || username == '' || password == '' || con_password == '' || affiliated_agencies == '' || personneltype == '' || officialposition == '' || managementposition == '') {
        Swal.fire('แจ้งเตือน!', 'ใส่ข้อมูลไม่ครบถ้วน', 'error')
    } else if (!validateEmail(email)) {
        Swal.fire('แจ้งเตือน!', 'อีเมล์ไม่ถูกรูปแบบ', 'error')
    } else if (password.length <= 7) {
        Swal.fire('แจ้งเตือน!', 'รหัสผ่านต้องมากกว่า 8 หลัก', 'error')
    } else if (password != con_password) {
        Swal.fire('แจ้งเตือน!', 'รหัสผ่านไม่ตรงกัน', 'error')
    } else {
        $.ajax({
            url: '../api/register',
            method: 'post',
            data: {
                username: username,
                password: password,
                personneltype: personneltype,
                officialposition: officialposition,
                affiliated_agencies: affiliated_agencies,
                email: email,
                name: name,
                status: status,
                managementposition: managementposition,
            },
            success: function (res) {
                if (res.status == true) {
                    Swal.fire('แจ้งเตือน!', res.message, 'success').then(function () {
                        window.location.reload();
                    });
                } else {
                    Swal.fire('แจ้งเตือน!', res.message, 'error')
                }
            },
            error: function (request, status, error) {
                var val = request.responseText;
                alert("error" + val);
            }
        })
    }
})
