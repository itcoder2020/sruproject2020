var affiliated_agencies;

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

function Redirect(url) {
    setTimeout(function() {
        window.location = url
    }, 1000);
}

function Login(username, password) {
    $("#login").attr("disabled", true);
    $("#login").html('<i class="loading-icon fa fa-spinner fa-spin"></i> Loading');
    
    if (username == '' || password == '') {
        toastr["error"]("ใส่ข้อมูลไม่ครบถ้วน")
        $("#login").attr("disabled", false);
        $("#login").html('<i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ ');
    } else {
        $.ajax({
            url: 'api/login',
            method: 'post',
            data: {
                username: username,
                password: password,
            },
            success: function(res) {
                $("#login").attr("disabled", false);
                $("#login").html('<i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ ');

                if (res.status == true) {
                    toastr["success"](res.message)
                   
                    Redirect('home')
                } else {
                    toastr["error"](res.message)
                }
            },
            error: function(request, status, error) {
                var val = request.responseText;
                alert("error" + val);
            }
        })
        //toastr["success"]("เข้าสู่ระบบสำเร็จ")
    }
}
//login
$('#login').click(() => {
    let username = $('#username_login').val()
    let password = $('#password_login').val()
    Login(username, password)
})
//editprofile
$('#edit_profile').click(() => {
    $("#edit_profile").attr("disabled", true);
    $("#edit_profile").html('<i class="loading-icon fa fa-spinner fa-spin"></i> Loading');
    let name = $('#name').val()
    let officialposition = $('select[id=officialposition]').find('option:selected').val();
    if (name == '') {
        toastr["error"]('ข้อมูลไม่ครบถ้วน')
    } else {
        $.ajax({
            url: 'api/edit_profile',
            method: 'post',
            data: {
                name: name,
                officialposition:officialposition
            },
            success: function(res) {
                $("#edit_profile").attr("disabled", false);
           
                $("#edit_profile").html('<i class="fa fa-edit" aria-hidden="true"></i> แก้ไข');
                if (res.status == true) {
                    toastr["success"](res.message)
                    Redirect('profile')
                } else {
                    toastr["error"](res.message)
                }
            },
            error: function(request, status, error) {
                var val = request.responseText;
                alert("error" + val);
            }
        })
    }
})
//ประธานสาขาส่งแบบประเมิน//
function compentency_score(params) {
    let score = parseInt(params)
    let score_result
    if (score == 5) {
        score_result = score * 3
    } else if (score == 4) {
        score_result = score * 2
    } else if (score == 3) {
        score_result = score * 1
    } else if (score == 2) {
        score_result = score * 0
    }
    return score_result
}
//ยกเลิกส่งแบบประเมิณ
$('#cancel').click(() => {
    $("#cancel").attr("disabled", true);
    $("#cancel").html('<i class="loading-icon fa fa-spinner fa-spin"></i> Loading');
    $.ajax({
        url: "api/cancel_rate",
        method: "post",
        data: {
            cancel: true
        },
        success: function(res) {
            $("#cancel").attr("disabled", false);
           // $(".loading-icon").addClass("hide");
            $("#cancel").html('<i class="fa fa-times" aria-hidden="true"></i>  ยกเลิกส่งแบบประเมิน ');
            if (res.status == true) {
                toastr["success"](res.message)
                Redirect('home')
            } else {
                toastr["error"](res.message)
            }
        }
    })
})
//logout//
$('#logout').click(() => {
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
   // alert(id)
    if(isNaN(id) ==false){
    $.ajax({
        url: '../api/logout',
        method: 'get',
        success: function(res) {
            if (res.status == true) {
                toastr["success"](res.message)
                Redirect('../login')
            } else {
                toastr["error"](res.message)
            }
        },
        error: function(request, status, error) {
            var val = request.responseText;
            alert("error" + val);
        }
    })
}else{
    $.ajax({
        url: 'api/logout',
        method: 'get',
        success: function(res) {
            if (res.status == true) {
                toastr["success"](res.message)
                Redirect('./login')
            } else {
                toastr["error"](res.message)
            }
        },
        error: function(request, status, error) {
            var val = request.responseText;
            alert("error" + val);
        }
    })
}
})
function compentency_score1(params) {
    let score = parseInt(params)
    let score_result
    if (score == 10) {
        score_result = score * 3
    } else if (score == 8) {
        score_result = score * 2
    } else if (score == 6) {
        score_result = score * 1
    } else if (score == 4) {
        score_result = score * 0
    }
    return score_result
}
$("#sent_rate").click(() => {
    let status = $('#status').val();
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    ///------------------------------------------------------------//
    let compentency1 = $('input[name=compentency1]:checked').val();
    let compentency2 = $('input[name=compentency2]:checked').val();
    let compentency3 = $('input[name=compentency3]:checked').val();
    let compentency4 = $('input[name=compentency4]:checked').val();
    let compentency5 = $('input[name=compentency5]:checked').val();
    let score_compentency1 = parseInt($('#score_compentency1').val())
    let score_compentency2 = parseInt($('#score_compentency2').val())
    let score_compentency3 = parseInt($('#score_compentency3').val())
    let score_compentency4 = parseInt($('#score_compentency4').val())
    let score_compentency5 = parseInt($('#score_compentency5').val())
    let sum_compentency = score_compentency1 + score_compentency2 + score_compentency3 + score_compentency4 + score_compentency5
    //------------------------------------------------------------//
    let performance1_1 = $('input[name=performance1_1]:checked').val();
    let performance2_1 = $('input[name=performance2_1]:checked').val();
    let performance2_2 = $('input[name=performance2_2]:checked').val();
    let performance2_3 = $('input[name=performance2_3]:checked').val();
    let performance2_4 = $('input[name=performance2_4]:checked').val();
    let performance3_1 = $('input[name=performance3_1]:checked').val();
    let performance3_2 = $('input[name=performance3_2]:checked').val();
    let performance3_3 = $('input[name=performance3_3]:checked').val();
    let performance4_1 = $('input[name=performance4_1]:checked').val();
    let performance5_1 = $('input[name=performance5_1]:checked').val();
    let performance6_1 = $('input[name=performance6_1]:checked').val();
    let scores1_1 = parseFloat($('#scores1_1').val())
    let scores2_1 = parseFloat($('#scores2_1').val())
    let scores2_2 = parseFloat($('#scores2_2').val())
    let scores2_3 = parseFloat($('#scores2_3').val())
    let scores2_4 = parseFloat($('#scores2_4').val())
    let scores3_1 = parseFloat($('#scores3_1').val())
    let scores3_2 = parseFloat($('#scores3_2').val())
    let scores3_3 = parseFloat($('#scores3_3').val())
    let scores4_1 = parseFloat($('#scores4_1').val())
    let scores5_1 = parseFloat($('#scores5_1').val())
    let scores6_1 = parseFloat($('#scores6_1').val())
    
    let performance_x = 5
    let sum_scores = (scores1_1 + scores2_1 + scores2_2 + scores2_3 + scores2_4 + scores3_1 + scores3_2 + scores3_3 + scores4_1 + scores5_1 + scores6_1) / performance_x
    // alert(sum_scores)
    //alert(sum_scores)
    //alert(id)
    if (typeof performance1_1 == "undefined" || typeof performance2_1 == "undefined" || typeof performance2_2 == "undefined" || typeof performance2_3 == "undefined" || typeof performance2_4 == "undefined" || typeof performance3_1 == "undefined" || typeof performance3_2 == "undefined" || typeof performance3_3 == "undefined" || typeof performance4_1 == "undefined" || typeof performance5_1 == "undefined" || typeof performance6_1 == "undefined" || typeof compentency1 == "undefined" || typeof compentency2 == "undefined" || typeof compentency3 == "undefined" || typeof compentency4 == "undefined" || typeof compentency5 == "undefined") {
        toastr["error"]('ข้อมูลแบบประเมินไม่ครบถ้วน')
    } else {
        var success_score = 0
        if (status == 0) {
            success_score = compentency_score(sum_compentency)
        } else if (status == 1) {
            success_score = compentency_score1(sum_compentency)
        }
        $('#compentency_score_result').html(success_score)
        $('#performance_score_result').html(sum_scores)
        $("#myModal").modal();
    }
})
///save_rate//
$('#update_rate').click(() => {
    $("#update_rate").attr("disabled", true);
    $("#update_rate").html('<i class="loading-icon fa fa-spinner fa-spin"></i> Loading');
    var id = $('#id_rate').val()
    let performance1_1 = $('input[name=performance1_1]:checked').val();
    let performance2_1 = $('input[name=performance2_1]:checked').val();
    let performance2_2 = $('input[name=performance2_2]:checked').val();
    let performance2_3 = $('input[name=performance2_3]:checked').val();
    let performance2_4 = $('input[name=performance2_4]:checked').val();
    let performance3_1 = $('input[name=performance3_1]:checked').val();
    let performance3_2 = $('input[name=performance3_2]:checked').val();
    let performance3_3 = $('input[name=performance3_3]:checked').val();
    let performance4_1 = $('input[name=performance4_1]:checked').val();
    let performance5_1 = $('input[name=performance5_1]:checked').val();
    let performance6_1 = $('input[name=performance6_1]:checked').val();
    $.ajax({
        url: "api/update_rate",
        method: "post",
        data: {
            id: id,
            performance1_1: performance1_1,
            performance2_1: performance2_1,
            performance2_2: performance2_2,
            performance2_3: performance2_3,
            performance2_4: performance2_4,
            performance3_1: performance3_1,
            performance3_2: performance3_2,
            performance3_3: performance3_3,
            performance4_1: performance4_1,
            performance5_1: performance5_1,
            performance6_1: performance6_1,
        },
        success: function(res) {
            $("#update_rate").attr("disabled", false);
           
            $("#update_rate").html('<i class="fa fa-save" aria-hidden="true"></i> บันทึกข้อมูล');
            if (res.status == true) {
                toastr["success"](res.message)
                Redirect('rate')
            } else {
                toastr["error"](res.message)
            }
        }
    })
})
$('#update_rate1').click(() => {
    $("#update_rate1").attr("disabled", true);
    $("#update_rate1").html('<i class="loading-icon fa fa-spinner fa-spin"></i> Loading');
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    let performance1_1 = $('input[name=performance1_1]:checked').val();
    let performance2_1 = $('input[name=performance2_1]:checked').val();
    let performance2_2 = $('input[name=performance2_2]:checked').val();
    let performance2_3 = $('input[name=performance2_3]:checked').val();
    let performance2_4 = $('input[name=performance2_4]:checked').val();
    let performance3_1 = $('input[name=performance3_1]:checked').val();
    let performance3_2 = $('input[name=performance3_2]:checked').val();
    let performance3_3 = $('input[name=performance3_3]:checked').val();
    let performance4_1 = $('input[name=performance4_1]:checked').val();
    let performance5_1 = $('input[name=performance5_1]:checked').val();
    let performance6_1 = $('input[name=performance6_1]:checked').val();
    let message1 =  $('#message1').val();
    let message2 =  $('#message2').val();
    let message3 =  $('#message3').val();
    $.ajax({
        url: "../api/update_rate",
        method: "post",
        data: {
            id: id,
            performance1_1: performance1_1,
            performance2_1: performance2_1,
            performance2_2: performance2_2,
            performance2_3: performance2_3,
            performance2_4: performance2_4,
            performance3_1: performance3_1,
            performance3_2: performance3_2,
            performance3_3: performance3_3,
            performance4_1: performance4_1,
            performance5_1: performance5_1,
            performance6_1: performance6_1,
            message1:message1,
            message2:message2,
            message3:message3,
            update: true
        },
        success: function(res) {
            $("#update_rate1").attr("disabled", false);
           
            $("#update_rate1").html('<i class="fa fa-save" aria-hidden="true"></i> บันทึกข้อมูล');
            if (res.status == true) {
                toastr["success"](res.message)
                setTimeout(function() {
                    window.location.reload()
                }, 1000);
            } else {
                toastr["error"](res.message)
            }
        }
    })
})
$('#accept').click(() => {
    $("#accept").attr("disabled", true);
    $("#accept").html('<i class="loading-icon fa fa-spinner fa-spin"></i> Loading');
	
    if ($('#check').prop("checked") == true) {
        $.ajax({
            url: "api/accept",
            method: "post",
            data: {
                accept: true
            },
            success: function(res) {
                $("#accept").attr("disabled", false);
                $("#accept").html('ทำแบบประเมิน');
                if (res.status == true) {
                    toastr["success"](res.message)
                    Redirect('rate')
                } else {
                    toastr["error"](res.message)
                }
            }
        })
    } else if ($('#check').prop("checked") == false) {
        toastr["error"]("คุณไม่ยอมรับข้อตกลง")
        $("#accept").attr("disabled", false);
           
        $("#accept").html('ทำแบบประเมิน');
    }
})
//sent_rate// for status 1 and 2
$('#sent').click(() => {
    $("#sent").attr("disabled", true);
    $("#sent").html('<i class="loading-icon fa fa-spinner fa-spin"></i> Loading')
    var id = $('#id_rate').val()
    let performance1_1 = $('input[name=performance1_1]:checked').val();
    let performance2_1 = $('input[name=performance2_1]:checked').val();
    let performance2_2 = $('input[name=performance2_2]:checked').val();
    let performance2_3 = $('input[name=performance2_3]:checked').val();
    let performance2_4 = $('input[name=performance2_4]:checked').val();
    let performance3_1 = $('input[name=performance3_1]:checked').val();
    let performance3_2 = $('input[name=performance3_2]:checked').val();
    let performance3_3 = $('input[name=performance3_3]:checked').val();
    let performance4_1 = $('input[name=performance4_1]:checked').val();
    let performance5_1 = $('input[name=performance5_1]:checked').val();
    let performance6_1 = $('input[name=performance6_1]:checked').val();
    if (typeof performance1_1 == "undefined" || typeof performance2_1 == "undefined" || typeof performance2_2 == "undefined" || typeof performance2_3 == "undefined" || typeof performance2_4 == "undefined" || typeof performance3_1 == "undefined" || typeof performance3_2 == "undefined" || typeof performance3_3 == "undefined" || typeof performance4_1 == "undefined" || typeof performance5_1 == "undefined" || typeof performance6_1 == "undefined") {
        toastr["error"]('ข้อมูลแบบประเมินไม่ครบถ้วน')
        $("#sent").attr("disabled", false);
           
        $("#sent").html('<i class="fa fa-paper-plane" aria-hidden="true"></i> ส่งข้อมูล');
    } else {

    $.ajax({
        url: "api/sent",
        method: "post",
        data: {
            id: id,
            step: 1,
            performance1_1: performance1_1,
            performance2_1: performance2_1,
            performance2_2: performance2_2,
            performance2_3: performance2_3,
            performance2_4: performance2_4,
            performance3_1: performance3_1,
            performance3_2: performance3_2,
            performance3_3: performance3_3,
            performance4_1: performance4_1,
            performance5_1: performance5_1,
            performance6_1: performance6_1,
        },
        success: function(res) {
            $("#sent").attr("disabled", false);
           
            $("#sent").html('<i class="fa fa-paper-plane" aria-hidden="true"></i> ส่งข้อมูล');
            if (res.status == true) {
                toastr["success"](res.message)
                Redirect('rate')
            } else {
                toastr["error"](res.message)
            }
        }
    })
}
})
//result////
$(document).on('click', '#result1', function() {
    let id = $(this).attr("id-result");
    //alert(id)
    $('#modalresult').modal()
    $.ajax({
        url: "api/result",
        method: "post",
        data: {
            id: id,
         
        },
        success: function(res) {
            let sum = parseFloat(res.total_score_c)+parseFloat(res.total_score_p);
            let message = ''
            $('#total_score_p').html(res.total_score_p)
            $('#name').html("("+res.name+")")
            $('#total_score_c').html(res.total_score_c)
            $('#sum_score').html(parseFloat(res.total_score_c)+parseFloat(res.total_score_p))
            if(sum  >= 90){
                message =  '<font color="green">ดีเด่น</font>'
            }else if(sum >=80 && sum <=89.99){
                message =  '<font color="green">ดีมาก</font>'
            }else if(sum >=70 && sum <=79.99){
                message =  '<font color="green">ดี</font>'
            }else if(sum >=60 && sum <=69.99){
                message =  '<font color="#FF9900">พอใช้</font>'
            }else if(sum >=1 && sum <=59.99){
                message =  '<font color="red">ต้องปรับปรุง</font>'
            }
            $('#message').html(message)
            $('#message1').html(res.message1)
            $('#message2').html(res.message2)
            $('#message3').html(res.message3)

            
        }
    })

})
//result persident//
$(document).on('click', '#result2', function() {
    let id = $(this).attr("id-result");
    //alert(id)
    $('#modalresult').modal()
    $.ajax({
        url: "api/result",
        method: "post",
        data: {
            id: id,
         
        },
        success: function(res) {
            let sum = parseFloat(res.total_score_c)+parseFloat(res.total_score_p);
            let message = ''
            $('#total_score_p').html(res.total_score_p)
            $('#name').html("("+res.name+")")
            $('#total_score_c').html(res.total_score_c)
            $('#sum_score').html(parseFloat(res.total_score_c)+parseFloat(res.total_score_p))
            if(sum  >= 90){
                message =  '<font color="green">ดีเด่น</font>'
            }else if(sum >=80 && sum <=89.99){
                message =  '<font color="green">ดีมาก</font>'
            }else if(sum >=70 && sum <=79.99){
                message =  '<font color="green">ดี</font>'
            }else if(sum >=60 && sum <=69.99){
                message =  '<font color="#FF9900">พอใช้</font>'
            }else if(sum >=1 && sum <=59.99){
                message =  '<font color="red">ต้องปรับปรุง</font>'
            }
            $('#message').html(message)
            $('#message1').html(res.message1)
            $('#message2').html(res.message2)
            $('#message3').html(res.message3)

            
        }
    })

})
///confirm///
$('#confirm_score').click(() => {
    $("#confirm_score").attr("disabled", true);
    $("#confirm_score").html('<i class="loading-icon fa fa-spinner fa-spin"></i> Loading');
    let status = $('#status').val();
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    ///------------------------------------------------------------//
    let score_compentency1 = parseInt($('#score_compentency1').val())
    let score_compentency2 = parseInt($('#score_compentency2').val())
    let score_compentency3 = parseInt($('#score_compentency3').val())
    let score_compentency4 = parseInt($('#score_compentency4').val())
    let score_compentency5 = parseInt($('#score_compentency5').val())
    let sum_compentency = score_compentency1 + score_compentency2 + score_compentency3 + score_compentency4 + score_compentency5
    //------------------------------------------------------------//
    let performance1_1 = $('input[name=performance1_1]:checked').val();
    let performance2_1 = $('input[name=performance2_1]:checked').val();
    let performance2_2 = $('input[name=performance2_2]:checked').val();
    let performance2_3 = $('input[name=performance2_3]:checked').val();
    let performance2_4 = $('input[name=performance2_4]:checked').val();
    let performance3_1 = $('input[name=performance3_1]:checked').val();
    let performance3_2 = $('input[name=performance3_2]:checked').val();
    let performance3_3 = $('input[name=performance3_3]:checked').val();
    let performance4_1 = $('input[name=performance4_1]:checked').val();
    let performance5_1 = $('input[name=performance5_1]:checked').val();
    let performance6_1 = $('input[name=performance6_1]:checked').val();
    let scores1_1 = parseFloat($('#scores1_1').val())
    let scores2_1 = parseFloat($('#scores2_1').val())
    let scores2_2 = parseFloat($('#scores2_2').val())
    let scores2_3 = parseFloat($('#scores2_3').val())
    let scores2_4 = parseFloat($('#scores2_4').val())
    let scores3_1 = parseFloat($('#scores3_1').val())
    let scores3_2 = parseFloat($('#scores3_2').val())
    let scores3_3 = parseFloat($('#scores3_3').val())
    let scores4_1 = parseFloat($('#scores4_1').val())
    let scores5_1 = parseFloat($('#scores5_1').val())
    let scores6_1 = parseFloat($('#scores6_1').val())
    let message1 =  $('#message1').val();
    let message2 =  $('#message2').val();
    let message3 =  $('#message3').val();
    
    let performance_x = 5
    let sum_scores = (scores1_1 + scores2_1 + scores2_2 + scores2_3 + scores2_4 + scores3_1 + scores3_2 + scores3_3 + scores4_1 + scores5_1 + scores6_1) / performance_x
    var success_score = 0
    if (status == 0) {
        success_score = compentency_score(sum_compentency)
    } else if (status == 1) {
        success_score = compentency_score1(sum_compentency)
    }
    $.ajax({
        url: "../api/sent",
        method: "post",
        data: {
            step: 2,
            id: id,
            performance1_1: performance1_1,
            performance2_1: performance2_1,
            performance2_2: performance2_2,
            performance2_3: performance2_3,
            performance2_4: performance2_4,
            performance3_1: performance3_1,
            performance3_2: performance3_2,
            performance3_3: performance3_3,
            performance4_1: performance4_1,
            performance5_1: performance5_1,
            performance6_1: performance6_1,
            total_score_c: success_score,
            total_score_p: sum_scores,
            message1:message1,
            message2:message2,
            message3:message3,
        },
        success: function(res) {
            $("#confirm_score").attr("disabled", false);
            $("#confirm_score").html('<i class="fa fa-check" aria-hidden="true"></i> ยืนยัน');            
            if (res.status == true) {
                toastr["success"](res.message)
                Redirect('home')
            } else {
                toastr["error"](res.message)
            }
        }
    })
})
//changpass//
$('#change_pass').click(() => {
    $("#change_pass").attr("disabled", true);
    $("#change_pass").html('<i class="loading-icon fa fa-spinner fa-spin"></i> Loading');
    let o_password = $('#o_password').val()
    let password = $('#n_password').val()
    let c_password = $('#c_password').val()
    if (o_password == '' || password == '' || c_password == '') {
        toastr["error"]('ข้อมูลไม่ครบถ้วน')
        $("#change_pass").attr("disabled", false);
           
        $("#change_pass").html('<i class="fa fa-edit" aria-hidden="true"></i> แก้ไขรหัสผ่าน');
    } else if (password.length < 8 && c_password.length < 8) {
        toastr["error"]('รหัสผ่านใหม่ต้องมีมากกว่า 8 หลัก')
        $("#change_pass").attr("disabled", false);
           
        $("#change_pass").html('<i class="fa fa-edit" aria-hidden="true"></i> แก้ไขรหัสผ่าน');
    } else if (password != c_password) {
        toastr["error"]('รหัสผ่านใหม่ไม่ตรงกัน')
        $("#change_pass").attr("disabled", false);
           
        $("#change_pass").html('<i class="fa fa-edit" aria-hidden="true"></i> แก้ไขรหัสผ่าน');
    } else {
        $.ajax({
            url: 'api/changpass',
            method: 'post',
            data: {
                o_password: o_password,
                password: password,
                c_password: c_password
            },
            success: function(res) {
                $("#change_pass").attr("disabled", false);
           
                $("#change_pass").html('<i class="fa fa-edit" aria-hidden="true"></i> แก้ไขรหัสผ่าน');
                if (res.status == true) {
                    toastr["success"](res.message)
                    Redirect('profile')
                } else {
                    toastr["error"](res.message)
                }
            },
            error: function(request, status, error) {
                var val = request.responseText;
                alert("error" + val);
            }
        })
    }
})
$('#savedata').click(() => {})
$('#edit').click(() => {
    $('#EditData').modal()
})
$("#password_login").keypress(function(e) {
    if (e.which == 13) {
        var username = $("#username_login").val();
        var password = $("#password_login").val();
        Login(username, password)
    }
});

function Showpass() {
    var password = document.getElementById("password_login");
    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}


$("input[type=text][pattern]").on('input', function() {
    if (!this.checkValidity()) this.value = this.value.slice(0, -1);
});
/////-------calculate----------------////
var weight = parseInt($('#weight1_1').val())
var score = parseInt($('#score1_1').val())
$('#scores1_1').val(weight * score)
if ($('#scores1_1').val() == 'NaN') {
    $('#scores1_1').val(0)
}
$('#score1_1').keyup(function() {
    let weight = parseInt($('#weight1_1').val())
    let score = parseInt($('#score1_1').val())
    $('#scores1_1').val(weight * score)
    if ($('#scores1_1').val() == 'NaN') {
        $('#scores1_1').val(0)
    }
});
var weight = parseInt($('#weight2_1').val())
var score = parseInt($('#score2_1').val())
$('#scores2_1').val(weight * score)
if ($('#scores2_1').val() == 'NaN') {
    $('#scores2_1').val(0)
}
$('#score2_1').keyup(function() {
    let weight = parseInt($('#weight2_1').val())
    let score = parseInt($('#score2_1').val())
    $('#scores2_1').val(weight * score)
    if ($('#scores2_1').val() == 'NaN') {
        $('#scores2_1').val(0)
    }
});
var weight = parseInt($('#weight2_2').val())
var score = parseInt($('#score2_2').val())
$('#scores2_2').val(weight * score)
if ($('#scores2_2').val() == 'NaN') {
    $('#scores2_2').val(0)
}
$('#score2_2').keyup(function() {
    let weight = parseInt($('#weight2_2').val())
    let score = parseInt($('#score2_2').val())
    $('#scores2_2').val(weight * score)
    if ($('#scores2_2').val() == 'NaN') {
        $('#scores2_2').val(0)
    }
});
var weight = parseInt($('#weight2_3').val())
var score = parseInt($('#score2_3').val())
$('#scores2_3').val(weight * score)
if ($('#scores2_3').val() == 'NaN') {
    $('#scores2_3').val(0)
}
$('#score2_3').keyup(function() {
    let weight = parseInt($('#weight2_3').val())
    let score = parseInt($('#score2_3').val())
    $('#scores2_3').val(weight * score)
    if ($('#scores2_3').val() == 'NaN') {
        $('#scores2_3').val(0)
    }
});
var weight = parseInt($('#weight2_4').val())
var score = parseInt($('#score2_4').val())
$('#scores2_4').val(weight * score)
if ($('#scores2_4').val() == 'NaN') {
    $('#scores2_4').val(0)
}
$('#score2_4').keyup(function() {
    let weight = parseInt($('#weight2_4').val())
    let score = parseInt($('#score2_4').val())
    $('#scores2_4').val(weight * score)
    if ($('#scores2_4').val() == 'NaN') {
        $('#scores2_4').val(0)
    }
});
var weight = parseInt($('#weight3_1').val())
var score = parseInt($('#score3_1').val())
$('#scores3_1').val(weight * score)
if ($('#scores3_1').val() == 'NaN') {
    $('#scores3_1').val(0)
}
$('#score3_1').keyup(function() {
    let weight = parseInt($('#weight3_1').val())
    let score = parseInt($('#score3_1').val())
    $('#scores3_1').val(weight * score)
    if ($('#scores3_1').val() == 'NaN') {
        $('#scores3_1').val(0)
    }
});
var weight = parseInt($('#weight3_2').val())
var score = parseInt($('#score3_2').val())
$('#scores3_2').val(weight * score)
if ($('#scores3_2').val() == 'NaN') {
    $('#scores3_2').val(0)
}
$('#score3_2').keyup(function() {
    let weight = parseInt($('#weight3_2').val())
    let score = parseInt($('#score3_2').val())
    $('#scores3_2').val(weight * score)
    if ($('#scores3_2').val() == 'NaN') {
        $('#scores3_2').val(0)
    }
});
var weight = parseInt($('#weight3_3').val())
var score = parseInt($('#score3_3').val())
$('#scores3_3').val(weight * score)
if ($('#scores3_3').val() == 'NaN') {
    $('#scores3_3').val(0)
}
$('#score3_3').keyup(function() {
    let weight = parseInt($('#weight3_3').val())
    let score = parseInt($('#score3_3').val())
    $('#scores3_3').val(weight * score)
    if ($('#scores3_3').val() == 'NaN') {
        $('#scores3_3').val(0)
    }
});
var weight = parseInt($('#weight4_1').val())
var score = parseInt($('#score4_1').val())
$('#scores4_1').val(weight * score)
if ($('#scores4_1').val() == 'NaN') {
    $('#scores4_1').val(0)
}
$('#score4_1').keyup(function() {
    let weight = parseInt($('#weight4_1').val())
    let score = parseInt($('#score4_1').val())
    $('#scores4_1').val(weight * score)
    if ($('#scores4_1').val() == 'NaN') {
        $('#scores4_1').val(0)
    }
});
var weight = parseInt($('#weight5_1').val())
var score = parseInt($('#score5_1').val())
$('#scores5_1').val(weight * score)
if ($('#scores5_1').val() == 'NaN') {
    $('#scores5_1').val(0)
}
$('#score5_1').keyup(function() {
    let weight = parseInt($('#weight5_1').val())
    let score = parseInt($('#score5_1').val())
    $('#scores5_1').val(weight * score)
    if ($('#scores5_1').val() == 'NaN') {
        $('#scores5_1').val(0)
    }
});
var weight = parseInt($('#weight6_1').val())
var score = parseInt($('#score6_1').val())
$('#scores6_1').val(weight * score)
if ($('#scores6_1').val() == 'NaN') {
    $('#scores6_1').val(0)
}
$('#score6_1').keyup(function() {
    let weight = parseInt($('#weight6_1').val())
    let score = parseInt($('#score6_1').val())
    $('#scores6_1').val(weight * score)
    if ($('#scores6_1').val() == 'NaN') {
        $('#scores6_1').val(0)
    }
});
$(document).on('click', '#delfile1', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
$(document).on('click', '#delfile2', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
$(document).on('click', '#delfile3', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
$(document).on('click', '#delfile4', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
$(document).on('click', '#delfile5', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
$(document).on('click', '#delfile6', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
$(document).on('click', '#delfile7', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
$(document).on('click', '#delfile8', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
$(document).on('click', '#delfile9', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
$(document).on('click', '#delfile10', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
$(document).on('click', '#delfile11', function() {
    let id = $(this).attr("id-del");
    let filename = $(this).attr("file-name");
    Swal.fire({
        title: 'ต้องการลบหรือไม่ ?',
        showDenyButton: true,
        icon: 'info',
        confirmButtonText: `ลบ`,
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "api/del_file",
                method: 'post',
                data: {
                    id: id,
                    filename: filename
                },
                success: function(res) {
                    toastr["success"](res.message)
                    setTimeout(function() {
                        window.location = "rate"
                    }, 1000);
                },
                error: function(request, status, error) {
                    var val = request.responseText;
                    alert("error" + val);
                }
            })
        } else if (result.isDenied) {}
    })
})
