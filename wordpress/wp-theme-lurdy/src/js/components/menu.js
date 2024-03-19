import $ from 'jquery'

const menu = () => {
    const mobileMenu = $('.js-mobile-menu');
    const toggleMobileMenu = $('.js-toggle-mobile-menu');
    const dropdownMenu = $('.js-dropdown-menu')
    const dropdownItem =  $('.dropdown-item.nav-link');
    const activeDropdown =  $('.dropdown-item.active');
    const dropdownMenuIndicator = $('.menu-item.dropdown')

    if(activeDropdown.length){
        activeDropdown.parent().prev('a').addClass('active');
    }

    toggleMobileMenu.on('click', (e) => {
        e.preventDefault();
        toggleMobileMenu.add(mobileMenu).toggleClass('is-active');
    });

    dropdownMenuIndicator.on('click', function(e){
        e.preventDefault();

        const current = $(this);
        const currentSubmenu = current.children('.js-dropdown-menu');
        const otherSubmenus = dropdownMenuIndicator.not($(this)).children('.js-dropdown-menu');

        currentSubmenu.add(current).toggleClass('is-active');
        otherSubmenus.add(dropdownMenuIndicator.not($(this))).removeClass('is-active');
    });

    dropdownItem.on('click', function(e){
        e.stopPropagation();
    });

    $(document).on('click', function(e) {
        if($(window).width() < 1200){
            return;
        }

        if (!dropdownMenuIndicator.is(e.target) && dropdownMenuIndicator.has(e.target).length === 0) {
            $(dropdownMenu).removeClass('is-active');
        }
    });
}

export default menu;