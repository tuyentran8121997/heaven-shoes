/*price range*/

$("#sl2").slider();

var RGBChange = function() {
    $("#RGB").css(
        "background",
        "rgb(" + r.getValue() + "," + g.getValue() + "," + b.getValue() + ")"
    );
};

/*scroll to top*/

$(document).ready(function() {
    $(function() {
        $.scrollUp({
            scrollName: "scrollUp", // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: "top", // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: "linear", // Scroll to top easing (see http://easings.net/)
            animation: "fade", // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});

$(document).ready(function() {
    // Change Price with Size
    $("#selSize").change(function() {
        var idSize = $(this).val();
        if (idSize == "") {
            return false;
        }
        $.ajax({
            type: "get",
            url: "/HeavenShoes/public/get-product-price",
            data: { idSize: idSize },
            success: function(resp) {
                var arr = resp.split("#");
                $("#getPrice").html(arr[0] + " VND");
                $("#price").val(arr[0]);
                if (arr[1] == 0) {
                    $("#cartButton").hide();
                    $("#availability").text("Hết hàng");
                } else {
                    $("#cartButton").show();
                    $("#availability").text("Còn hàng");
                }
            },

            error: function() {
                alert("Error");
            }
        });
    });
});

$(document).ready(function() {
    $(".changeImage").click(function() {
        var image = $(this).attr("src");
        $("#mainImage").attr("src", image);
    });
});

// Instantiate EasyZoom instances
var $easyzoom = $(".easyzoom").easyZoom();

// Setup thumbnails example
var api1 = $easyzoom.filter(".easyzoom--with-thumbnails").data("easyZoom");

$(".thumbnails").on("click", "a", function(e) {
    var $this = $(this);

    e.preventDefault();

    // Use EasyZoom's `swap` method
    api1.swap($this.data("standard"), $this.attr("href"));
});

// Setup toggles example
var api2 = $easyzoom.filter(".easyzoom--with-toggle").data("easyZoom");

$(".toggle").on("click", function() {
    var $this = $(this);

    if ($this.data("active") === true) {
        $this.text("Switch on").data("active", false);
        api2.teardown();
    } else {
        $this.text("Switch off").data("active", true);
        api2._init();
    }
});

$(document).ready(function() {
    //Validate Register form on keyup and submit
    $("#registerForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                accept: "[a-zA-Z]+"
            },
            password: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true,
                remote: "/HeavenShoes/public/check-email"
            }
        },
        messages: {
            name: {
                required: "Vui lòng nhập tên của bạn",
                minlength: "Tên phải có ít nhất 2 ký tự",
                accept: "Tên của bạn không được có ký tự đặc biệt"
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 6 ký tự"
            },
            email: {
                required: "Vui lòng nhập email của bạn",
                email: "Email vừa nhập không hợp lệ",
                remote: "Email đã tồn tại"
            }
        }
    });

    //Validate login form
    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Vui lòng nhập email của bạn",
                email: "Email vừa nhập không hợp lệ"
            },
            password: {
                required: "Vui lòng nhập mật khẩu"
            }
        }
    });

    //Validate update account form on keyup and submit
    $("#accountForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                accept: "[a-zA-Z]+"
            },
            address: {
                required: true,
                minlength: 10
            },
            city: {
                required: true,
                minlength: 2
            },
            state: {
                required: true,
                minlength: 2
            },
            country: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Vui lòng nhập tên của bạn",
                minlength: "Tên phải có ít nhất 2 ký tự",
                accept: "Tên của bạn không được có ký tự đặc biệt"
            },
            address: {
                required: "Vui lòng nhập địa chỉ của bạn",
                minlength: "Địa chỉ phải có ít nhất 10 ký tự"
            },
            city: {
                required: "Vui lòng nhập email của bạn",
                minlength: "Thành phố phải có ít nhất 2 ký tự"
            },
            state: {
                required: "Vui lòng nhập tên Tỉnh/Bang",
                minlength: "Tên Tỉnh/Bang phải có ít nhất 2 ký tự"
            },
            country: {
                required: "Vui lòng chọn quốc gia của bạn"
            }
        }
    });

    $("#passwordForm").validate({
        rules: {
            current_pwd: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            new_pwd: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            confirm_pwd: {
                required: true,
                minlength: 6,
                maxlength: 20,
                equalTo: "#new_pwd"
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function(element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .addClass("error");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .removeClass("error");
            $(element)
                .parents(".control-group")
                .addClass("success");
        }
    });

    //Check current User password
    $("#current_pwd").keyup(function() {
        var current_pwd = $(this).val();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "post",
            url: "/HeavenShoes/public/check-user-pwd",
            data: { current_pwd: current_pwd },
            success: function(resp) {
                if (resp == "false") {
                    $("#chkPwd").html(
                        "<font color='red'>Mật khẩu vừa nhập không đúng</font>"
                    );
                } else if (resp == "true") {
                    $("#chkPwd").html(
                        "<font color='green'>Mật khẩu đã nhập đúng</font>"
                    );
                }
            },
            error: function() {
                alert("error");
            }
        });
    });

    //Password Strength Script
    $("#myPassword").passtrength({
        minChars: 6,
        passwordToggle: true,
        tooltip: true,
        eyeImg: "/HeavenShoes/public/images/frontend_images/eye.svg"
    });

    // Copy Billing Address to Shipping Address Script
    $("#copyAddress").click(function() {
        if (this.checked) {
            $("#shipping_name").val($("#billing_name").val());
            $("#shipping_address").val($("#billing_address").val());
            $("#shipping_city").val($("#billing_city").val());
            $("#shipping_state").val($("#billing_state").val());
            $("#shipping_pincode").val($("#billing_pincode").val());
            $("#shipping_phone").val($("#billing_phone").val());
            $("#shipping_country").val($("#billing_country").val());
        } else {
            $("#shipping_name").val("");
            $("#shipping_address").val("");
            $("#shipping_city").val("");
            $("#shipping_state").val("");
            $("#shipping_pincode").val("");
            $("#shipping_phone").val("");
            $("#shipping_country").val("");
        }
    });
});

function selectPaymentMethod() {
    if ($("#Paypal").is(":checked") || $("#COD").is(":checked")) {
        /*alert("checked");*/
    } else {
        alert("Vui lòng chọn hình thức thanh toán!");
        return false;
    }
}
