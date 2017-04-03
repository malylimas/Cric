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



window.showError = (function () {
    return function (errors) {
        var count = 2;
        for (var key in errors) {
            var message = errors[key][0];
            var place = 'left'
            var mod = count % 2;

            if (mod === 0) {
                place = 'right';
            }

            var options = {
                title: 'Error',
                content: message,
                container: 'body',
                trigger: 'manual',
                placement: place,
                template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>'
            }
            var element = window.$("input[name=" + key + "]");
            element.popover(options);
            element.popover('show');
            //count++;
            var group=element.closest('.form-group')
            group.addClass('has-error');
        

        }
    };
})();