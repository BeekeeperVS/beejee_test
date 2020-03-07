var MySelectsize = function () {
    return {
        init: init
    };

    function init() {
        $(document).ready(function () {
            $('.selectize-role').selectize({
                sortField: 'text'
            });

            $('.selectize-filter').selectize({
                sortField: 'text'
            });
        });
    }
}();

MySelectsize.init();
