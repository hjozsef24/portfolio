<script type="text/html" id="tmpl-image-shortcode">
    <# if (data.src) {#>
        <div class="image__wrapper">
            <img class="img--fluid ofi-cover-center-center" src="{{data.src}}" alt="{{data.alt}}">
            
            <# if (data.text) {#>
                <p class="small image__description">
                    {{data.text}}
                </p>
            <# } #>
        </div>
    <# } #>
</script>