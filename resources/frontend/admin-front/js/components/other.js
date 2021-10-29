require('metismenu');
// swal =  require('sweetalert');

var sideMenu = $('#side-menu').metisMenu({
    subMenu: '.nav-second-level, .nav-third-level'
});

sideMenu.on('show.metisMenu', function (e) {});

// forced link
(() => {
    const hasParent = ($el, $parent) => {
        return $el.closest($parent).length > 0
    }

    const $links = $('.forced-link')
    $links.each(function () {
        const $link = $(this)
        $link.on('click', event => {
            if (
                !(
                    hasParent($(event.target), $('.mailbox-table__tools')) ||
                    hasParent($(event.target), $('.mailbox-table__attachment'))
                )
            ) {
                const href = $link.data('href')
                window.location = href
            }
        })
    })
})()
