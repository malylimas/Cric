require('./bootstrap');




(function () {
    $('#date-container input').datepicker({
        format: "dd/mm/yyyy"
    });
})();




window.printDiv =

    (function () { // IIFE that returns a function
        return function (divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    })();