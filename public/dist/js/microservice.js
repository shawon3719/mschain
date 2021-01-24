/**
 * Created by Shawon on 15-Jul-20.
 // */

(function ($) {
    $(document).ready(function(){

        $(".push").click(function () {
            var form = new FormData();
            var usname = $('#userdiv').find('input[id="username_input"]').val();
            var passt = $('#passdiv').find('input[id="password_input"]').val();
            var token = $("meta[name='_csrf']").attr("content");
            var paramName = $("meta[name='_csrf_parameter_name']").attr("content");
            // alert(passt);
            var username = usname.toString() ;
            var password = passt.toString();
            form.append("grant_type", "password");
            form.append("username", username);
            form.append("password", password);

            var settings = {
                "url": "http://192.168.0.33:8180/auth-api/oauth/token",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "Basic YXRpLW1zOmF0aS1wYXNz"
                },
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };

            $.ajax(settings).done(function (response) {
                // document.getElementById('done').style.display="block";
                // document.getElementById('basic').style.display="none";
                // window.sessionStorage.accessToken = response.body.access_token;
                // alert("Login Successfull");
                // alert(response);
                var obj = JSON.parse(response);
                // alert(obj.access_token);
                // document.getElementById('token').innerHTML = obj.access_token;
                // document.getElementById('type').innerHTML = obj.token_type;
                // document.getElementById('refresh').innerHTML = obj.refresh_token;
                // document.getElementById('time').innerHTML = obj.expires_in;
                // document.getElementById('scope').innerHTML = obj.scope;
                window.localStorage.setItem('x-auth-token', obj.access_token);
                // document.cookie= obj.access_token;
                // var cookieee =  document.cookie;
                // if (cookieee != null){
                //     alert("Authorized");
                // }else {
                //     alert("Not Authorized")
                // }

                var $ab = obj.access_token
                sessionStorage.setItem('dataStored', obj.access_token);
                window.location.href = "/dashboard";

                //     $("#response_token").append(obj);
                // window.location.href = "dashboard.html";

                // return alert("Hello");
            });
            // $.ajax(settings).fail(function (response) {
            //     // var obj = JSON.parse(response);
            //     // // alert(obj.access_token);
            //     // document.cookie= obj.access_token;
            //     // var cookieee =  document.cookie;
            //     // if (cookieee != null){
            //     //     alert("Authorized");
            //     // }else {
            //     //     alert("Not Authorized")
            //     // }
            //     alert(response);
            //     // return alert("Hello");
            // });
        });
    });

})(jQuery);
// <html>
// <head>
//
// </head>
//
// <body onload="checkCookie()"></body>
//
//     </html>
// function setCookie(name,value,days) {
//     var expires = "";
//     if (days) {
//         var date = new Date();
//         date.setTime(date.getTime() + (days*24*60*60*1000));
//         expires = "; expires=" + date.toUTCString();
//     }
//     document.cookie = name + "=" + (value || "")  + expires + "; path=/";
// }
// function getCookie(name) {
//     var nameEQ = name + "=";
//     var ca = document.cookie.split(';');
//     for(var i=0;i < ca.length;i++) {
//         var c = ca[i];
//         while (c.charAt(0)==' ') c = c.substring(1,c.length);
//         if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
//     }
//     return null;
// }
// function eraseCookie(name) {
//     document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
// }


function getMyData() {
    var data = sessionStorage.getItem('dataStored');
    if(sessionStorage.getItem('dataStored') != null){
        var settings = {
            "url": "http://192.168.0.33:8180/prod-api/pmtheragrap/find?access_token="+data,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function (response) {
            var data = response;
            var tr;
            for (var i = 0; i < data.length; i++) {
                tr = $('<tr/>');
                // tr.append("<td>" + i + "</td>");
                tr.append("<td>" + data[i].thragrpId + "</td>");
                tr.append("<td>" + data[i].thragName + "</td>");
                tr.append("<td>" + data[i].desription + "</td>");
                tr.append("<td>" + data[i].ptgtgrpId + "</td>");
                tr.append("<td>" + data[i].userdslNo + "</td>");
                tr.append("<td>" + data[i].astatusFg + "</td>");
                tr.append("<td>" + data[i].userdslNo + "</td>");
                // tr += '<td><button class="delete" data-key="'+ data[i] +'">Delete</button></td>';
                tr.append("<td>" + '<button class="edit_product_class btn btn-warning btn-sm mt-1 mb-1" id="' + data[i]["thragrpId"] + '" value="' + data[
                        i]["thragrpId"] + '" >Edit</button>' + "</td>");
                tr.append("<td>" + '<button class="delete_product_class btn btn-danger btn-sm mt-1 mb-1" id="' + data[i]["thragrpId"] + '" value="' + data[
                        i]["thragrpId"] + '" >Delete</button>' + "</td>");
                $('tbody').append(tr);


            }
            $('button.edit_product_class').on('click', function() {
                // var data = sessionStorage.getItem('dataStored');
                var product_id = this.id;
                localStorage.setItem("product_id", product_id);
                console.log(localStorage.getItem("product_id"));
                window.location.href = "/edit";
            });
            $('button.delete_product_class').on('click', function() {
                // var data = sessionStorage.getItem('dataStored');
                var delete_product_id = this.id;
                var data = sessionStorage.getItem('dataStored');
                var settings = {
                    "url": "http://192.168.0.33:8180/prod-api/pmtheragrap/delete/"+delete_product_id,
                    "method": "DELETE",
                    "timeout": 0,
                    "headers": {
                        "Authorization": "Bearer "+data
                    },
                };

                $.ajax(settings).done(function (response) {
                    location.reload();
                    alert('Product has been deleted successfully.');
                });
                // localStorage.setItem("product_id", product_id);
                // console.log(localStorage.getItem("product_id"));
                // window.location.href = "/edit";
            });
        });
    }else{
        console.log('UnAuthorized');
        window.location.href = "/login";
    }

}

// function checkAuth() {
//     if(sessionStorage.getItem('dataStored') == null){
//         window.location.href = "/login";
//     }
// }

function  addProduct() {
    window.onload = function(){
        if(sessionStorage.getItem('dataStored') == null){
            window.location.href = "/login";
        }
    };
    var data = sessionStorage.getItem('dataStored');
    var status_fg = $('#astatusFg').val();
    var description = $('#desription').val();
    var group_id = $('#ptgtgrpId').val();
    var show_fg = $('#recshowFg').val();
    var thrag_name = $('#thragName').val();
    var thragrp_Id = $('#thragrpId').val();
    var userdsl_no = $('#userdslNo').val();
    console.log(status_fg);
    console.log(description);
    console.log(group_id);
    console.log(show_fg);
    console.log(thrag_name);
    console.log(thragrp_Id);
    console.log(userdsl_no);
    // console.log(description);
    var settings = {
        "url": "http://192.168.0.33:8180/prod-api/pmtheragrap/add?access_token="+data,
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": "application/json"
        },
        "data": JSON.stringify({"astatusFg":status_fg,"desription":description,"ptgtgrpId":group_id,"recshowFg":show_fg,"thragName":thrag_name,"thragrpId":thragrp_Id,"userdslNo":userdsl_no}),
    };
    $.ajax(settings).done(function (response) {
        // console.log(response);
        alert('Product Added Successfully!');
        window.location.href = "/dashboard";
    });

}

function editProduct() {
    // console.log(localStorage.getItem("product_id"));
    if(sessionStorage.getItem('dataStored') == null){
        window.location.href = "/login";
    }
    var edit_by_id = localStorage.getItem("product_id");
    var data = sessionStorage.getItem('dataStored');
    var settings = {
        "url": "http://192.168.0.33:8180/prod-api/pmtheragrap/find/by-id?id="+edit_by_id,
        "method": "GET",
        "timeout": 0,
        "headers": {
            "Authorization": "Bearer "+data
        },
    };

    $.ajax(settings).done(function (response) {

        $('#editdesription').attr('value', response.desription);
        $('#editptgtgrpId').attr('value', response.ptgtgrpId);
        $('#editthragName').attr('value', response.thragName);
    });
}

function  updateProduct() {
    var update_id = localStorage.getItem("product_id");
    var data = sessionStorage.getItem('dataStored');
    var upName = $('#editthragName').val();
    var upDescription = $('#editdesription').val();
    var upGroupId = $('#editptgtgrpId').val();
    var settings = {
        "url": "http://192.168.0.33:8180/prod-api/pmtheragrap/update?access_token="+data,
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": "application/json"
        },
        "data": JSON.stringify({"thragrpId":update_id,"thragName":upName,"desription":upDescription,"ptgtgrpId":upGroupId}),
    };
    $.ajax(settings).done(function (response) {
        window.location.href = "/dashboard";
        alert(response);
        // alert('Product Updated Successfully!');

    });
}

function logout() {
    sessionStorage.clear();
    localStorage.clear();
    window.location.href = "/login";
}