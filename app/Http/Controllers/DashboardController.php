<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  
  public function teste()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('backend/teste', ['pageConfigs' => $pageConfigs]);
  }

  public function tabela()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('backend/tabela', ['pageConfigs' => $pageConfigs]);
  }
  
  // Dashboard - Analytics
  public function dashboardAnalytics()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
  }

  // Dashboard - Ecommerce
  public function dashboardEcommerce()
  {
    $pageConfigs = ['pageHeader' => false];

    if(Auth::check())
    {
      return redirect()->route('index-publicacao');
    }

    return redirect('home');
  }
}
