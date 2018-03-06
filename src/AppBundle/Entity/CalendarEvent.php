<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 05/03/2018
 * Time: 16:17
 */

namespace AppBundle\Entity;

use AppBundle\Model\Event;
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
     * @ORM\Column(type="text", length=500, name="rendering", nullable = true)
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

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function isAllDay()
    {
        return $this->allDay;
    }

    /**
     * @param bool $allDay
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param string $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * @return bool
     */
    public function isEditable()
    {
        return $this->editable;
    }

    /**
     * @param bool $editable
     */
    public function setEditable($editable)
    {
        $this->editable = $editable;
    }

    /**
     * @return bool
     */
    public function isStartEditable()
    {
        return $this->startEditable;
    }

    /**
     * @param bool $startEditable
     */
    public function setStartEditable($startEditable)
    {
        $this->startEditable = $startEditable;
    }

    /**
     * @return bool
     */
    public function isDurationEditable()
    {
        return $this->durationEditable;
    }

    /**
     * @param bool $durationEditable
     */
    public function setDurationEditable($durationEditable)
    {
        $this->durationEditable = $durationEditable;
    }

    /**
     * @return string
     */
    public function getRendering()
    {
        return $this->rendering;
    }

    /**
     * @param string $rendering
     */
    public function setRendering($rendering)
    {
        $this->rendering = $rendering;
    }

    /**
     * @return bool
     */
    public function isOverlap()
    {
        return $this->overlap;
    }

    /**
     * @param bool $overlap
     */
    public function setOverlap($overlap)
    {
        $this->overlap = $overlap;
    }

    /**
     * @return int
     */
    public function getConstraint()
    {
        return $this->constraint;
    }

    /**
     * @param int $constraint
     */
    public function setConstraint($constraint)
    {
        $this->constraint = $constraint;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return string
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * @param string $textColor
     */
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;
    }

    /**
     * @return array
     */
    public function getCustomFields()
    {
        return $this->customFields;
    }

    /**
     * @param array $customFields
     */
    public function setCustomFields($customFields)
    {
        $this->customFields = $customFields;
    }




}