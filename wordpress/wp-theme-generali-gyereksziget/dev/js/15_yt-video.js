(function ($) {
    $(function () {    

        var video = $(".youtube-player");
        
        if(!video.length){
            return;
        }

        var div, n;
        for (n = 0; n < video.length; n++) {
            div = document.createElement("div");
            div.setAttribute("data-id", v[n].dataset.id);
            div.innerHTML = labnolThumb(v[n].dataset.id);
            div.onclick = labnolIframe;
            video[n].appendChild(div);
        }


        function labnolThumb(id) {
            var thumb = '<img src="https://i.ytimg.com/vi/ID/maxresdefault.jpg">'
            var play = '<div class="play"></div>';
            return thumb.replace("ID", id) + play;
        }

        function labnolIframe() {
            var iframe = document.createElement("iframe");
            var embed = "https://www.youtube.com/embed/ID?autoplay=1&cc_load_policy=1&cc_lang_pref=";
            iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
            iframe.setAttribute("frameborder", "0");
            iframe.setAttribute("autoplay", "1");
            iframe.setAttribute("allowfullscreen", "1");
            this.parentNode.replaceChild(iframe, this);
        }
    });
})(jQuery);
