<li><a href="{{ route('products.list',[$category->slug]) }}"{{
    HTML::classes([
        $category->icon,
        'active' => (bool) (isset($iconCategory) && $category->slug === $iconCategory)
    ])
}}>{{ $category->nombre }}</a></li>