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

        return View::make('dashboard.index', compact('rosters'));
    }
}