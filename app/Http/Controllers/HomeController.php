<?php
namespace Vogelzang\Http\Controllers;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = 'Home';

        return view('index', compact('title'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function admin()
    {
        return view('admin.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function accommodation()
    {
        $title = 'Accomodatie';

        return view('accommodation', compact('title'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function about()
    {
        $title = 'Over ons';

        return view('about', compact('title'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function manege()
    {
        $title = 'Manege';

        return view('manege', compact('title'));
    }
}
