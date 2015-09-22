<?php 
 
class DashboardController extends \BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $today = new \DateTime();
        $today->sub(new \DateInterval('P1D'));

        $rosters = Roster::where('date', '>', $today)->orderBy('date')->limit(10)->get();

        $lessons = $this->getLessons();

        return View::make('dashboard.index', compact('rosters', 'lessons'));
    }

    /**
     * @return array
     */
    private function getLessons()
    {
        $result = [];

        $today = new \DateTime();
        $today->sub(new \DateInterval('P1D'));

        foreach(Auth::user()->riders as $rider) {
            $lessons = Subscription::where('subscriptions.rider_id',  $rider->id)
                ->join('rosters', 'rosters.id', '=', 'subscriptions.roster_id')
                ->where('rosters.date', '>', $today)
                ->orderBy('rosters.date')
                ->get();

            foreach ($lessons as $lesson) {
                $result[$rider->fullName()][] = [
                    'roster' => Lang::get('days.names')[$lesson->roster->name] . ' ' . date('d/m/Y', strtotime($lesson->roster->date)) . ' - ' . Lang::get('days.hours')[$lesson->roster->hour] . ' (' . Lang::get('rosters')[$lesson->roster->type] . ')',
                ];
            }
        }

        return $result;
    }
}