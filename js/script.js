$(function (){

  $('#contact-form').submit(function(e){
    e.preventDefault();
    $('.comments').empty();
    var postdata = $('#contact-form').serialize();

    $.ajax({
        type:'POST',
        url: 'php/contact.php',
        data: postdata,
        dataType: 'json',
        success: function(res){
          if (res.isSuccess) {
            $('#contact-form').append("<p class='thanks'> Merci! </p>");
            $('#contact-form')[0].reset();
          }
          else {
            $('#firstname+.comments').html(res.firstnameError);
            $('#name+.comments').html(res.nameError);
            $('#email+.comments').html(res.emailError);
            $('#message+.comments').html(res.messageError);
          }
        }

    });

  });

});
