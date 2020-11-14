<?php
    class CalendarCollectComponent extends Component
    {
        public $collectTiming;
        public $weekTiming;
        public $firstHour;
        public $firstMin;
        public $lastHour;
        public $lastMin;
        public $listRange;

        public function __construct($collectTiming,$weekTiming)
        {
            $this->collectTiming = $collectTiming;
            $this->weekTiming = $weekTiming;
            $this->componentName = "CalendarCollect";
            $this->listRange = array();
            $this->loadOpeningTiming();
        }

        public function isOpen($day,$h,$m)
        {
            $today = $this->getToday($day)->setTime($h,$m,0);
            if($today > new DateTime())
            {
                $todayString = $today->format("Y-m-d h:i:s");
                foreach($this->listRange[$day] as $range)
                {
                    if($today > $range->begin && $today < $range->end)
                    {
                        $result = array_filter($this->weekTiming->reservedTiming,function($date) use($todayString){
                            return $date == $todayString;
                        });
                        return count($result) < $this->collectTiming->slotReservation;
                    }
                }
                return false;
            }
            else
            {
                return false;
            }
           
        }

        public function hourToString($hour)
        {
            if($hour < 10)
            {
                return "0" . $hour . ":00";
            }
            else
            {
                return $hour . ":00";
            }
        }

        private function loadOpeningTiming()
        {
            foreach($this->collectTiming->listOpening as $day => $timing)
            {
                foreach($timing as $timingItem)
                {
                    $timingItemMin = new DateTime($timingItem->start);
                    $timingItemMax = new DateTime($timingItem->stop);
                    $range = new stdClass();
                    $range->begin = $this->getToday($day)->setTime($timingItemMin->format("G"),$timingItemMin->format("i"));
                    $range->end = $this->getToday($day)->setTime($timingItemMax->format("G"),$timingItemMax->format("i"));
                    $this->listRange[$day][] = $range;
                    if($this->firstHour == null)
                    {
                        $this->firstHour = $timingItemMin->format("G");
                        $this->firstMin = $timingItemMin->format("i");
                        $this->lastHour = $timingItemMax->format("G");
                        $this->lastMin = $timingItemMax->format("i");
                    }
                    else
                    {
                        if($this->firstHour > $timingItemMin->format("G"))
                        {
                            $this->firstHour = $timingItemMin->format("G");
                            $this->firstMin = $timingItemMin->format("i");

                        }
                        elseif($this->firstHour == $timingItemMin->format("G") && $this->firstMin > $timingItemMin->format("i"))
                        {
                            $this->firstMin = $timingItemMin->format("i");
                        }
                        if($this->lastHour < $timingItemMax->format("G"))
                        {
                            $this->lastHour = $timingItemMax->format("G");
                            $this->lastMin = $timingItemMax->format("i");
                        }
                        elseif($this->lastHour == $timingItemMax->format("G") && $this->lastMin <  $timingItemMax->format("i"))
                        {
                            $this->lastMin = $timingItemMax->format("i");
                        }
                    }
                }
            }
        }

        public function getRealLastHour()
        {
            return ($this->lastMin > 0)?$this->lastHour:$this->lastHour-1;
        }

        public function getToday($day)
        {
            $today = new DateTime($this->weekTiming->begining->format("Y-m-d"));
            if($day==0)
            {
                $day = 7;
            }
            $today->add(new DateInterval("P" . ($day -1) . "D"));
            return $today;
        }

        public function getPreviousWeek()
        {
            $previousWeek = clone $this->weekTiming->begining;
            return $previousWeek->sub(new DateInterval("P7D"));
        }

        public function getNextWeek()
        {
            $previousWeek = clone $this->weekTiming->begining;
            return $previousWeek->add(new DateInterval("P7D"));
        }
    }