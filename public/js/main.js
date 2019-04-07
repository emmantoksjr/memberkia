
$("#continuebtn").click(function (){
    var ownerType = $('.__selectind').val();
    if (ownerType === 'artisan') {
        $('#Third-Div').show();
        $('#First-Div').hide();
        $('#Second-Div').hide();
        $('#Forth-Div').hide();
        $('#Six-Div').hide();
        $('#Seven-Div').hide();
        $('#Five-Div').hide();
    }else if(ownerType === 'employment'){
        $('#Third-Div').hide();
        $('#First-Div').hide();
        $('#Second-Div').show();
        $('#Forth-Div').hide();
        $('#Six-Div').hide();
        $('#Seven-Div').hide();
        $('#Five-Div').hide();
    }else if(ownerType === 'employer'){
        $('#Third-Div').hide();
        $('#First-Div').hide();
        $('#Second-Div').hide();
        $('#Forth-Div').show();
        $('#Six-Div').hide();
        $('#Seven-Div').hide();
        $('#Five-Div').hide();
    }else if(ownerType === 'recruiter'){
        $('#Third-Div').hide();
        $('#First-Div').hide();
        $('#Second-Div').hide();
        $('#Forth-Div').hide();
        $('#Six-Div').hide();
        $('#Seven-Div').hide();
        $('#Five-Div').show();
    }else if(ownerType === 'customer'){
        $('#Third-Div').hide();
        $('#First-Div').hide();
        $('#Second-Div').hide();
        $('#Forth-Div').hide();
        $('#Six-Div').show();
        $('#Seven-Div').hide();
        $('#Five-Div').hide();
    }else if(ownerType === 'retiree'){
        $('#Third-Div').hide();
        $('#First-Div').hide();
        $('#Second-Div').hide();
        $('#Forth-Div').hide();
        $('#Six-Div').hide();
        $('#Seven-Div').show();
        $('#Five-Div').hide();
    }else if(ownerType === "select"){
        alert('Please Signup as Artisan or Employment or Employe or Recruiter or Customer or Retiree ');
        $('#Third-Div').hide();
        $('#First-Div').show();
        $('#Second-Div').hide();
        $('#Forth-Div').hide();
        $('#Six-Div').hide();
        $('#Seven-Div').hide();
        $('#Five-Div').hide();
    }
});



function showNextForm3() {
        $("#First-Div").css("display", "none");
        $("#Second-Div").css("display", "block");
    };

    function showNextForm1() {
        $("#Second-Div").css("display", "none");
        $("#Third-Div").css("display", "block");
    };

    function showNextForm2() {
        $("#Third-Div").css("display", "none");
        $("#Five-Div").css("display", "block");
    };

    function showNextForm3() {
        $("#Forth-Div").css("display", "none");
        $("#Five-Div").css("display", "block");
    };

    // previous 
    function showPrevForm() {
        $("#Second-Div").css("display", "none");
        $("#First-Div").css("display", "block");
        $("#Forth-Div").css("display", "none");
    };

    function showPrevForm1() {
        $('#Third-Div').css("display", "none");
        $('#Second-Div').css("display", "block");
        $('#First-Div').css("display", "none");
        $("#Five-Div").css("display", "none");
        $("#Forth-Div").css("display", "none");
    };

    function showPrevForm2() {
        $("#Forth-Div").css("display", "block");
        $("#Third-Div").css("display", "none");
         $("#Five-Div").css("display", "none");
    };


    function showPrevForm() {
        var ownerType = $('.__selectind').val();
        if (ownerType === 'artisan') {
            $('#First-Div').css("display", "block");
            $('#Second-Div').css("display", "none");
            $('#Forth-Div').css("display", "none");
            $("#Five-Div").css("display", "none");
            $("#Third-Div").css("display", "none");
            $("#Six-Div").css("display", "none");
            $("#Seven-Div").css("display", "none");
        }else if(ownerType === 'employment'){
            $('#First-Div').css("display", "block");
            $('#Second-Div').css("display", "none");
            $('#Forth-Div').css("display", "none");
            $("#Five-Div").css("display", "none");
            $("#Third-Div").css("display", "none");
            $("#Six-Div").css("display", "none");
            $("#Seven-Div").css("display", "none");
        }else if(ownerType === 'employer'){
            $('#First-Div').css("display", "block");
            $('#Second-Div').css("display", "none");
            $('#Forth-Div').css("display", "none");
            $("#Five-Div").css("display", "none");
            $("#Third-Div").css("display", "none");
            $("#Six-Div").css("display", "none");
            $("#Seven-Div").css("display", "none");
        }else if(ownerType === 'recruiter'){
            $('#First-Div').css("display", "block");
            $('#Second-Div').css("display", "none");
            $('#Forth-Div').css("display", "none");
            $("#Five-Div").css("display", "none");
            $("#Third-Div").css("display", "none");
            $("#Six-Div").css("display", "none");
            $("#Seven-Div").css("display", "none");
        }else if(ownerType === 'customer'){
            $('#First-Div').css("display", "block");
            $('#Second-Div').css("display", "none");
            $('#Forth-Div').css("display", "none");
            $("#Five-Div").css("display", "none");
            $("#Third-Div").css("display", "none");
            $("#Six-Div").css("display", "none");
            $("#Seven-Div").css("display", "none");
        }else if(ownerType === 'retiree'){
            $('#First-Div').css("display", "block");
            $('#Second-Div').css("display", "none");
            $('#Forth-Div').css("display", "none");
            $("#Five-Div").css("display", "none");
            $("#Third-Div").css("display", "none");
            $("#Six-Div").css("display", "none");
            $("#Seven-Div").css("display", "none");
        }
    };

    // show and hide div using radio
    $(':radio').change(function (event) {
        var id = $(this).data('id');
        $('#' + id).addClass('none').siblings().removeClass('none');
    });

   // end