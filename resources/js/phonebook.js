$(document).ready(function(){
  var maxField = 20;
  var addButton = $('.add_button');
  var wrapper = $('.field_wrapper');
  var fieldHTML = '';
  fieldHTML += '<div class="input-group input-group-sm mb-3">';
  fieldHTML += '<input type="text" class="form-control" name="phone[]" placeholder="Phone number">';
  fieldHTML += '<div class="input-group-prepend">';
  fieldHTML += '     <span class="input-group-text remove_button">[X]</span>';
  fieldHTML += '</div>';
  fieldHTML += '</div>';
  var x = 1;
  
  //Add button is clicked limit max field
  $(addButton).click(function(){
      if(x < maxField){ 
          x++;
          $(wrapper).append(fieldHTML);
      }
  });
  
  //Remove button is clicked
  $(wrapper).on('click', '.remove_button', function(e){
      e.preventDefault();
      $(this).closest('.input-group').remove();
      x--;
  });
});