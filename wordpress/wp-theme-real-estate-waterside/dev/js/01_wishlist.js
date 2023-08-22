(function ($) {
    $(() => {
        const toggleModal = $('.js-toggle-wishlist-modal');
        const wishlistModal = $('.js-wishlist-modal');

        function createHTMLWishlistItem(data) {
            return `<div class="wishlist__item js-wishlist-item">`+
            ((data.image)?
            +`<img src="${data.image}" class="wishlist__item--image ofi-contain-center-center">`
            : '')
            +`<div>
                    <p class="wishlist__item--title">${data.name}</p>
                    <p class="wishlist__item--information">${data.project != null ? data.project : ''}</p>
                    <p class="wishlist__item--information">${data.attributes}</p>
                </div>
                <img src="${localize.wishlist_assets.trashbin}" class="js-delete-wishlist-item delete-wishlist-item" data-id="${data.id}">
            </div>`;
        }

        function loadWishlistItems(wishlist) {
            $.ajax({
                url: localize.ajaxurl,
                type: 'POST',
                data: {
                    action: 'load_wishlist_items',
                    data: wishlist,
                },
                error(error) {
                    console.log(error);
                    return;
                },
                success(response) {
                    const result = JSON.parse(response);
                    result.map((e) => {
                        var wishlistItem = createHTMLWishlistItem(e);
                        $('.js-wishlist-items-wrapper').append(wishlistItem);
                    });
                },
            });
        }

        if (Cookies.get('wishlist')) {
            var wishlist = JSON.parse(Cookies.get('wishlist'));
            loadWishlistItems(wishlist);
        } else {
            var wishlist = [];
            Cookies.set('wishlist', JSON.stringify(wishlist));
        }

        toggleModal.on('click', (e) => {
            e.preventDefault();
            wishlistModal.toggleClass('is-visible');
        });

        $(document).on('click', '.js-add-to-wishlist', function (e) {
            e.preventDefault();
            const id = $(this).data('id');

            if (!wishlist.includes(id)) {
                wishlist.push(id);
                loadWishlistItems([id]);
            } else {
                wishlist = wishlist.filter((e) => e != id);
            }
            Cookies.set('wishlist', JSON.stringify(wishlist));
        });

        $(document).on('click', '.js-delete-wishlist-item', function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            wishlist = wishlist.filter((e) => e != id);
            Cookies.set('wishlist', JSON.stringify(wishlist));
            $(this)
                .parent('.js-wishlist-item')
                .fadeOut(300, function () {
                    $(this).remove();
                });
        });
    });
})(jQuery);
