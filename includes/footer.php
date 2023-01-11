<footer class="main-footer" style="text-align: center ;">
  <strong>Copyright &copy; 2022 - Todos os direitos reservados.</strong>

  <div class="float-right d-none d-sm-inline-block">
    <b>AG Versão</b> 2.0
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"></script>
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>

<!-- fullCalendar 2.2.5 -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.js"></script>

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": [
        "colvis",
        {
          extend: 'print',
          exportOptions: {
            columns: ':visible',
          },
        },
        {
          extend: 'pdf',
          exportOptions: {
            columns: ':visible',
          },
        }
      ],
      "language": {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ Resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
        },
        "oAria": {
          "sSortAscending": ": Ordenar colunas de forma ascendente",
          "sSortDescending": ": Ordenar colunas de forma descendente"
        },
        "buttons": {
          "copy": "Copiar",
          "print": "Imprimir",
          "colvis": "Colunas"
        }
      },

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
  function calculaDataFin() {
    var datainicial = document.getElementById("data").value;
    var dias = 12;
    var partes = datainicial.split("-");
    var ano = partes[0];
    var mes = partes[1] - 1;
    var dia = partes[2];

    datainicial = new Date(ano, mes, dia);
    datafinal = new Date(datainicial);
    datafinal.setDate(datafinal.getDate() + dias);

    var dd = ("0" + datafinal.getDate()).slice(-2);
    var mm = ("0" + (datafinal.getMonth() + 1)).slice(-2);
    var y = datafinal.getFullYear();

    var dataformatada = y + '-' + mm + '-' + dd;
    var valor = document.getElementById('datafin').value = dataformatada;
    return valor;

  }
</script>

<script>
  var data = new Date();
  var dia = String(data.getDate()).padStart(2, '0');
  var mes = String(data.getMonth() + 1).padStart(2, '0');
  var ano = data.getFullYear();
  dataAtual = dia + '/' + mes + '/' + ano;
  document.getElementById("dataVenda").value = dataAtual;
</script>


</body>

</html>

</body>

</html>