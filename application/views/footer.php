<script type="text/javascript" src="assets/lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/lte/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="assets/lte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/lte/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
<script type="text/javascript" src="assets/lte/plugins/fastclick/fastclick.js"></script>
<script type="text/javascript" src="assets/lte/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="assets/lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  var AdminLTEOptions = {
    //Sidebar push menu toggle button selector
    sidebarToggleSelector: "[data-toggle='push-menu']",
    //Activate sidebar push menu
    sidebarPushMenu: true
  };
</script>
<script type="text/javascript" src="assets/lte/dist/js/app.min.js"></script>
<script>
$(function () {
//Date picker
$('#datepicker').datepicker({
  format: 'dd/mm/yyyy',
  language: 'id',
  autoclose: false
});
  //'d MM yyyy'
});
</script>
<script >
$(document).ready(function(){
    $('#dataTables').DataTable();
});
</script>