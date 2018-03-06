<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 06/03/2018
 * Time: 10:21
 */

namespace AppBundle\Repository;


class CalendarEventRepository extends \Doctrine\ORM\EntityRepository
{
    public function resizeEvent($idEvent, $startDate, $endDate)
    {
        return $this
            ->createQueryBuilder('e')
            ->update('AppBundle:CalendarEvent', 'e')
            ->set('e.startDate', '?1')
            ->set('e.endDate', '?2')
            ->where('e.id = ?3')
            ->setParameter(1, $startDate)
            ->setParameter(2, $endDate)
            ->setParameter(3, $idEvent)
            ->getQuery()
            ->getResult();
    }

    public function dropEvent($idEvent, $startDate, $endDate)
    {
        return $this
            ->createQueryBuilder('e')
            ->update('AppBundle:CalendarEvent', 'e')
            ->set('e.startDate', '?1')
            ->set('e.endDate', '?2')
            ->where('e.id = ?3')
            ->setParameter(1, $startDate)
            ->setParameter(2, $endDate)
            ->setParameter(3, $idEvent)
            ->getQuery()
            ->getResult();
    }

    public function editEvent($idEvent, $newTitle, $newComm)
    {
        return $this
            ->createQueryBuilder('e')
            ->update('AppBundle:CalendarEvent', 'e')
            ->set('e.title', '?1')
            ->set('e.commentaire', '?2')
            ->where('e.id = ?3')
            ->setParameter(1, $newTitle)
            ->setParameter(2, $newComm)
            ->setParameter(3, $idEvent)
            ->getQuery()
            ->getResult();
    }

    public function deleteEvent($idEvent)
    {
        return $this
            ->createQueryBuilder('e')
            ->delete('AppBundle:CalendarEvent', 'e')
            ->where('e.id = ?1')
            ->setParameter(1, $idEvent)
            ->getQuery()
            ->getResult();
    }

}