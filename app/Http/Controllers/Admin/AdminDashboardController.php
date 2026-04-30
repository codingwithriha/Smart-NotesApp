<?php
// ══════════════════════════════════════════════════════════════
//  AdminDashboardController.php
//  app/Http/Controllers/Admin/AdminDashboardController.php
// ══════════════════════════════════════════════════════════════
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Note;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
 
class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard with stats and charts.
     * Route: GET /admin/dashboard
     */
    public function index()
    {
        // ── Basic Counts ─────────────────────────────────────
        $totalUsers = User::count();
        $totalNotes = Note::count(); // includes all notes (even soft-deleted)
        $activeNotes = Note::whereNull('deleted_at')->count(); // only active notes
        $totalCategories = Category::count();
        $totalTags = Tag::count();
 
        // ── Recently Registered Users (last 5) ───────────────
        $recentUsers = User::latest()->take(5)->get();

        // ── Recent Notes (last 5) ────────────────────────────
        $recentNotes = Note::with('user')->latest()->take(5)->get();
 
        // ── Notes Created Per Day (last 7 days) ──────────────
        // This gives us data to draw a simple line/bar chart
        $notesPerDay = Note::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', now()->subDays(7)) // last 7 days
            ->groupBy('date')
            ->orderBy('date')
            ->get();
 
        // ── Users Registered Per Day (last 7 days) ───────────
        $usersPerDay = User::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
 
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalNotes',
            'activeNotes',
            'totalCategories',
            'totalTags',
            'recentUsers',
            'recentNotes',
            'notesPerDay',
            'usersPerDay'
        ));
    }
}