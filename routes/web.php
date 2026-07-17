<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// 1. Marketing Routes (Public - No Auth Required)
Route::get('/', fn() => Inertia::render('Website/HomePage'))->name('home');
Route::get('/features', fn() => Inertia::render('Website/FeaturesPage'))->name('features');
Route::get('/solutions', fn() => Inertia::render('Website/SolutionsPage'))->name('solutions');
Route::get('/industries', fn() => Inertia::render('Website/IndustriesPage'))->name('industries');
Route::get('/modules', fn() => Inertia::render('Website/ModulesPage'))->name('modules');
Route::get('/pricing', fn() => Inertia::render('Website/PricingPage'))->name('pricing');
Route::get('/about', fn() => Inertia::render('Website/AboutPage'))->name('about');
Route::get('/contact', fn() => Inertia::render('Website/ContactPage'))->name('contact');
Route::get('/blog', fn() => Inertia::render('Website/BlogPage'))->name('blog');
Route::get('/faq', fn() => Inertia::render('Website/FAQPage'))->name('faq');
Route::get('/careers', fn() => Inertia::render('Website/CareersPage'))->name('careers');
Route::get('/docs', fn() => Inertia::render('Website/DocumentationPage'))->name('docs');
Route::get('/support', fn() => Inertia::render('Website/SupportPage'))->name('support');
Route::get('/privacy', fn() => Inertia::render('Website/PrivacyPolicyPage'))->name('privacy');
Route::get('/terms', fn() => Inertia::render('Website/TermsPage'))->name('terms');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });
// 2. Dashboard Routes (Protected by Jetstream Middleware)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    
    // Main Dashboard Overview
    Route::get('/dashboard', fn() => Inertia::render('Dashboard'))->name('dashboard');
    
    // Dashboard Sub-Modules
    Route::get('/dashboard/branches', fn() => Inertia::render('Dashboard/Branches'))->name('dashboard.branches');
    Route::get('/dashboard/warehouses', fn() => Inertia::render('Dashboard/Warehouses'))->name('dashboard.warehouses');
    Route::get('/dashboard/products', fn() => Inertia::render('Dashboard/Products'))->name('dashboard.products');
    Route::get('/dashboard/barcodes', fn() => Inertia::render('Dashboard/Barcodes'))->name('dashboard.barcodes');
    Route::get('/dashboard/purchases', fn() => Inertia::render('Dashboard/Purchases'))->name('dashboard.purchases');
    Route::get('/dashboard/pos', fn() => Inertia::render('Dashboard/POS'))->name('dashboard.pos');
    Route::get('/dashboard/crm', fn() => Inertia::render('Dashboard/CRM'))->name('dashboard.crm');
    Route::get('/dashboard/finance', fn() => Inertia::render('Dashboard/Finance'))->name('dashboard.finance');
    Route::get('/dashboard/audit-logs', fn() => Inertia::render('Dashboard/AuditLogs'))->name('dashboard.audit-logs');
    Route::get('/dashboard/users', fn() => Inertia::render('Dashboard/Users'))->name('dashboard.users');

    // User Preferences
    Route::put('/user/theme', [App\Http\Controllers\UserPreferenceController::class, 'updateTheme'])->name('theme.update');
});
