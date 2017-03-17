function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
}
    $('#sandbox-container .input-group.datehaFiltro').datepicker({
        startView: 1,
        minViewMode: 1,
        language: "es"
    });