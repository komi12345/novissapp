<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PostController; // Importer le contrôleur des posts
use App\Http\Controllers\BlogController; // Importer le contrôleur du blog public

use App\Models\Post; // Assurez-vous que le modèle Post est importé

Route::get('/', function () {
    $posts = Post::whereNotNull('published_at') // Vérifie si l'article est publié
                 ->latest('published_at') // Ou 'created_at' selon votre champ
                 ->get(); // Récupère tous les articles publiés
    return view('welcome', ['posts' => $posts]);
});

// Routes pour l'administration
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');

    // Routes pour la gestion des articles de blog (CRUD)
    Route::resource('posts', PostController::class)->names('admin.posts');

    // Ajoutez d'autres routes admin ici
});

// Routes pour le blog public
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index'); // Route pour afficher la liste des articles
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show'); // Route pour afficher un article spécifique

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
