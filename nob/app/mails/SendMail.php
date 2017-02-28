<?php

class SendMail implements MailInterface
{
    protected $to = [];

    protected $subject = null;

    protected $data = [];

    protected $attachment = [];

    protected $template = null;

    /**
     * @param array $data
     * @param string $template
     * @param string $subject
     * @param string $email
     * @param string $name
     */
    public function __construct(array $data, $template, $subject, $email, $name = null)
    {
        $this->data = $data;

        $this->template = $template;

        $this->to[$email] = $name ?: p_config('app.name');

        $this->setSubject($subject);
    }

    public function setSubject($subject)
    {
        $this->data['subject'] = $subject;

        $this->subject = $subject;

        return $this;
    }

    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;

        return $this;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getAttachment()
    {
        return $this->attachment;
    }

    public function getTemplate()
    {
        return $this->template;
    }
}
