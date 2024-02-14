<?php


use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\ProductReturnController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesReturnController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Employee;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'create'])->middleware(['auth'])->name('backend.dashboard.create');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/show', [AdminController::class, 'show'])->name('backend.profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/backend/dashboard/create', [ DashboardController::class, 'create'])->name('backend.dashboard.create');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/backend/products/create', [ ProductController::class, 'create'])->name('backend.products.create');
    Route::post('/backend/products/store', [ ProductController::class, 'store'])->name('backend.products.store');
    Route::get('/backend/products/index', [ ProductController::class, 'index'])->name('backend.products.index');
    Route::get('/backend/products/edit/{product}', [ ProductController::class, 'edit'])->name('backend.products.edit');
    Route::get('/backend/products/show/{product}', [ ProductController::class, 'show'])->name('backend.products.show');
    Route::post('/backend/products/update/{product}', [ProductController::class, 'update'])->name('backend.products.update');
    Route::delete('/backend/products/delete/{product}', [ ProductController::class, 'delete'])->name('backend.products.delete');
    Route::get('/backend/products/trash', [ ProductController::class, 'trash'])->name('backend.products.trash');
    Route::get('/backend/products/restore/{product}', [ ProductController::class, 'restore'])->name('backend.products.restore');
    Route::delete('/backend/products/parmanent_delete/{product}', [ ProductController::class, 'parmanent_delete'])->name('backend.products.parmanent_delete');
    Route::post('/backend/inventory/subtract-product-quantity', [ProductController::class, 'subtractProductQuantity'])->name('subtractProductQuantity');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/backend/inventory/inventory', [InventoryController::class, 'inventory'])->name('backend.billing.inventory');
    Route::get('/backend/inventory/create', [InventoryController::class, 'create'])->name('backend.inventory.billing');
    Route::post('/backend/inventory/get-product-details', [InventoryController::class, 'getProductDetails'])->name('getProductDetails');
    Route::post('/backend/inventory/save-invoice', [InventoryController::class, 'saveInvoice'])->name('saveInvoice');
    Route::post('/searchProduct', [InventoryController::class, 'searchProduct'])->name('backend.inventory.searchProduct');
    Route::get('/invoice/print', [InventoryController::class,'printInvoice'])->name('backend.inventory.print');
    Route::get('/reprint-invoice/{id}', 'InventoryController@reprint')->name('backend.inventory.reprint');

    Route::get('/backend/inventory/edit/{inventory}', [InventoryController ::class, 'edit'])->name('backend.inventory.edit');
    Route::post('/backend/inventory/update/{inventory}', [InventoryController::class, 'update'])->name('backend.inventory.update');
    Route::get('/backend/inventory/index', [InventoryController::class, 'index'])->name('backend.inventory.index');
    Route::delete('/backend/inventory/delete/{inventory}', [InventoryController::class, 'delete'])->name('backend.inventory.delete');
    Route::get('/backend/inventory/trash', [InventoryController::class, 'trash'])->name('backend.inventory.trash');
    Route::get('/backend/inventory/restore/{inventory}', [InventoryController::class, 'restore'])->name('backend.inventory.restore');
    Route::delete('/backend/inventory/parmanently_delete/{inventory}', [InventoryController::class, 'pdelete'])->name('backend.inventory.pdelete');


    Route::get('/backend/invoiceitem/edit/{invoiceitem}', [InvoiceItemController ::class, 'edit'])->name('backend.invoiceitem.edit');
    Route::post('/backend/invoiceitem/update/{invoiceitem}', [InvoiceItemController::class, 'update'])->name('backend.invoiceitem.update');
    Route::get('/backend/invoiceitem/index', [InvoiceItemController::class, 'index'])->name('backend.invoiceitem.index');
    Route::delete('/backend/invoiceitem/delete/{invoiceitem}', [InvoiceItemController::class, 'delete'])->name('backend.invoiceitem.delete');
    Route::get('/backend/invoiceitem/trash', [InvoiceItemController::class, 'trash'])->name('backend.invoiceitem.trash');
    Route::get('/backend/invoiceitem/restore/{invoiceitem}', [InvoiceItemController::class, 'restore'])->name('backend.invoiceitem.restore');
    Route::delete('/backend/invoiceitem/parmanently_delete/{invoiceitem}', [InvoiceItemController::class, 'pdelete'])->name('backend.invoiceitem.pdelete');

});
Route::middleware('auth')->group(function () {
    Route::get('/backend/categories/create',[CategoryController::class,'create'])->name('backend.categories.create');
    Route::post('/backend/categories/store',[CategoryController::class,'store'])->name('backend.categories.store');
    Route::get('/backend/categories/index',[CategoryController::class,'index'])->name('backend.categories.index');
    Route::get('/backend/categories/edit/{category}',[CategoryController::class,'edit'])->name('backend.categories.edit');
    Route::post('/backend/categories/update/{category}',[CategoryController::class,'update'])->name('backend.categories.update');
    Route::delete('/backend/categories/delete/{category}',[CategoryController::class,'delete'])->name('backend.categories.delete');
    Route::get('/backend/categories/trash',[CategoryController::class,'trash'])->name('backend.categories.trash');
    Route::get('/backend/categories/restore/{category}',[CategoryController::class,'restore'])->name('backend.categories.restore');
    Route::delete('/backend/categories/parmanent_delete/{category}',[CategoryController::class,'pdelete'])->name('backend.categories.pdelete');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/backend/suppliers/create',[SupplierController::class,'create'])->name('backend.supplier.create');
    Route::get('/backend/suppliers/store',[SupplierController::class,'store'])->name('backend.supplier.store');
    Route::get('/backend/suppliers/index',[SupplierController::class,'index'])->name('backend.supplier.index');
    Route::get('/backend/suppliers/edit/{supplier}',[SupplierController::class,'edit'])->name('backend.supplier.edit');
    Route::post('/backend/suppliers/update/{supplier}',[SupplierController::class,'update'])->name('backend.supplier.update');
    Route::delete('/backend/suppliers/delete/{supplier}',[SupplierController::class,'delete'])->name('backend.supplier.delete');
    Route::get('/backend/suppliers/trash',[SupplierController::class,'trash'])->name('backend.supplier.trash');
    Route::get('/backend/suppliers/restore/{supplier}',[SupplierController::class,'restore'])->name('backend.supplier.restore');
    Route::delete('/backend/suppliers/parmanent_delete/{supplier}',[SupplierController::class,'pdelete'])->name('backend.supplier.pdelete');

});

Route::middleware('auth')->group(function () {
    Route::get('/backend/companies/create',[companyController::class,'create'])->name('backend.company.create');
    Route::post('/backend/companies/store',[companyController::class,'store'])->name('backend.company.store');
    Route::get('/backend/companies/index',[companyController::class,'index'])->name('backend.company.index');
    Route::get('/backend/companies/edit/{company}',[companyController::class,'edit'])->name('backend.company.edit');
    Route::post('/backend/companies/update/{company}',[companyController::class,'update'])->name('backend.company.update');
    Route::delete('/backend/companies/delete/{company}',[companyController::class,'delete'])->name('backend.company.delete');
    Route::get('/backend/companies/trash',[companyController::class,'trash'])->name('backend.company.trash');
    Route::get('/backend/companies/restore/{company}',[companyController::class,'restore'])->name('backend.company.restore');
    Route::delete('/backend/companies/parmanent_delete/{company}',[companyController::class,'pdelete'])->name('backend.company.pdelete');

});

Route::middleware('auth')->group(function () {
    Route::get('/backend/accounts/create',[AccountController::class,'create'])->name('backend.account.create');
    Route::post('/backend/accounts/store/{user_id}',[AccountController::class,'store'])->name('backend.account.store');
    Route::get('/backend/accounts/index',[AccountController::class,'index'])->name('backend.account.index');
    Route::get('/backend/accounts/edit/{account}',[AccountController::class,'edit'])->name('backend.account.edit');
    Route::post('/backend/accounts/update/{account}',[AccountController::class,'update'])->name('backend.account.update');
    Route::delete('/backend/accounts/delete/{account}',[AccountController::class,'delete'])->name('backend.account.delete');
    Route::get('/backend/accounts/trash',[AccountController::class,'trash'])->name('backend.account.trash');
    Route::get('/backend/accounts/restore/{account}',[AccountController::class,'restore'])->name('backend.account.restore');
    Route::delete('/backend/accounts/parmanent_delete/{account}',[AccountController::class,'pdelete'])->name('backend.account.pdelete');


    Route::post('/backend/accounts/search',[AccountController::class,'search'])->name('backend.account.search');
    Route::post('/backend/accounts/search_salary',[AccountController::class,'search_salary'])->name('backend.account.search_salary');
    Route::get('/backend/accounts/salary_clearance',[AccountController::class,'salary_clearance'])->name('backend.account.salary_clearance');
    Route::get('/backend/accounts/salary_create',[AccountController::class,'salary_create'])->name('backend.account.salary_create');
    Route::post('/backend/accounts/salary_create/store_salary',[AccountController::class,'salary'])->name('backend.account.store_salary');
    Route::post('/backend/accounts/salary_create/store_salary_clearance',[AccountController::class,'salary'])->name('backend.account.store_salary');
});



Route::middleware('auth')->group(function () {
    Route::get('/backend/admin/create',[AdminController::class,'create'])->name('backend.admin.create_role');
    Route::post('/backend/admin/store',[AdminController::class,'store'])->name('backend.admin.store');
    Route::post('/backend/admin/authenticate', [AdminController::class, 'authenticate'])->name('backend.admin.authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('/backend/ProductReturn/create', [ProductReturnController::class,'create'])->name('backend.productReturn.create');
    Route::post('/search-invoice', [ProductReturnController::class,'searchInvoice'])->name('backend.productReturn.search');
    Route::post('/return-data', [ProductReturnController::class,'return_Product'])->name('return.product');
});


Route::middleware('auth')->group(function () {
    Route::get('/backend/customers/make', [CustomerController::class,'create'])->name('backend.customers.make');
    Route::post('/backend/customers/store', [CustomerController::class,'store'])->name('backend.customers.store');
    Route::get('/backend/customers/index', [CustomerController::class,'index'])->name('backend.customers.index');
    Route::get('/backend/customers/edit/{customer}', [CustomerController::class,'edit'])->name('backend.customers.edit');
    Route::post('/backend/customers/update/{customer}', [CustomerController::class,'update'])->name('backend.customers.update');
    Route::get('/backend/customers/trash', [CustomerController::class,'trash'])->name('backend.customers.trash');
    Route::get('/backend/customers/restore/{customer}', [CustomerController::class,'restore'])->name('backend.customers.restore');
    Route::delete('/backend/customers/delete/{customer}', [CustomerController::class,'delete'])->name('backend.customers.delete');
    Route::delete('/backend/customers/pdelete/{customer}', [CustomerController::class,'pdelete'])->name('backend.customers.pdelete');
});
 
 Route::middleware('auth')->group(function () {
    Route::post('get-purchase-price', [ProfitController::class,'getPurchasePrice'])->name('get-purchase-price');
    Route::post('/backend/inventory/insert-profit', [ProfitController::class,'insertProfit'])->name('insert-profit');
    Route::post('/delete-profits-by-invoice-id', [ProfitController::class,'deleteProfitsByInvoiceId'])->name('delete.profits.by.invoice.id');

    Route::get('/backend/profits/index', [ProfitController::class,'index'])->name('backend.profit.index');
    Route::get('/backend/profits//edit/{profit}', [ProfitController::class, 'edit'])->name('backend.profit.edit');
    Route::post('/backend/profits/update/{profit}', [ProfitController::class, 'update'])->name('backend.profit.update');
    Route::delete('/backend/profits/move_to_trash/{profit}',[ProfitController::class,'delete'])->name('backend.profit.delete');
    Route::get('/backend/profits/trash', [ProfitController::class, 'trash'])->name('backend.profit.trash');
    Route::get('/backend/profits/restore/{profit}',[ProfitController::class,'restore'])->name('backend.profit.restore');
    Route::delete('/backend/profits/delete/{profit}',[ProfitController::class,'pdelete'])->name('backend.profit.pdelete');
});
Route::middleware('auth')->group(function () {
        
    Route::get('auth/register/editrole/{id}', [App\Http\Controllers\Auth\RegisteredUserController::class, 'editrole'])->name('backend.admin.create');
    Route::get('auth/register/index', [App\Http\Controllers\Auth\RegisteredUserController::class, 'index'])->name('backend.admin.index');
    Route::post('auth/register/update_role/{user}', [App\Http\Controllers\Auth\RegisteredUserController::class, 'updaterole'])->name('backend.admin.updaterole');
    Route::get('auth/register/role_index', [App\Http\Controllers\Auth\RegisteredUserController::class, 'role_index'])->name('backend.admin.role_index');
    Route::post('auth/register/delete_role/{user}', [App\Http\Controllers\Auth\RegisteredUserController::class, 'delete_role'])->name('backend.admin.delete_role');
    Route::get('auth/register/edit/{id}', [App\Http\Controllers\Auth\RegisteredUserController::class, 'edit'])->name('backend.admin.edit');
    Route::post('auth/register/update/{user}', [App\Http\Controllers\Auth\RegisteredUserController::class, 'update'])->name('backend.admin.update');
    Route::delete('auth/register/delete/{user}', [App\Http\Controllers\Auth\RegisteredUserController::class, 'delete'])->name('backend.admin.delete');
    Route::get('auth/register/restore/{user}', [App\Http\Controllers\Auth\RegisteredUserController::class, 'restore'])->name('backend.admin.restore');
    Route::get('auth/register/trash', [App\Http\Controllers\Auth\RegisteredUserController::class, 'trash'])->name('backend.admin.trash');
    Route::delete('auth/register/pdelete/{user}', [App\Http\Controllers\Auth\RegisteredUserController::class, 'pdelete'])->name('backend.admin.pdelete');



    Route::get('/backend/products-order/create', [ ProductOrderController::class, 'create'])->name('backend.productorder.create');
    Route::post('/backend/products-order/store', [ ProductOrderController::class, 'store'])->name('backend.productorder.store');
    Route::get('/backend/products-order/index', [ ProductOrderController::class, 'index'])->name('backend.productorder.index');
    Route::get('/backend/products-order/ordered_product_index', [ ProductOrderController::class, 'show_order'])->name('backend.productorder.show-order');
    Route::get('/backend/products/order/search', [ProductOrderController::class, 'search'])->name('backend.productorder.search');
    Route::post('/search-low-stock-products', [ProductController::class,'searchLowStockProducts'])->name('search.low.stock.products');
    Route::post('/products/search', [ProductOrderController::class,'searchByUniqueId'])->name('backend.product.search');

    Route::get('/backend/products-order/edit/{product}', [ ProductOrderController::class, 'edit'])->name('backend.productorder.edit');
    Route::post('/backend/products-order/update/{product}', [ ProductOrderController::class, 'update'])->name('backend.productorder.update');
    Route::delete('/backend/products-order/delete/{product}', [ ProductOrderController::class, 'delete'])->name('backend.productorder.delete');

    Route::get('/backend/products-order/pdf/create', [ ProductOrderController::class, 'pdf'])->name('backend.productorder.pdf');

    Route::get('/backend/institute/create', [ InstituteController::class, 'create'])->name('backend.institute.create');
    Route::post('/backend/institute/store', [ InstituteController::class, 'store'])->name('backend.institute.store');
    Route::get('/backend/institute/edit/{company}', [ InstituteController::class, 'edit'])->name('backend.institute.edit');
    Route::post('/backend/institute/update/{company}', [ InstituteController::class, 'update'])->name('backend.institute.update');
    Route::get('/backend/institute/index', [ InstituteController::class, 'index'])->name('backend.institute.index');
    Route::delete('/backend/institute/delete/{company}', [ InstituteController::class, 'delete'])->name('backend.institute.delete');

    });
    
    


require __DIR__.'/auth.php';
