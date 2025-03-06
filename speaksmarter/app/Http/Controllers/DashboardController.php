<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; // Asegúrate de importar Route
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $canLogin = false;
        $canRegister = false;

        // Verifica si la ruta 'login' está definida
        foreach (Route::getRoutes() as $route) {
            if ($route->getName() === 'login') {
                $canLogin = true;
            }
            if ($route->getName() === 'register') {
                $canRegister = true;
            }
        }

        return Inertia::render('Welcome', [
            'canLogin' => $canLogin,
            'canRegister' => $canRegister,
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }
}
