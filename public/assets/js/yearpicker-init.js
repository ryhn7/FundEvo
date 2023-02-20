const year1 = document.getElementById('year1');
const yearForm = document.getElementById('yearFilter');

$(document).ready(function () {
    $(".yearpicker").yearpicker({
        beforeShow: function (el) {
            // set the current value before showing the widget
            $(this).data('previous', $(el).val());
        },

        onChange: function (year) {
            // compare the new value to the previous one
            if ($(this).data('previous') != year) {
                // do whatever has to be done, e.g. log it to console
                year1.value = year;
                yearForm.submit();
            }
        }
    });
});