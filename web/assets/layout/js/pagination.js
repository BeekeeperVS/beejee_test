var Pagination = function () {
    return {
        init: init
    };

    function init() {
        $(document).ready(function () {

            $('.pagination-select').on('change', function () {
                var $this = $(this);
                url = $this.data('url');
                var urlNew = url.replace('per-page=1', 'per-page='+$this.val());

                window.location = urlNew;
            });
        });
    }
}();

Pagination.init();
