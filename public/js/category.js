$(document).on('click', '.dropdown-menu', ($event) => $event.stopPropagation());
if ($(window).width() < 992) {
    $('.dropdown-menu a').click(($event) => {
        $event.preventDefault();
        if ($(this).next('.submenu').length) {
            $(this).next('.submenu').toggle();
        }
        $('.dropdown').on('hide.bs.dropdown', () => $(this).find('.submenu').hide());
    });
}