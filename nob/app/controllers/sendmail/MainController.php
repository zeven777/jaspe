<?php

class Sendmail_MainController extends Main_MainController
{
    public $action = "sendmail";

    public $section = "sendmail";

    public function index()
    {
        $data = [
            'ok'      => false,
            'type'    => 'danger',
            'message' => 'User no registered',
        ];

        $fields = Input::all();

        $rules = array(
            'cname' => 'required',
            'cemail' => 'required|email',
            'cphone' => 'required',
            'ccity' => 'required',
            'cmessage' => 'required'
        );

        $validator = Validator::make($fields,$rules);

        if($validator->fails())
        {
            $data['message'] = 'Sorry!, fields are required.';

            return Response::json($data);
        }

        $email = p_system('email_contact');

        $dataMail = array_merge([
            'subject' => 'User message',
            'foot'    => '&copy; ' . p_config('app.project')
        ], $fields);

        $sendMail = new SendMail($dataMail, 'emails.sendmail.layout', 'User message', $email);

        Event::fire('sendmail', array($sendMail));

        $data['message'] = 'E-mail sent successfully';

        $data['type'] = 'success';

        $data['ok'] = true;

        return Response::json($data);
    }
}