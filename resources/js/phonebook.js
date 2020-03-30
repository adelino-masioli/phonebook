$(document).ready(function(){
  var maxField = 20;
  var addButton = $('.add_button');
  var wrapper = $('.field_wrapper');
  var fieldHTML = '';
  fieldHTML += '<div class="input-group input-group-sm mb-3">';
  fieldHTML += '<select class="custom-select" id="inputGroupSelect01" name="phone[2][type]">';
  fieldHTML += '    <option value="1">Phone</option>';
  fieldHTML += '    <option value="2">WhatsApp</option>';
  fieldHTML += '</select>';
  fieldHTML += '<input type="text" class="form-control" name="phone[2][phone]" placeholder="Phone number">';
  fieldHTML += '<div class="input-group-prepend">';
  fieldHTML += '     <span class="input-group-text remove_button">[X]</span>';
  fieldHTML += '</div>';
  fieldHTML += '</div>';
  var x = 1;
  var i = 2;
  
  //Add button is clicked limit max field
  $(addButton).click(function(){
      if(x < maxField){ 
          x++;
          $(wrapper).append('<div class="input-group input-group-sm mb-3">\
            <select class="custom-select" id="inputGroupSelect01" name="phone['+ i +'][type]">\
                <option value="1">Phone</option>\
                <option value="2">WhatsApp</option>\
            </select>\
            <input type="text" class="form-control" name="phone['+ i +'][phone]" placeholder="Phone number">\
            <div class="input-group-prepend">\
                 <span class="input-group-text remove_button">[X]</span>\
            </div>\
            </div>'
          );
      }
      i++;
  });
  
  //Remove button is clicked
  $(wrapper).on('click', '.remove_button', function(e){
      e.preventDefault();
      $(this).closest('.input-group').remove();
      x--;
  });
});