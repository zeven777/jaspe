@if( $banner )
        <aside class="banner home" style="background-color: {{
            $banner->color }}; background-image: url('{{
            $banner->image->getImage(1)
        }}');">

        </aside>

@endif