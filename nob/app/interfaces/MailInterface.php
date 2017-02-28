<?php

interface MailInterface
{
    public function setSubject($subject);

    public function setAttachment($attachment);

    public function getTo();

    public function getSubject();

    public function getData();

    public function getAttachment();

    public function getTemplate();
}