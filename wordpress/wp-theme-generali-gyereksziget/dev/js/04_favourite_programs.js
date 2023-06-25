(function ($) {
    $(function () {

        const likedButton = localize.program_cards_liked_button_url;
        const unLikedButton = localize.program_cards_unliked_button_url;
        const favouriteButton = $('.js-toggle-favourite-program');
        const favouriteProgramsContainer = $('.js-favourite-programs-container');

        if(!favouriteButton.length && !favouriteProgramsContainer.length){
            return;
        }

        // Set saved programs cookies
        if(!Cookies.get('favourite_programs')){
            var favouritePrograms = [];
        } else {
            var favouritePrograms = JSON.parse(Cookies.get('favourite_programs'));
        }

        // Funxtion to set proper like button on program cards
        function setLikeButton(){
            favouriteButton.each(function(e){
                var id = $(this).data('id');
                if(favouritePrograms.includes(id)){
                    $(this).attr('src', likedButton);
                } else {
                    $(this).attr('src', unLikedButton);
                }
            })
        }

        favouriteButton.on('click', function(e){
            e.preventDefault();
            var id = $(this).data('id');

            if(!favouritePrograms.includes(id)){
                favouritePrograms.push(id);
            } else {
                favouritePrograms = favouritePrograms.filter(e => e != id);
            }
            Cookies.set('favourite_programs', JSON.stringify(favouritePrograms));

            setLikeButton();
        });

        // Get saved programs
        if(favouriteProgramsContainer.length){
            const savedPrograms = JSON.parse(Cookies.get('favourite_programs'));
            $.ajax({
                url: localize.ajaxurl,
                type: 'POST',
                data: {
                    action: 'get_favourite_programs',
                    data: savedPrograms
                },
                error: function (error) {
                    console.log(error)
                },
                success: function (response) {
                    favouriteProgramsContainer.append(response);
                }
            }).done(function(){
                setLikeButton();
            });
        }

        setLikeButton();
    });
})(jQuery);