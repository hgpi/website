<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 05/03/2018
 * Time: 16:20
 */

namespace AppBundle\Listener;

use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;
use AppBundle\Entity\CalendarEvent as MyCustomEvent;


class LoadDataListener
{
    /**
     * @param CalendarEvent $calendarEvent
     *
     * @return FullCalendarEvent[]
     */
    public function loadData(MyCustomEvent $calendarEvent)
    {
        return $event = [
//            'id' =>$calendarEvent->getId(),
            'title' => $calendarEvent->getTitle(),
            'start' => $calendarEvent->getStartDate()->format('Y-m-d H:i:s'),
            'end' => $calendarEvent->getEndDate()->format('Y-m-d H:i:s'),
            'rendering' => $calendarEvent->getRendering()
            ];

//        return $calendarEvent->toArray();
//        $startDate = $calendarEvent->getStart();
//        $endDate = $calendarEvent->getEnd();
//        $filters = $calendarEvent->getFilters();

        //You may want do a custom query to populate the events

//        $calendarEvent->addEvent(new MyCustomEvent('Event Title 1', new \DateTime()));
//        $calendarEvent->addEvent(new MyCustomEvent('Event Title 2', new \DateTime()));
    }

}