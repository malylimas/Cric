"use strict";
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
            var group = element.closest('.form-group')
            group.addClass('has-error');

             var select = window.$("select[name=" + key + "]");
            select.popover(options);
            select.popover('show');
            //count++;
            var group = select.closest('.form-group')
            group.addClass('has-error');


        }
    };
})();


window.convertToJson = (function () {
    return function (valueJsonString) {

        var search = '&quot;';
        var replace = '"'
        var jsonString = valueJsonString.split(search).join(replace);

        return JSON.parse(jsonString);
    };

})();


window.loadChildCombo = (function () {
    return function (father, child, childData, childId, childDisplay) {
        var fatherElement = $(father);
        var childElement = $(child);

        fatherElement.on('change', function () {
            var value = this.value;

            loadData(childElement,childData,value,childId,childDisplay)
        })

         loadData(childElement,childData,fatherElement.val(),childId,childDisplay)
    };
})();

window.loadData = (function () {
    return function (element, data, value, childId, childDisplay) {
            var newOptions = _.filter(data, function (o) {
               return o[childId].toString() === value
            });

            element.find('option')
                .remove()
                .end();

            _.forEach(newOptions, function (item) {
                element.append($("<option />").val(item.id).text(item[childDisplay]));
            });

      
    };
})();
