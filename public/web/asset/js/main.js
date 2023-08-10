function isEmail($email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailReg.test( $email );
}

function isPhone(phone) {
	var filter = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/;
	return filter.test(phone);
}

var format = function(num){
    var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0) {
      parts = str.split(".");
      str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
      if(str[j] != ",") {
        output.push(str[j]);
        if(i%3 == 0 && j < (len - 1)) {
          output.push(",");
        }
        i++;
      }
    }
    formatted = output.reverse().join("");
    return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};

$(document).ready(function () {
/* HÀM CHỈ CHO NHẬP SỐ */
    $(".input-number, #phone, #quantity").keypress(function(event) {
        return /\d/.test(String.fromCharCode(event.keyCode));
    });

    $(".input-money").keyup(function () {
        var money = $(this).val();
        $('.input-convert-amount span').html(format(money));
        if(money == ''){
            $('.input-convert-amount span').html('0');
        }
    });

    var usernameInput = document.getElementById('name');
		if(usernameInput != null){
            $('#name').on('keydown, keyup', function () {
                var username = $("#name").val();
                if( username == ''){
                    $("#name-invalid-tooltip").html("Họ và tên không được để trống!");
                    $("#name").addClass('is-invalid');
                    $("#name").removeClass('is-valid');
                }
                else{
                    $("#name").removeClass('is-invalid');
                    $("#name").addClass('is-valid');
                }
            })
		}

	var emailInput = document.getElementById('email');
		if(emailInput != null) {
            $('#email').on('keydown, keyup', function () {
                let  email = $("#email").val();
                var check_mail = isEmail(email);
                if( email != ''){
                    if( check_mail == false) {
                        $("#email-invalid-tooltip").html("Địa chỉ email không đúng định dạng!");
                        $("#email").addClass('is-invalid');
                        $("#email").removeClass('is-valid');
                    }
                    else{
                        $("#email").removeClass('is-invalid');
                        $("#email").addClass('is-valid');
                    }
                }
                if( email == '') {
                    $("#email-invalid-tooltip").html("Địa chỉ email không được để trống!");
                    $("#email").addClass('is-invalid');
                    $("#email").removeClass('is-valid');
                }
            })

		}


	var phoneInput = document.getElementById('phone');
		if(phoneInput != null){
            $('#phone').on('keydown, keyup', function () {
                let  phone = $("#phone").val();
                var check_phone = isPhone(phone);
                if( phone != ''){
                    if( check_phone == false) {
                        $("#phone-invalid-tooltip").html("Số điện thoại không đúng định dạng!");
                        $("#phone").addClass('is-invalid');
                        $("#phone").removeClass('is-valid');
                    }
                    else{
                        $("#phone").removeClass('is-invalid');
                        $("#phone").addClass('is-valid');
                    }

                }
                if( phone == '') {
                    $("#phone-invalid-tooltip").html("Số điện thoại không được để trống!");
                    $("#phone").addClass('is-invalid');
                }
            })


		}

    var addressInput = document.getElementById('address');
		if(addressInput != null){
            $('#address').on('keydown, keyup', function () {
                var address = $("#address").val();
                if( address == ''){
                    $("#address-invalid-tooltip").html("Địa chỉ không được để trống!");
                    $("#address").addClass('is-invalid');
                    $("#address").removeClass('is-valid');
                }
                else{
                    $("#address").removeClass('is-invalid');
                    $("#address").addClass('is-valid');
                }
            })


		}

	var passwordInput = document.getElementById('password');
		if(passwordInput != null){
            $('#password').on('keydown, keyup', function () {
                var password = $("#password").val();
                if( password == '') {
                        $("#password-invalid-tooltip").html("Mật khẩu không được để trống!");
                        $("#password").addClass('is-invalid');
                }
                else{
                    if (password.length < 6) {
                        $("#password-invalid-tooltip").html("Mật khẩu phải từ 6 kí tự trở lên!");
                        $("#password").addClass('is-invalid');
                        $("#password").removeClass('is-valid');
                    }
                    else{
                        $("#password").removeClass('is-invalid');
                        $("#password").addClass('is-valid');
                    }
                }
            })


		}


	var rePassInput = document.getElementById('re_password');
		if(rePassInput != null) {
            $('#re_password').on('keydown, keyup', function () {
                var password = $("#password").val();
                console.log(password);
                var re_pass = $("#re_password").val();
                if( re_pass == ''){
                    $("#re_password-invalid-tooltip").html("Nhập lại mật khẩu không được để trống!");
                    $("#re_password").addClass('is-invalid');
                }
                else{
                    if( re_pass.length < 6) {
                        $("#re_password-invalid-tooltip").html("Mật khẩu phải từ 6 kí tự trở lên!");
                        $("#re_password").addClass('is-invalid');
                        $("#re_password").removeClass('is-valid');
                    }
                    else{
                        if(re_pass != password){
                            $("#re_password-invalid-tooltip").html("Nhập lại mật khẩu phải giống mật khẩu trở lên!");
                            $("#re_password").addClass('is-invalid');
                            $("#re_password").removeClass('is-valid');
                        }
                        else{
                            $("#re_password").removeClass('is-invalid');
                            $("#re_password").addClass('is-valid');
                        }
                    }
                }
            })
		}

    var checkboxInput = document.getElementById('checkbox');
		if(checkboxInput != null){
            $("#checkbox").change(function() {
                if(this.checked) {
                    $("#checkbox").addClass('is-valid');
                    $("#checkbox").removeClass('is-invalid');
                }
                else
                {
                    $("#checkbox").addClass('is-invalid');
                    $("#checkbox").removeClass('is-valid');
                }
            });

		}

    var contentInput = document.getElementById('content');
		if(contentInput != null){
            $('#content').on('keydown, keyup', function () {
                var content = $("#content").val();
                if( content == ''){
                    $("#content-invalid-tooltip").html("Ghi chú không được để trống!");
                    $("#content").addClass('is-invalid');
                    $("#content").removeClass('is-valid');
                }
                else{
                    $("#content").removeClass('is-invalid');
                    $("#content").addClass('is-valid');
                }
            })
		}




})
/* nav */
$(document).ready(function(){

    // Mobile Menu Toggle - Show & Hide

    $('.mobile-menu-toggler').on('click', function (e) {
		$('body').toggleClass('mmenu-active');
		$(this).toggleClass('active');
		e.preventDefault();
    });

    $('.mobile-menu-overlay, .mobile-menu-close').on('click', function (e) {
		$('body').removeClass('mmenu-active');
		$('.menu-toggler').removeClass('active');
		e.preventDefault();
    });

	// Add Mobile menu icon arrows to items with children
    $('.mobile-menu').find('li').each(function () {
        var $this = $(this);

        if ( $this.find('ul').length ) {
            $('<span/>', {
                'class': 'mmenu-btn'
            }).appendTo($this.children('a'));
        }
    });

    // Mobile Menu toggle children menu
    $('.mmenu-btn').on('click', function (e) {
        var $parent = $(this).closest('li'),
            $targetUl = $parent.find('ul').eq(0);

            if ( !$parent.hasClass('open') ) {
                $targetUl.slideDown(300, function () {
                    $parent.addClass('open');
                });
            } else {
                $targetUl.slideUp(300, function () {
                    $parent.removeClass('open');
                });
            }

        e.stopPropagation();
        e.preventDefault();
    });
    /* hide and show password */
    $(".toggle-password").click(function() {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
		  input.attr("type", "text");
		} else {
		  input.attr("type", "password");
		}
	});


    $('#btn-search').click(function (e) {
        e.preventDefault();
        $('.header-search').slideToggle();

    });


    /* load file image */
    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#avatarImage').attr('src', e.target.result);
            $('#avatarImage').hide();
            $('#avatarImage').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatar").change(function() {
        readURL(this);
    });

    /* scroll to top */
    // Scroll Top Hide Show
    $(window).on('scroll', function(){
        if ($(this).scrollTop() > 250) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    //Scroll To Top Animate
    $('.scroll-to-top').on('click', function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    // button-contact
    $('#contact-button').on('click', function(){
        $(this).find('i').toggleClass('fa-times');
        $(this).toggleClass('open');
    });

    $(document).on("scroll", function(){
        var pixels = $(document).scrollTop();
        var pageHeight = $(document).height() - $(window).height();
        var progress = 100 * pixels / pageHeight;

        $("#blog .progress").css("width", progress + "%");
      })


});

/* js thuat */




