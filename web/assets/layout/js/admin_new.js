var Admin = function () {
    return {
        init: init
    };

    function init() {
        $(document).ready(function () {

            // Редактировани загруженых данных (страница проверки даных с файла)
            $('.accrual').on('mousedown', function () {
                $(this).trigger("change");
            });
            $('.accrual').on('keyup', function () {
                $(this).trigger("change");
            });

            $('.accrual').on('change', function () {
                var $this = $(this);
                var url = $this.data('url');
                var userId = $this.data('user-id');
                var accrualId = $this.data('accrual-id');
                var valueInput = $this.val();
                var dataSend = {value: valueInput, userId: userId, accrualId: accrualId};

                $.post(url, dataSend, function (data) {

                    $('.sum-accrual-' + userId + ' .accrual-sum').val(data);
                });
            });

            $('.btn-active').on('click', function () {
                var $this = $(this);
                $this.attr('disabled', 'disabled');
                var url = $this.data('url');
                $.post(url, function (data) {
                    $this.attr('class', data['class']);
                    $this.text(data['value']);
                    $this.attr('disabled', false);
                });
            });


            $('.replace-password-show').on('change', function () {
                var $this = $(this);
                var elementsPassword = $('div.password');
                if ($this.is(":checked")) {
                    for (var i = 0; i < elementsPassword.length; i++) {
                        $(elementsPassword[i]).removeClass('hide');
                    }
                } else {
                    for (var i = 0; i < elementsPassword.length; i++) {
                        $(elementsPassword[i]).addClass('hide');
                    }
                }

            });

            // Смена табельного номера
            $('.cell-user-workId').on('dblclick', function () {
                var $this = $(this);
                var span = $(this).find('.span-user-workId');
                $(span).trigger('dblclick');
            });

            $('.span-user-workId').on('dblclick', function () {
                var $this = $(this);
                var userId = $this.data('user');
                $('.edit-workId-user-' + userId).trigger('click');
            });
            $('.edit-workId-btn').on('click', function () {
                var $this = $(this);
                var userId = $this.data('user');
                showEditWorkId($this, userId);

            });

            $('.input-user-workId').on('keypress', function (e) {
                var $this = $(this);
                var userId = $this.data('user');
                if (e.which == 13) {
                    $('.save-workId-user-' + userId).trigger('click');
                }
            });

            $('.save-workId-btn').on('click', function () {
                var $this = $(this);
                updateWorkId($this);
            })

            // Hide / Show filter
            $('.btn-filter').on('click', function () {
                var $this = $(this);
                var filter = $('.filter-accountant');
                var action = $this.data('action');
                if (action == 'show') {
                    $(filter).removeClass('hide');
                    $this.data('action', 'hide');
                }
                if (action == 'hide') {
                    $(filter).addClass('hide');
                    $this.data('action', 'show');
                }

            });
        });
    }

    function showEditWorkId($this, userId) {
        $this.addClass('hide');
        $('.save-workId-user-' + userId).removeClass('hide');
        $('.workId-user-' + userId).removeClass('hide');
        $('span.workId-user-' + userId).addClass('hide');
    }

    function hideEditWorkId($this, userId) {
        $this.addClass('hide');
        $('.edit-workId-user-' + userId).removeClass('hide');
        $('.workId-user-' + userId).addClass('hide');
        $('span.workId-user-' + userId).removeClass('hide');
    }

    function updateWorkId($this) {
        var userId = $this.data('user');
        var $inputElement = $('.input-user-workId.workId-user-' + userId);
        var $spanElement = $('.span-user-workId.workId-user-' + userId);
        var url = $this.data('url');
        var dataSend = {
            id: $this.data('user'),
            workId: $inputElement.val()
        };
        $.post(url, dataSend, function (data) {
            if (data.success) {
                $spanElement.text($inputElement.val());
                hideEditWorkId($this, userId);
                $inputElement.removeClass('input-error');
            } else {
                $inputElement.addClass('input-error');
                popupErrorShow(data.message);

            }
        });
    }

    function popupErrorShow(text, title = 'Ошибка') {
        $('#popup .modal-header').addClass('alert-danger');
        $('#popup .modal-body .modal-text').text(text);
        $('#popup .modal-header .modal-title').text(title);
        $('#popup').modal('show');
    }

    function popupSuccessShow(text, title) {
        $('#popup .modal-header').addClass('alert-primary');
        $('#popup .modal-body .modal-text').text(text);
        $('#popup .modal-header .modal-title').text(title);
        $('#popup').modal('show');
    }
}();

Admin.init();