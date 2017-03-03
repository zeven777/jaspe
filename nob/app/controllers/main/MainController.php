<?php

class Main_MainController extends Controller
{
    public $paginate = 15;

    public $data;

    public $name;

    public $email;

    public $subject;

    public $system;

    public $fb;

    public $schemas;

    public $action = null;

    public $section = null;

    public $title = null;

    public $view;

    public $translate;

    public $model;

    public $og;

    public function __construct()
    {
        $navigatorLanguage = substr(Request::server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

        $defaultLanguage = in_array($navigatorLanguage, app('config')->get('app.locales',['es'])) ?
            $navigatorLanguage :
            app('config')->get('app.locale_default', 'es');

        $this->translate = Session::get('translate_language') ?: $defaultLanguage;

        $this->setupGalleryData();

        $this->og = new OG($this->translate);

        $this->data['title'] = $this->data['project'] = $this->og->title;

        $this->data['twitter'] = $this->getUsernameTwitter(p_system('twitter',$this->translate));

        app('config')->set('auth.model', 'Web');

        app('config')->set('auth.table', 'usuario');
    }

    public function callAction($method, $parameters)
    {
        $response = call_user_func_array(array($this, $method), $parameters);

        if( ! is_null($response) )
        {
            return $response;
        }

        $this->data['action'] = $this->action;

        $this->data['section'] = $this->section;

        $this->data['sectionTitle'] = $this->title;

        $this->data['lang'] = $this->translate;

        $this->getModules();

        $this->data = array_merge_recursive($this->data, $this->og->all);

        if( $this->model ) $this->getMetaTags($this->model);

        return View::make($this->view,$this->data);
    }

    public function getModules()
    {
        $this->data['categories'] = Categoria::getCategories();

        $this->data['enterprises'] = Empresa::getEnterprises();
    }

    public function getMetaSection($lang)
    {
        $this->og->title = p_config('app.project') . ' / ' . p_system("title_{$this->section}", $lang);

        $this->og->description = p_system("description_{$this->section}", $lang);

        $this->og->url = route($this->section, $lang);
    }

    public function getMetaTags($model)
    {
        if( $model instanceof MetaInterface )
        {
            if( ! empty($model->getMetaTitle()) ) $this->data['ogtitle'] = $model->getMetaTitle();

            if( ! empty($model->getMetaDescription()) ) $this->data['ogdescription'] = $model->getMetaDescription();

            if( ! empty($model->getMetaUrlImage()) ) $this->data['ogimage'] = $model->getMetaUrlImage();

            if( ! empty($model->getMetaUrl()) )  $this->data['ogurl'] = $model->getMetaUrl();
        }
    }

    public function setupGalleryData()
    {
        $galeryData = p_gallery_data();

        if( ! empty($galeryData) )
        {
            $this->data['GD'] = array();

            if( ! empty($galeryData['fdata']) ) foreach($galeryData['fdata'] as $name => $fd)
            {
                $nGD = new stdClass();

                $nGD->title = $fd['title'];

                $nGD->url = url($fd['url']);

                $this->data['GD'][$name] = $nGD;
            }
        }
    }

    public function getUsernameTwitter($url)
    {
        $fields = ['url' => $url];

        $rules = ['url' => 'required|url'];

        $validator = Validator::make($fields,$rules);

        if( $validator->fails() )
        {
            return $url;
        }

        $username = strpos($url,'/') ? substr($url, strrpos($url,'/') + 1, strlen($url)) : $url;

        return $username;
    }
}
