$(document).ready(function() {
  $("#myForm").submit(function(event) {
 
    event.preventDefault();

 
    var formData = {
      'Email': $('input[name=Email]').val(),
      'password': $('input[name=password]').val(),
      
    };
  
    $.ajax({
      type: 'POST',
      url: '../php/login.php',
      data: formData,
      dataType: 'json',
      encode: true
    })
    .done(function(data) {
      console.log(data);
      if (data.success == true) {
        window.location.href = '../profile.html';
      }
      else {
        alert(data.message);
      }
    });
  });
});


