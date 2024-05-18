    <!-- all js script will be placed here -->
    <script src="./libs/javascript/script.js"></script>
    <script src="./libs/javascript/login-script.js"></script>
    <script src="./libs/javascript/user-script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
// JavaScript for deleting product
$(document).on('click', '.update-object', function(){
  
    var id = $(this).attr('update-id');
  
    if (confirm("Are you sure to Approved this request?")) {
        $.post('update_request.php', {
            object_id: id
        }, function(data){
            location.reload();
        }).fail(function() {
            alert('Unable to Update.');
        });
    }
  
    return false;
});
$(document).on('click', '.decline-object', function(){
  
  var id = $(this).attr('decline-id');

  if (confirm("Are you sure to Decline this request?")) {
      $.post('decline_request.php', {
          object_id: id
      }, function(data){
          location.reload();
      }).fail(function() {
          alert('Unable to Update.');
      });
  }

  return false;
});
</script>
</body>
</html>