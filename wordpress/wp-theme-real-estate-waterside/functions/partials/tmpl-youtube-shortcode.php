<script type="text/html" id="tmpl-youtube-shortcode">
    <div class="youtube-player-wrapper tiny-youtube">
        <div class="youtube-player" data-id="{{data.id}}">
            <div data-id="{{data.id}}">
                <# if (data.src) {#>
                    <img src="{{data.src}}" alt="{{data.alt}}">
                    <# } else{ #>
                        <img src="https://i.ytimg.com/vi/{{data.id}}/sddefault.jpg" alt="{{data.alt}}">
                        <# } #>
                            <span class="play"></span>
            </div>
        </div>
        <span class="overlay overlay--light"></span>
        <# if ( data.text ) {#>
            <p class="video-text">
                {{data.text}}
            </p>
            <# } #>
    </div>
</script>