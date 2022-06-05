<!-- plugins:js -->
<script src="assets/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- <script src="assets/js/dashboards.js"></script> -->
<!-- End custom js for this page-->

<script>
    const messageSuccess = $('.message-success').data('message-success');
    const messageInfo = $('.message-info').data('message-info');
    const messageWarning = $('.message-warning').data('message-warning');
    const messageDanger = $('.message-danger').data('message-danger');

    if(messageSuccess){
      Swal.fire({
        icon: 'success',
        title: 'Berhasil Terkirim',
        text: messageSuccess,
      })
    }

    if(messageInfo){
      Swal.fire({
        icon: 'info',
        title: 'For your information',
        text: messageInfo,
      })
    }
    if(messageWarning){
      Swal.fire({
        icon: 'warning',
        title: 'Peringatan!!',
        text: messageWarning,
      })
    }
    if(messageDanger){
      Swal.fire({
        icon: 'error',
        title: 'Kesalahan',
        text: messageDanger,
      })
    }
</script>
<script>
  $(document).ready(function(){
    $('#search-in-page').on('keyup',function(){
      $.get('search.php?key='+$('#search-in-page').val(),function(data){
        $('#search-page').html(data);
      });
    });
  }); 
</script>