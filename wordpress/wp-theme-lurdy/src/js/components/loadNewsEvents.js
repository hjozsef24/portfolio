import $ from 'jquery';

const loadNewsEvents = () => {
    let page = 1;
    const postNotIn = $('.js-highlighted-news').data('post_id');
    const resultsContainer = $('.js-news-events-grid');
    const selectedNewsEvents = resultsContainer.data('news-events');
    const loadMoreButton = $('.js-load-more-news-events');
    const loader = $('<div class="loader__wrapper"><div class="js-loader loader"></div></div>');
    let isLoading = false;
    let isEndOfResults = false;
    
    resultsContainer.html(loader);

    const loadEvents = () => {
        if (isLoading || isEndOfResults) return;

        isLoading = true;
        loader.appendTo(resultsContainer);

        $.ajax({
            url: ajax.url,
            type: 'POST',
            data: {
                action: 'load_news_events',
                page: page,
                post_not_in: postNotIn,
                selected_news_events: selectedNewsEvents
            },
            error(error) {
                console.error(error);
                loader.remove();
                loadMoreButton.addClass('d-block');
            },
            success(response) {
                if (response.trim()) {
                    resultsContainer.append(response);
                    page++;
                } else {
                    isEndOfResults = true;
                }
            },
            complete() {
                loader.remove();
                isLoading = false;

                if(selectedNewsEvents && $(window).width() < 768){
                    $('.js-news-events-grid').not('.slick-initialized').each(function () {
                        $(this).slick({
                            slidesToScroll: 1,
                            infinite: false,
                            responsive: [
                                {
                                    breakpoint: 767,
                                    settings: {
                                        slidesToShow: 1.15,  
                                        slidesToScroll: 1,
                                        arrows: false,
                                        dots: false,
                                    }
                                }
                            ]
                        });
                    });
                }
            }
        });
    };

    const debounce = (func, delay) => {
        let timeoutId;
        return (...args) => {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                func.apply(null, args);
            }, delay);
        };
    };

    const handleScroll = debounce(() => {
        const scrollThreshold = $(document).height() - $(window).height() - 100;
        if ($(window).scrollTop() >= scrollThreshold) {
            loadEvents();
        }
    }, 250);

    if(!selectedNewsEvents){
        $(window).on('scroll', handleScroll);
    }
    
    loadMoreButton.on('click', function(e){
        e.preventDefault();
        loadMoreButton.removeClass('d-block');
        handleScroll();   
    });

    loadEvents();
};

export default loadNewsEvents;