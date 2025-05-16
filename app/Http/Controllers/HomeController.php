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

        $userCountActive = User::where('is_active', 1) -> count();
        $adminCountActive = Admin::where('is_active', 1) -> count();

        $allUserTotalActive = $userTotalActive -> concat($adminTotalActive);
        $allUserCountActive = $userCountActive + $adminCountActive;

        /***************************************************************************************************************/
        /* USUARIOS QUE HAN ACCEDIDO EN UN TIEMPO PASADO */

        // Las ultimas 24 horas
        $userLastLoginTotal = User::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays())
            ->get();

        $adminLastLoginTotal = Admin::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays())
            ->get();

        $userLastLoginCount = User::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays())
            ->count();

        $adminLastLoginCount = Admin::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays())
            ->count();

        $allUserLastLoginTotal = $userLastLoginTotal->concat($adminLastLoginTotal);
        $allUserLastLoginCount = $userLastLoginCount + $adminLastLoginCount;

        // Los ultimmos 7 días
        $userLastLoginTotal7Days = User::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays(7))
            ->get();

        $userLastLoginCount7Days = User::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays(7))
            ->count();
        
        $adminLastLoginTotal7Days = Admin::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays(7))
            ->get();

        $adminLastLoginCount7Days = Admin::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays(7))
            ->count();
        
        $allUserLastLoginTotal7Days = $userLastLoginTotal7Days->concat($adminLastLoginTotal7Days);
        $allUserLastLoginCount7Days = $userLastLoginCount7Days + $adminLastLoginCount7Days;

        // Los ultimos 30 días
        $userLastLoginTotal30Days = User::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays(30))
            ->get();
        
        $userLastLoginCount30Days = User::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays(30))
            ->count();
        
        $adminLastLoginTotal30Days = Admin::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays(30))
            ->get();

        $adminLastLoginCount30Days = Admin::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subDays(30))
            ->count();

        $allUserLastLoginTotal30Days = $userLastLoginTotal30Days->concat($adminLastLoginTotal30Days);
        $allUserLastLoginCount30Days = $userLastLoginCount30Days + $adminLastLoginCount30Days;

        // Hace una hora
        $userLastLoginTotal1Hour = User::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subHours(1))
            ->get();

        $userLastLoginCount1Hour = User::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subHours(1))
            ->count();

        $adminLastLoginTotal1Hour = Admin::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subHours(1))
            ->get();

        $adminLastLoginCount1Hour = Admin::whereNotNull('last_login')
            ->where('last_login', '>=', now()->subHours(1))
            ->count();

        $allUserLastLoginTotal1Hour = $userLastLoginTotal1Hour->concat($adminLastLoginTotal1Hour);
        $allUserLastLoginCount1Hour = $userLastLoginCount1Hour + $adminLastLoginCount1Hour;

        /***************************************************************************************************************/
        /* USUARIOS QUE NUNCA HAN ACCEDIDO */

        $userNeverLoginTotal = User::whereNull('last_login') -> get();
        $adminNeverLoginTotal = Admin::whereNull('last_login') -> get();

        $userNeverLoginCount = User::whereNull('last_login') -> count();
        $adminNeverLoginCount = Admin::whereNull('last_login') -> count();

        $allUserNeverLoginTotal = $userNeverLoginTotal -> concat($adminNeverLoginTotal);
        $allUserNeverLoginCount = $userNeverLoginCount + $adminNeverLoginCount;

        /***************************************************************************************************************/
        /* USUARIOS QUE FRECUENTEMENTE ENTRAN A LA PLATAFORMA */

        /***************************************************************************************************************/
        /* VARIABLES QUE SE TIENEN QUE MOSTRAR EN SU PLANTILLA CORRESPONDIENTE */

        return view('pages.admin.home', compact(

            // Archivos del usuario que esta autenticado
            'fileCount',
            'fileCountWeek',
            'fileTotalWeek',
            'fileCountMonth',
            'fileTotalMonth',
            'fileCountLast7Days',
            'fileTotalLast7Days',
            'fileCountLast30Days',
            'fileTotalLast30Days',
            // Archivos cargados por los usuarios
            'fileCountWeekTotal',
            'fileTotalWeekTotal',
            'fileCountMonthTotal',
            'fileTotalMonthTotal',
            'fileCountLast7DaysTotal',
            'fileTotalLast7DaysTotal',
            'fileCountLast30DaysTotal',
            'fileTotalLast30DaysTotal',
            // Usuarios activos en este momento
            'userTotalActive',
            'adminTotalActive',
            'allUserTotalActive',
            'userCountActive',
            'adminCountActive',
            'allUserCountActive',
            // Usuarios que han accedido en un tiempo pasado
            'userLastLoginTotal',
            'adminLastLoginTotal',
            'allUserLastLoginTotal',
            'userLastLoginCount',
            'adminLastLoginCount',
            'allUserLastLoginCount',
            'userLastLoginTotal7Days',
            'userLastLoginCount7Days',
            'adminLastLoginTotal7Days',
            'adminLastLoginCount7Days',
            'allUserLastLoginTotal7Days',
            'allUserLastLoginCount7Days',
            'userLastLoginTotal30Days',
            'userLastLoginCount30Days',
            'adminLastLoginTotal30Days',    
            'adminLastLoginCount30Days',
            'allUserLastLoginTotal30Days',
            'allUserLastLoginCount30Days',
            'userLastLoginTotal1Hour',
            'userLastLoginCount1Hour',
            'adminLastLoginTotal1Hour',
            'adminLastLoginCount1Hour',
            'allUserLastLoginTotal1Hour',
            'allUserLastLoginCount1Hour',
            // Usuarios que no han accedido nunca
            'userNeverLoginTotal',
            'adminNeverLoginTotal',
            'allUserNeverLoginTotal',
            'userNeverLoginCount',
            'adminNeverLoginCount',
            'allUserNeverLoginCount',
            // Faltan los usuarios que frecuentemente entran a la plataforma
        ));
    }
}
