$(document).ready(function() {
  $("#myForm").submit(function(event) {
  
    event.preventDefault();

 
    var formData = {
      'Username': $('input[name=Username]').val(),
      'age': $('input[name=age]').val(),
      'dob': $('input[name=dob]').val(),
      'contact': $('input[name=contact]').val(),
      'address': $('input[name=address]').val(),
      'about': $('input[name=about]').val(),


      
    };
  
    $.ajax({
      type: 'POST',
      url: '../php/profile.php',
      data: formData,
      dataType: 'json',
      encode: true
    })
    .done(function(data) {
      console.log(data);
      if (data.success == true) {
        window.location.href = '../login.html';
      }
      else {
        alert(data.message);
      }
    });
  });
});

  