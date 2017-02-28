<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    //
});

App::after(function($request, $response)
{
    $response->headers->set('Access-Control-Allow-Origin' , '*');

    $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');

    $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');

    $response->headers->set('Access-Control-Allow-Credentials','true');
    
    $response->headers->set('Cache-Control','no-cache, no-store, must-revalidate, max-age=0');

    $response->headers->set('Pragma','no-cache');

    $response->headers->set('Expires','0');
});

App::error(function(Exception $exception)
{
    $data = array(
        'url'     => Request::url(),
        'method'  => Request::method(),
        'format'  => Request::format(),
        'trace'   => $exception->getTrace(),
        'msg'     => $exception->getMessage(),
        'subject' => 'Error en el proyecto '. p_config('app.project'),
    );

    if( ! Config::get('app.debug') )
    {
        if( $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException )
        {
            $data['msg'] = 'Not Found Http';
        }

        $sendMail = new SendMail($data, 'emails.error.layout', 'Por favor, revisar el siguiente error', 'ramnycordero@gmail.com', 'Ramny Cordero');
        
        Event::fire('sendmail', array($sendMail));

        return Redirect::route('nofound');
    }
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
    if ( ! Session::has('WEBUSER') || is_null(Session::get('WEBUSER')) )
    {
        return Redirect::route('user.login');
    }
});


Route::filter('auth.basic', function()
{
    return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
    if ( Session::get('WEBUSER') )
    {
        return Redirect::route('user.profile');
    }
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
    $token = Request::header('x-csrf-token') ?: Input::get('_token');

    if ( Session::token() !== $token )
    {
        return Redirect::back()->withInput(Input::except('_token'))->with('_token',Session::token());
    }
});

/*
|--------------------------------------------------------------------------
| Ajax Protection Filter
|--------------------------------------------------------------------------
*/

Route::filter('ajax', function()
{
    if ( ! Request::ajax() )
    {
        return NULL;
    }
});