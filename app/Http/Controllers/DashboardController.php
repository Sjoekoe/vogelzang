<?php
namespace Vogelzang\Http\Controllers;

use Carbon\Carbon;
use Vogelzang\Models\Roster;
use Vogelzang\Models\Subscription;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $yesterday = $this->getYesterday();

        $rosters = Roster::where('date', '>', $yesterday)->orderBy('date')->limit(10)->get();

        $lessons = $this->getLessons();

        return view('dashboard.index', compact('rosters', 'lessons'));
    }

    /**
     * @return array
     */
    private function getLessons()
    {
        $result = [];

        $yesterday = $this->getYesterday();

        foreach (auth()->user()->riders as $rider) {
            $lessons = Subscription::where('subscriptions.rider_id', $rider-id)
                ->join('rosters', 'roster.id', '=', 'subscriptions.roster_id')
                ->where('rosters.date', '>', $yesterday)
                ->orderBy('rosters.date')
                ->get();

            foreach ($lessons as $lesson) {
                $result[$rider->fullName][] = [
                   'roster' => trans('days.names')[$lesson->roster->name] . ' ' . date('d/m/Y', strtotime($lesson->roster->date)) . ' - ' . trans('days.hours')[$lesson->roster->hour] . ' (' . trans('rosters')[$lesson->roster->type] . ')',
                ];
            }
        }

        return $result;
    }

    /**
     * @return \Carbon\Carbon
     */
    private function getYesterday()
    {
        return  Carbon::now()->subDay();
    }
}
