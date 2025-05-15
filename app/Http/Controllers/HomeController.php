<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\File; // Modelo de Archivos
use App\Models\Admin; // Modelo de Administradores
use App\Models\User; // Modelo de Usuarios

class HomeController extends Controller
{

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /* INDEX DE USUARIO */

    public function userIndex() {
        $user = Auth::guard('web')->user();
        $fileCount = File::where('username', $user->username)->count();
        
        // Archivos subidos esta semana
        $now = Carbon::now();
        $startOfWeek = $now->copy()->startOfWeek(); // Lunes
        $endOfWeek = $now->copy()->endOfWeek();     // Domingo

        $fileCountWeek = File::where('username', $user->username)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();

        $fileTotalWeek = File::where('username', $user->username)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        // Archivos subidos en el mes actual
        $fileCountMonth = File::where('username', $user->username)
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        $fileTotalMonth = File::where('username', $user->username)
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->get();

        // Archivos subidos los ultimo 7 días
        $fileCountLast7Days = File::where('username', $user->username)
            ->where('created_at', '>=', now()->subDays(7))
            ->count();

        $fileTotalLast7Days = File::where('username', $user->username)
            ->where('created_at', '>=', now()->subDays(7))
            ->get();
        
        // Archivos subidos los ultimos 30 días
        $fileCountLast30Days = File::where('username', $user->username)
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        $fileTotalLast30Days = File::where('username', $user->username)
            ->where('created_at', '>=', now()->subDays(30))
            ->get();
        
        return view('pages.user.home', compact(
            'fileCount',
            'fileCountWeek',
            'fileTotalWeek',
            'fileCountMonth',
            'fileTotalMonth',
            'fileCountLast7Days',
            'fileTotalLast7Days',
            'fileCountLast30Days',
            'fileTotalLast30Days'
        ));
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /* INDEX DE ADMINISTRADOR */

    public function adminIndex() {
        /***************************************************************************************************************/
        /* ARCHIVOS DEL USUARIO QUE ESTA AUTENTICADO */

        $user = Auth::guard('admin')->user();
        $fileCount = File::where('username', $user->username)->count();
        
        // Archivos subidos esta semana
        $now = Carbon::now();
        $startOfWeek = $now->copy()->startOfWeek(); // Lunes
        $endOfWeek = $now->copy()->endOfWeek();     // Domingo

        $fileCountWeek = File::where('username', $user->username)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();

        $fileTotalWeek = File::where('username', $user->username)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        // Archivos subidos en el mes actual
        $fileCountMonth = File::where('username', $user->username)
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        $fileTotalMonth = File::where('username', $user->username)
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->get();

        // Archivos subidos los ultimo 7 días
        $fileCountLast7Days = File::where('username', $user->username)
            ->where('created_at', '>=', now()->subDays(7))
            ->count();

        $fileTotalLast7Days = File::where('username', $user->username)
            ->where('created_at', '>=', now()->subDays(7))
            ->get();
        
        // Archivos subidos los ultimos 30 días
        $fileCountLast30Days = File::where('username', $user->username)
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        $fileTotalLast30Days = File::where('username', $user->username)
            ->where('created_at', '>=', now()->subDays(30))
            ->get();
        
        /***************************************************************************************************************/
        /* ARCHIVOS CARGADOS POR LOS USUARIOS */

        $files = File::all();
        $users = User::all();

        // Archivos subidos esta semana
        $fileCountWeekTotal = File::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();

        $fileTotalWeekTotal = File::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        // Archivos subidos en el mes actual
        $fileCountMonthTotal = File::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        $fileTotalMonthTotal = File::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->get();

        // Archivos subidos los ultimo 7 días
        $fileCountLast7DaysTotal = File::where('created_at', '>=', now()->subDays(7))
            ->count();

        $fileTotalLast7DaysTotal = File::where('created_at', '>=', now()->subDays(7))
            ->get();
        
        // Archivos subidos los ultimos 30 días
        $fileCountLast30DaysTotal = File::where('created_at', '>=', now()->subDays(30))
            ->count();

        $fileTotalLast30DaysTotal = File::where('created_at', '>=', now()->subDays(30))
            ->get();

        /***************************************************************************************************************/
        /* USUARIOS ACTIVOS EN ESTE MOMENTO */

        $userTotalActive = User::where('is_active', 1) -> get();
        $adminTotalActive = Admin::where('is_active', 1) -> get();

        $allUserTotalActive = $userTotalActive -> concat($adminTotalActive);

        /***************************************************************************************************************/
        /* USUARIOS QUE HAN ACCEDIDO EN UN TIEMPO PASADO */

        $userLastLoginTotal = User::whereNotNull('last_login', now()->subDays(7)) -> get();
        $adminLastLoginTotal = Admin::whereNotNull('last_login', now()->subDays(7)) -> get();

        $userLastLoginCount = User::whereNotNull('last_login', now()->subDays(7)) -> count();
        $adminLastLoginCount = Admin::whereNotNull('last_login', now()->subDays(7)) -> count();

        $allUserLastLoginTotal = $userLastLogin -> concat($adminLastLoginTotal);
        $allUserLastLoginCount = $userLastLoginCount + $adminLastLoginCount;

        /***************************************************************************************************************/
        /* USUARIOS QUE NUNCA HAN ACCEDIDO */

        $userTotalNoLogin = User::where('last_login', null) -> get();
        $adminTotalNoLogin = Admin::where('last_login', null) -> get();

        $allUserTotalNoLogin = $userTotalNoLogin -> concat($adminTotalNoLogin);

        /***************************************************************************************************************/
        /* USUARIOS QUE FRECUENTEMENTE ENTRAN A LA PLATAFORMA */

        /***************************************************************************************************************/
        /* VARIABLES QUE SE TIENEN QUE MOSTRAR EN SU PLANTILLA CORRESPONDIENTE */

        return view('pages.admin.home', compact(
            'fileCount',
            'fileCountWeek',
            'fileTotalWeek',
            'fileCountMonth',
            'fileTotalMonth',
            'fileCountLast7Days',
            'fileTotalLast7Days',
            'fileCountLast30Days',
            'fileTotalLast30Days',
            'fileCountWeekTotal',
            'fileTotalWeekTotal',
            'fileCountMonthTotal',
            'fileTotalMonthTotal',
            'fileCountLast7DaysTotal',
            'fileTotalLast7DaysTotal',
            'fileCountLast30DaysTotal',
            'fileTotalLast30DaysTotal',
            'userTotalActive',
            'adminTotalActive',
            'allUserTotalActive',
            //Usuarios que han accedido en un tiempo pasado
            'userLastLoginTotal',
            'adminLastLoginTotal',
            'allUserLastLoginTotal',
            'userLastLoginCount',
            'adminLastLoginCount',
            'allUserLastLoginCount',
            //Usuarios que no han accedido
            'userTotalNoLogin',
            'adminTotalNoLogin',
            'allUserTotalNoLogin',
            //Faltan los usuarios que frecuentemente entran a la plataforma
        ));
    }
}
