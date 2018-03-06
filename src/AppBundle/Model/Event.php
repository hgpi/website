<?php

namespace AppBundle\Model;

class Event extends FullCalendarEvent
{


    /**
     * @return array
     */
    public function toArray()
    {
        $event = [];

        $event['title']             = $this->getTitle();
        $event['start']             = $this->getStartDate()->format("Y-m-d\TH:i:sP");
        $event['allDay']            = $this->isAllDay();
        $event['editable']          = $this->isEditable();
        $event['startEditable']     = $this->isStartEditable();
        $event['durationEditable']  = $this->isDurationEditable();
        $event['overlap']           = $this->isOverlap();

        if (null !== $this->getId()) {
            $event['id'] = $this->getId();
        }

        if (null !== $this->getUrl()) {
            $event['url'] = $this->getUrl();
        }

        if (null !== $this->getBackgroundColor()) {
            $event['backgroundColor'] = $this->getBackgroundColor();
        }

        if (null !== $this->getTextColor()) {
            $event['textColor'] = $this->getTextColor();
        }

        if (null !== $this->getClassName()) {
            $event['className'] = $this->getClassName();
        }

        if (null !== $this->getEndDate()) {
            $event['end'] = $this->getEndDate()->format("Y-m-d\TH:i:sP");
        }

        if (null !== $this->getRendering()) {
            $event['rendering'] = $this->getRendering();
        }

        if (null !== $this->getConstraint()) {
            $event['constraint'] = $this->getConstraint();
        }

        if (null !== $this->getSource()) {
            $event['source'] = $this->getSource();
        }

        if (null !== $this->getColor()) {
            $event['color'] = $this->getColor();
        }

        foreach ($this->getCustomFields() as $field => $value) {
            $event[$field] = $value;
        }

        return $event;
    }
}