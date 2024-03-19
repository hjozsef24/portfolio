import $ from 'jquery';

const loadShops = () => {
    let typingTimer;
    let page = 1;
    let filtered = false;
    let termId = null;
    let letter = null;
    let keyword = null;
    let isLoading = false;
    let isEndOfResults = false;

    const resultsContainer = $('.js-shops-grid');
    const loadMoreButton = $('.js-load-more-shops');
    const backToTopButton = $('.js-shops-back-to-top');
    const shopCategories = $('.js-shop-category');
    const shopLetters = $('.js-shop-letter');
    const keywordInput = $('.js-keyword-input');
    const deleteKeywordInputButton = $('.js-delete-keyword');
    const categorySelect = $('.js-original-select');
    const loader = $('<div class="loader__wrapper"><div class="js-loader loader"></div></div>');

    resultsContainer.html(loader);

    const loadShops = () => {
        if (isLoading || isEndOfResults) return;

        isLoading = true;

        if (!filtered || (filtered && page > 1)) {
            loader.appendTo(resultsContainer);
        } else {
            resultsContainer.html(loader);
        }
        
        $.ajax({
            url: ajax.url,
            type: 'POST',
            data: {
                action: 'load_shops',
                page: page,
                term_id: termId,
                letter,
                keyword
            },
            error(error) {
                console.error(error);
                loader.remove();
                loadMoreButton.addClass('d-flex');
            },
            success(response) {
                if ((response.indexOf("not--found") > 0) && (!$('.card__shop').length)) {
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
                if($('.card__shop').length < 24 && filtered){
                    isEndOfResults = true;
                }

                loader.remove();
                isLoading = false;
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
        const windowHeight = $(window).height();
        const windowWidth = $(window).width();
        const scrollHeight = $(window).scrollTop();
        const thirdScreenHeight = windowHeight / 3;
        const containerButton = resultsContainer.height();
        const scrollThreshold = $(document).height() - windowHeight - 100;
        
        if (windowWidth < 768) {
            if (scrollHeight > thirdScreenHeight) {
                backToTopButton.addClass('is-visible');
            }

            if (
                (scrollHeight < thirdScreenHeight) ||
                (containerButton < (backToTopButton.offset().top - 100))
            ) {
                backToTopButton.removeClass('is-visible');
            }
        }

        if (scrollHeight >= scrollThreshold) {
            loadShops();
        }
    }, 250);

    $(window).on('scroll', handleScroll);

    shopCategories.on('click', function(){
        
        if(isLoading){
            return;
        }

        shopCategories.removeClass('selected');
        $(this).addClass('selected');
        termId = $(this).data('term_id');
        termId = termId == 'all' ? null : termId;
        filtered = true;
        page = 1;
        isEndOfResults = false;
        loadShops();
    });

    categorySelect.trigger('change');
    
    categorySelect.on('change', function(){
        
        if(isLoading){
            return;
        }

        termId = $(this).val();
        termId = termId == 'all' ? null : termId;
        filtered = true;
        page = 1;
        isEndOfResults = false;
        loadShops();
    });

    shopLetters.on('click', function(e) {
        if(isLoading){
            return;
        }

        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            letter = null;
        } else {
            shopLetters.removeClass('selected');
            $(this).addClass('selected');
            letter = $(this).text().trim();
        }
        filtered = true;
        page = 1;
        isEndOfResults = false;
        loadShops();
    });
    
    keywordInput.on('keydown paste input', function(){
        clearTimeout(typingTimer);

        typingTimer = setTimeout(function(){
            loadShops(); 
        }, 500);
    
        const currentValue = $(this).val().trim();
        filtered = true;
        keyword = currentValue;
        isEndOfResults = false;
        page = 1;
    
        if (currentValue !== '') {
            deleteKeywordInputButton.show();
        } else {
            keywordInput.val('');
            deleteKeywordInputButton.hide();
        }
    });

    loadMoreButton.on('click', function (e) {
        e.preventDefault();
        loadMoreButton.removeClass('d-block');
        handleScroll();
    });

    backToTopButton.on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 250);
        return false;
    });

    deleteKeywordInputButton.on('click', function(){
        keywordInput.val('');
        keywordInput.trigger('keydown')
    });

    loadShops();
};

export default loadShops;