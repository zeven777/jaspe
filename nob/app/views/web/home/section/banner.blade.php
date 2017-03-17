@if( $banner )
        <a href="{{ $banner->getUrl() }}" class="banner home" target="_blank" style="background-color: {{
            $banner->color }}; background-image: url('{{
            $banner->image->getImage(1)
        }}');">

        </a>

@endif