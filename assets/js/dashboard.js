$(function () {
    $('.custom_table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
    $('.select2').select2();
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.alert-custom').delay(3000).slideUp(500);
  })