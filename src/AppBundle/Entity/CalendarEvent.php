<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 05/03/2018
 * Time: 16:17
 */

namespace AppBundle\Entity;

use AncaRebeca\FullCalendarBundle\Model\Event;
use Doctrine\ORM\Mapping as ORM;

/**
 * CalendarEvent
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CalendarEventRepository")
 */
class CalendarEvent extends Event
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, name="title",  nullable = true)
     */
    protected $title;
    /**
     * @var boolean
     * @ORM\Column(type="boolean", name="allDay", nullable = true)
     */
    protected $allDay;
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="event_start")
     */
    protected $startDate;
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="event_end")
     */
    protected $endDate;
    /**
     * @var string
     * @ORM\Column(type="string", length=255, name="url", nullable = true)
     */
    protected $url;
    /**
     * @var string
     * @ORM\Column(type="string", length=255, name="className", nullable = true)
     */
    protected $className;
    /**
     * @var boolean
     * @ORM\Column(type="boolean", name="editable", nullable = true)
     */
    protected $editable = true;
    /**
     * @var boolean
     * @ORM\Column(type="boolean", name="strartEditable", nullable = true)
     */
    protected $startEditable = true;
    /**
     * @var boolean
     * @ORM\Column(type="boolean", name="durationEditable", nullable = true)
     */
    protected $durationEditable = true;
    /**
     * @var string
     * @ORM\Column(type="string", length=255, name="rendering", nullable = true)
     */
    protected $rendering;
    /**
     * @var boolean
     * @ORM\Column(type="boolean", name="overlap", nullable = true)
     */
    protected $overlap = true;
    /**
     * @var integer
     * @ORM\Column(type="integer", name="event_constraint", nullable = true)
     */
    protected $constraint;
    /**
     * @var string
     * @ORM\Column(type="string", length=255, name="event_source", nullable = true)
     */
    protected $source;
    /**
     * @var string
     * @ORM\Column(type="string", length=255, name="color", nullable = true)
     */
    protected $color;
    /**
     * @var string
     * @ORM\Column(type="string", length=255, name="backgroundColor", nullable = true)
     */
    protected $backgroundColor;
    /**
     * @var string
     * @ORM\Column(type="string", length=255, name="textColor", nullable = true)
     */
    protected $textColor;
    /**
     * @var array
     * @ORM\Column(type="array", name="customFields", nullable = true)
     */
    protected $customFields = [];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


}