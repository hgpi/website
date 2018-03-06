<?php

namespace AppBundle\Model;

abstract class FullCalendarEvent
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var \DateTime
     */
    protected $startDate;


    /**
     * @return array
     */
    abstract public function toArray();
}