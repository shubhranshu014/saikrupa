<?php

use App\Http\Controllers\AccessoriesInventoryController;
use App\Http\Controllers\BusinessContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GlassInventoryController;
use App\Http\Controllers\HardwareInventoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LeadAssignController;
use App\Http\Controllers\LeadDetailsController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SpController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth',])->group(function () {
    Route::get('superadmin/permissionsuser', [PermissionController::class, 'index'])->name('superadmin.permissionsuser');
    Route::get('superadmin/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('superadmin.permissions.edit');
    Route::post('superadmin/permissions/{id}', [PermissionController::class, 'update'])->name('superadmin.permissions.update');
    Route::get('superadmin/purchase/update', [PermissionController::class, 'purchaseupdate'])->name('superadmin.purchase.update');
    Route::post('purchases/toggle-status', [PermissionController::class, 'toggleStatus'])->name('purchases.toggle-status');


    Route::get("superadmin/dashboard", [DashboardController::class, "superadmindashboard"])->name("superadmin.dashboard");

    Route::get("superadmin/userlist", [SpController::class, "userlist"])->name("superadmin.userlist");
    Route::get("superadmin/create/user", [SpController::class, "createuser"])->name("superadmin.createuser");
    Route::post("superadmin/store/user", [SpController::class, "storeuser"])->name("superadmin.storeuser");


    Route::get("/contactlist", [BusinessContactController::class, "contact"])->name("contact.list");
    Route::get("/contact/create", [BusinessContactController::class, "addcontact"])->name("contact.create");
    Route::post("/contact/store", [BusinessContactController::class, "storecontact"])->name("contact.store");

    Route::get("/contact/details/list", [BusinessContactController::class, "contactDlist"])->name("contact.details.list");
    Route::get("/contact/details/create", [BusinessContactController::class, "contactDcreate"])->name("contact.details.create");
    Route::post("/contact/details/store", [BusinessContactController::class, "contactDstore"])->name("contact.details.store");


    Route::get("superadmin/storelist", [SpController::class, "storelist"])->name("superadmin.storelist");
    Route::get("superadmin/createstore", [SpController::class, "createstore"])->name("superadmin.createstore");
    Route::post("superadmin/storestore", [SpController::class, "storestore"])->name("superadmin.storestore");

    Route::get("superadmin/profiles-inventory/list", [InventoryController::class, "profilesinventorylist"])->name("superadmin.profilesinventory.list");
    Route::get("superadmin/create/profiles-inventory", [InventoryController::class, "createprofilesinventory"])->name("superadmin.create.profilesinventory");
    Route::post("superadmin/store/profiles-inventory", [InventoryController::class, "storeprofilesinventory"])->name("superadmin.store.profilesinventory");

    Route::get("superadmin/glass-inventory/list", [GlassInventoryController::class, "glassinventorylist"])->name("superadmin.glassinventory.list");
    Route::get("superadmin/create/glass-inventory", [GlassInventoryController::class, "createglassinventory"])->name("superadmin.create.glassinventory");
    Route::post("superadmin/store/glass-inventory", [GlassInventoryController::class, "storeglassinventory"])->name("superadmin.store.glassinventory");

    Route::get("superadmin/hardware-inventory/list", [HardwareInventoryController::class, "hardwareinventorylist"])->name("superadmin.hardwareinventory.list");
    Route::get("superadmin/create/hardware-inventory", [HardwareInventoryController::class, "createhardwareinventory"])->name("superadmin.create.hardwareinventory");
    Route::post("superadmin/store/hardware-inventory", [HardwareInventoryController::class, "storehardwareinventory"])->name("superadmin.store.hardwareinventory");

    Route::get("superadmin/accessories-inventory/list", [AccessoriesInventoryController::class, "accessoriesinventorylist"])->name("superadmin.accessoriesinventory.list");
    Route::get("superadmin/create/accessories-inventory", [AccessoriesInventoryController::class, "createaccessoriesinventory"])->name("superadmin.create.accessoriesinventory");
    Route::post("superadmin/store/accessories-inventory", [AccessoriesInventoryController::class, "storeaccessoriesinventory"])->name("superadmin.store.accessoriesinventory");

    Route::get("superadmin/stock-movement/list", [StockMovementController::class, "stockmovementlist"])->name("superadmin.stockmovement.list");
    Route::get("superadmin/create/stock-movement", [StockMovementController::class, "createstockmovement"])->name("superadmin.create.stock-movement");
    Route::post("superadmin/store/stock-movement", [StockMovementController::class, "storestockmovement"])->name("superadmin.store.stock-movement");

    Route::get("superadmin/product/list", [ProductController::class, "productlist"])->name("superadmin.product.list");
    Route::get("superadmin/create/product", [ProductController::class, "createproduct"])->name("superadmin.create.product");
    Route::post("superadmin/store/product", [ProductController::class, "storeproduct"])->name("superadmin.store.product");

    Route::get("superadmin/supplierslist", [SupplierController::class, "supplierslist"])->name("superadmin.supplierslist");
    Route::get("superadmin/createsupplier", [SupplierController::class, "createsupplier"])->name("superadmin.createsupplier");
    Route::post("superadmin/storesupplier", [SupplierController::class, "storesupplier"])->name("superadmin.storesupplier");
    Route::get('superadmin/supplier/edit/{supplier}', [SupplierController::class, 'edit'])->name('superadmin.edit.supplier');
    Route::put('superadmin/supplier/update/{supplier}', [SupplierController::class, 'update'])->name('superadmin.update.supplier');
    Route::delete('superadmin/delete/supplier/{id}', [SupplierController::class, 'destroy'])->name('superadmin.delete.supplier');

    Route::get('purchase/list', [PurchaseController::class, 'purchaseList'])->name('purchase.list');
    Route::get('purchase/create', [PurchaseController::class, 'createpurchase'])->name('purchase.create');
    Route::post('purchase/store', [PurchaseController::class, 'storepurchase'])->name('purchase.store');
    Route::post('/purchases/update-status', [PurchaseController::class, 'updateStatus'])->name('purchases.update-status');
    Route::get('/purchases/{id}/download-pdf', [PurchaseController::class, 'downloadPdf'])->name('purchases.download-pdf');


    Route::get('/leads/list', [LeadsController::class, 'leadlist'])->name('leads.list');
    Route::get('/leads/create', [LeadsController::class, 'createlead'])->name('leads.create');
    Route::post('/leads/store', [LeadsController::class, 'storelead'])->name('leads.store');

    Route::get('/leads/details/create/{id}', [LeadDetailsController::class, 'createleaddetails'])->name('leads.details.create');
    Route::post('/leads/details/store', [LeadDetailsController::class, 'store'])->name('leads.details.store');
    Route::post('/calls/store', [LeadDetailsController::class, 'callstore'])->name('calls.store');
    Route::post('/discussion/store', [LeadDetailsController::class, 'Discussionstore'])->name('Discussion.store');

    Route::get('/leads/assign/list', [LeadAssignController::class, 'leadassignlist'])->name('leads.assign.list');
    Route::get('/leads/assign/create', [LeadAssignController::class, 'createleadassign'])->name('leads.assign.create');
    Route::post('/leads/assign/store', [LeadAssignController::class, 'leadassignstore'])->name('leads.assign.store');

});

require __DIR__ . '/auth.php';
