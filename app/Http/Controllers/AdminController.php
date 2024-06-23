<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $userCount = User::count();
        // Menghitung jumlah pengguna seminggu yang lalu
        $lastWeekCount = User::where('created_at', '<', Carbon::now()->subWeek())->count();

        // Menghitung persentase peningkatan pengguna
        $percentageIncrease = 0;
        if ($lastWeekCount > 0) {
            $percentageIncrease = (($userCount - $lastWeekCount) / $lastWeekCount) * 100;
        }

        // Menghitung jumlah artikel hari ini
        $today = Carbon::today();
        $articlesToday = Article::count();


        // Menghitung jumlah artikel kemarin
        $yesterday = Carbon::yesterday();
        $articlesYesterday = Article::where('created_at', '>=', $yesterday)
            ->where('created_at', '<', $today)
            ->count();

        // Menghitung persentase kenaikan artikel
        $articlePercentageIncrease = 0;
        if ($articlesYesterday > 0) {
            $articlePercentageIncrease = (($articlesToday - $articlesYesterday) / $articlesYesterday) * 100;
        } else {
            $articlePercentageIncrease = $articlesToday > 0 ? 100 : 0;
        }

        return view('admin.dashboard', compact('userCount', 'percentageIncrease', 'articlesToday', 'articlePercentageIncrease'));
    }

    public function viewcategories()
    {
        return view('admin.menu.categories');
    }
    public function viewarticle()
    {
        return view('admin.menu.article');
    }
    public function viewAccount()
    {
        $viewAccount = User::orderBy('id', 'asc')->paginate(10);
        return view('admin.menu.userAccount', compact('viewAccount'));
    }
}
