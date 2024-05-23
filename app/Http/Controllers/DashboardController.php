<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    const PAGE_TITLE = 'Dashboard';
    const PAGE_DESC = 'Welcome to the dashboard';

    private array $sidebar = [
        [
            'title' => 'dashboard',
            'icon' => 'fe fe-grid',
            'route' => 'dashboard',
            'role' => 'admin'
        ],
        [
            'title' => 'branches',
            'icon' => 'fe fe-layers',
            'route' => 'branches.index',
            'role' => 'admin'
        ],
        [
            'title' => 'subjects',
            'icon' => 'fe fe-book',
            'route' => 'subjects.index',
            'role' => 'admin'
        ],
        [
            'title' => 'groups',
            'icon' => 'fe fe-box',
            'route' => 'groups.index',
            'role' => 'admin'
        ],
        [
            'title' => 'students',
            'icon' => 'fe fe-users',
            'route' => 'students.index',
            'role' => 'admin'
        ],
    ];

    public function get_sidebar()
    {
        return $this->sidebar;
    }

    public function index()
    {
        return view('dashboard.dashboard');
    }
}
