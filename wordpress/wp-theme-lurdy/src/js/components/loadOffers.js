import $ from 'jquery';

const loadNewsEvents = () => {
    let page = 1;
    let isLoading = false;
    let isEndOfResults = false;

    const resultsContainer = $('.js-offers-grid');
    const loadMoreButton = $('.js-load-more-offers');
    const isPaged = resultsContainer.data('is_paged');
    const isFiltered = resultsContainer.data('is_filtered');
    const filterBy = isFiltered ? resultsContainer.data('filter_by') : false;
    const filterRelation = isFiltered ? resultsContainer.data('filter_relation') : false;
    const filterDate = isFiltered ? resultsContainer.data('filter_date') : false;
    const shopIds = isFiltered ? resultsContainer.data('filter_by_shop_cpt') : [];
    const categoryIds = isFiltered ? resultsContainer.data('filter_by_shop_taxonomies') : [];
    const order = resultsContainer.data('order');
    const orderBy = resultsContainer.data('order_by');
    const postsPerPage = resultsContainer.data('posts_per_page');
    const loader = $('<div class="loader__wrapper"><div class="js-loader loader"></div></div>');
    
    resultsContainer.html(loader);

    const loadEvents = () => {
        if (isLoading || isEndOfResults) return;

        isLoading = true;
        loader.appendTo(resultsContainer);

        $.ajax({
            url: ajax.url,
            type: 'POST',
            data: {
                action: 'load_offers',
                page,
                posts_per_page: postsPerPage,
                is_paged : isPaged,
                order_by: orderBy,
                order,
                is_filtered: isFiltered,
                filter_by: filterBy,
                filter_relation: filterRelation,
                filter_date: filterDate,
                shop_ids: shopIds,
                category_ids: categoryIds,
            },
            error(error) {
                console.error(error);
                loader.remove();
                loadMoreButton.addClass('d-block');
            },
            success(response) {
                if ((response.indexOf("not--found") > 0) && (!$('.card__offer-grid').length)){
                    resultsContainer.append(response);
                    isEndOfResults = true;
                } else if ((response.trim()) && (response.indexOf("not--found") < 0)) {
                    resultsContainer.append(response);
                    page++;
                } else {
                    isEndOfResults = true;
                }
            },
            complete() {
                loader.remove();
                isLoading = false;

                if(!isPaged && $(window).width() < 768){
                    $('.js-offers-grid-slider').not('.slick-initialized').each(function () {
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

    if(isPaged){
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