<?php

class Blog_ListController extends Main_MainController
{
    public $action = "blog_list";

    public $section = "blog";

    public $view = "web.blog.list.layout";

    public $paginate = 6;

    public function index()
    {
        $this->data['blogs'] = Blog::getBlogs($this->paginate);

        $this->data['banner'] = Secundario::getBanner('blog');
    }
}
