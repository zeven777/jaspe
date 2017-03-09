<?php

class Blog_DetailController extends Main_MainController
{
    public $action = "blog_detail";

    public $section = "blog";

    public $view = "web.blog.detail.layout";

    public function index($slug)
    {
        $blog = Blog::getBlog($slug);

        if( is_null($blog) ) return Redirect::route('blog.list');

        $this->data['blog'] = $blog;

        $this->data['blogs'] = Blog::getBlogs(2, $blog);
    }
}
