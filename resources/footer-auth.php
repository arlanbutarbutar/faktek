<script src="https://pmb.unwira.ac.id/assets/motaadmin/vendor/global/global.min.js"></script>
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