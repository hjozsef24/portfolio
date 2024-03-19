import $ from "jquery";

const buildIframe = (id) => {
    return `<iframe src="https://www.youtube.com/embed/${id}?autoplay=1&amp;rel=0&amp;enablejsapi=1" frameborder="0" allow="autoplay" allowfullscreen="1"></iframe>`;
};

const playVideo = (iframe) => {
    iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
};

const pauseVideo = (iframe) => {
    iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
};

const initYoutubePlayer = (player) => {
    const iframe = buildIframe(player.data('id'));
    player.html(iframe);
    player.addClass('wasPlayed');
};

export const videoPlayer = () => {
    const youtubePlayers = $('.js-youtube-player');

    youtubePlayers.on('click', function() {
        if (!$(this).hasClass('wasPlayed')) {
            initYoutubePlayer($(this));
        } else {
            const iframe = $(this).find('iframe')[0];
            playVideo(iframe);
        }
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const player = $(entry.target).find('.youtube-player');
            if (entry.isIntersecting) {
                if (!player.hasClass('wasPlayed')) {
                    initYoutubePlayer(player);
                } else {
                    const iframe = player.find('iframe')[0];
                    playVideo(iframe);
                }
            } else if (player.find('iframe').length === 1) {
                const iframe = player.find('iframe')[0];
                pauseVideo(iframe);
            }
        });
    });

    youtubePlayers.each((i, player) => {
        observer.observe(player);
    });
};

export default videoPlayer;