$(function () {

    $('.show-privetKey').on('click', function () {
        $('.update-privet-block').removeClass('hide');
    });

    $('.set-privetKey').on('click', function () {
        var $this  = $(this);
        var privetKey = $('.privetKey-value').val();
        var userLogin = $this.data('user-login')
        var object = {
            userLogin: userLogin,
            applicationAlias: 'FinanceManager',
            privetKey: privetKey
        };

        localStorage.setItem('financeManagerCrypt', JSON.stringify(object));

        $('.update-privet-block').addClass('hide');
    });
});