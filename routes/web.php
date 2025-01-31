<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SucursalController;

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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('chart_provider', 'ChartController@ChartProvider');
Route::get('get_data_Dash', 'DashboardController@GetData');


/***Category***/
Route::prefix('category')->group(function () {
	Route::get('/', function () {
		$name_view = 'CATEGORIA';
		return view('master_tables.mae_category', compact('name_view'));
	});

	Route::get('/create', function () {
		$name_view = 'CATEGORIA';
		return view('master_tables.mae_category', compact('name_view'));
	});

	Route::get('/edit', function () {
		$name_view = 'CATEGORIA';
		return view('master_tables.mae_category', compact('name_view'));
	});

	Route::get('/search_category', 'CategoryController@SearchCategory');
});

Route::get('get_categories', 'CategoryController@GetCategories');
Route::post('post_categories', 'CategoryController@PostCategories');
Route::post('edit_categories', 'CategoryController@EditCategories');


/***Colletion***/

Route::prefix('collection')->group(function () {
	Route::get('/', function () {
		$name_view = 'COLECCIÓN';
		return view('master_tables.mae_collections', compact('name_view'));
	});

	Route::get('/create', function () {
		$name_view = 'COLECCIÓN';
		return view('master_tables.mae_collections', compact('name_view'));
	});

	Route::get('/edit', function () {
		$name_view = 'COLECCIÓN';
		return view('master_tables.mae_collections', compact('name_view'));
	});

	Route::get('/search_collection', 'CollectionsController@SearchCollection');
});
Route::get('get_collection', 'CollectionsController@GetCollections');
Route::post('post_collection', 'CollectionsController@PostCollections');
Route::post('edit_collection', 'CollectionsController@EditCollections');

/* Colors */

Route::prefix('color')->group(function() {
	Route::get('/', function() {
		$name_view = 'COLORES';
		return view('master_tables.mae_collections', compact('name_view'));
	});

	Route::get('/create', function() {
		$name_view = 'COLORES';
		return view('master_tables.mae_collections', compact('name_view'));
	});
});

Route::get('/get_colors', 'ColorController@index');
Route::post('/post_color', 'ColorController@post');
Route::post('/destroy_color/{id}', 'ColorController@destroy');

/***Discounts***/

Route::prefix('discount')->group(function () {
	Route::get('/', function () {
		$name_view = 'DESCUENTOS';
		return view('master_tables.mae_discounts', compact('name_view'));
	});

	Route::get('/create_group', function () {
		$name_view = 'DESCUENTOS';
		return view('master_tables.mae_discounts', compact('name_view'));
	});

	Route::get('/create', function () {
		$name_view = 'DESCUENTOS';
		return view('master_tables.mae_discounts', compact('name_view'));
	});

	Route::get('/edit', function () {
		$name_view = 'DESCUENTOS';
		return view('master_tables.mae_discounts', compact('name_view'));
	});

	Route::get('/search_discount', 'DiscountController@SearchDiscounts');
});
Route::get('get_group_discount', 'DiscountController@GetGroupDiscounts');
Route::get('get_discount', 'DiscountController@GetDiscounts');
Route::post('post_discount', 'DiscountController@PostDiscounts');
Route::post('edit_discount', 'DiscountController@EditDiscounts');


/***Materials***/
Route::prefix('material')->group(function () {
	Route::get('/', function () {
		$name_view = 'MATERIAL';
		return view('master_tables.mae_materials', compact('name_view'));
	});

	Route::get('/create', function () {
		$name_view = 'MATERIAL';
		return view('master_tables.mae_materials', compact('name_view'));
	});

	Route::get('/edit', function () {
		$name_view = 'MATERIAL';
		return view('master_tables.mae_materials', compact('name_view'));
	});

	Route::get('/search_material', 'MaterialController@SearchMaterials');
});

Route::get('get_material', 'MaterialController@GetMaterials');
Route::post('post_material', 'MaterialController@PostMaterials');
Route::post('edit_material', 'MaterialController@EditMaterials');

/***Sucursals***/
Route::prefix('sucursal')->group(function () {

	Route::get('/', function () {
		$name_view = 'SUCURSAL';
		return view('master_tables.mae_sucursals', compact('name_view'));
	});

	Route::get('/create', function () {
		$name_view = 'SUCURSAL';
		return view('master_tables.mae_sucursals', compact('name_view'));
	});

	Route::get('/edit', function () {
		$name_view = 'SUCURSAL';
		return view('master_tables.mae_sucursals', compact('name_view'));
	});

	// Seleeccionar sucursal al iniciar sesion
	Route::get('seleccionar', 'SucursalController@seleccionarSucursal')->name('sucursal.seleccionar.get');
	Route::post('seleccionar', 'SucursalController@seleccionarSucursalPost')->name('sucursal.seleccionar.post');

});

Route::get('get_sucursal', 'SucursalController@GetSucursals');
Route::post('post_sucursal', 'SucursalController@PostSucursals');


/***Providers***/
Route::prefix('provider')->group(function () {
	Route::get('/', function () {
		$name_view = 'PROVEEDOR';
		$user = \Auth::user();
		return view('master_tables.mae_providers', compact('name_view', 'user'));
	});

	Route::get('/create', function () {
		$name_view = 'PROVEEDOR';
		$user = \Auth::user();
		return view('master_tables.mae_providers', compact('name_view', 'user'));
	});

	Route::get('/edit', function () {
		$name_view = 'PROVEEDOR';
		$user = \Auth::user();
		return view('master_tables.mae_providers', compact('name_view', 'user'));
	});

	Route::get('/purchase_orders/lista', function () {
		$name_view = 'PROVEEDOR';
		$user = \Auth::user();
		return view('master_tables.mae_providers', compact('name_view', 'user'));
	});

	Route::get('/purchase_orders/create', function () {
		$name_view = 'PROVEEDOR';
		$user = \Auth::user();
		return view('master_tables.mae_providers', compact('name_view', 'user'));
	});

	Route::get('/search_providers', 'ProviderController@SearchProviders');
});


Route::get('get_provider', 'ProviderController@GetProvider');
Route::post('post_provider', 'ProviderController@PostProvider');
Route::post('edit_providers', 'ProviderController@EditProviders');


/***Products***/
Route::prefix('products')->group(function () {
	Route::get('/', function () {
		$name_view = 'PRODUCTOS';
		$user = \Auth::user();
		return view('processes_tables.tbl_products', compact('name_view', 'user'));
	});

	Route::get('/create', function () {
		$name_view = 'PRODUCTOS';
		$user = \Auth::user();
		return view('processes_tables.tbl_products', compact('name_view', 'user'));
	});

	Route::get('/edit', function () {
		$name_view = 'PRODUCTOS';
		$user = \Auth::user();
		return view('processes_tables.tbl_products', compact('name_view', 'user'));
	});

	Route::get('/search_products', 'ProductsController@SearchProducts');
});

Route::get('get_products', 'ProductsController@GetProducts');
Route::post('/post_products', 'ProductsController@PostProducts');
Route::post('/put_products', 'ProductsController@PutProducts');
Route::get('/generate_qr/{id}', 'ProductsController@GenerateQR');

/***Sales***/
Route::prefix('sales')->group(function () {
	Route::get('/pedidos', function () {
		$name_view = 'GENERAR VENTA';
		$user = \Auth::user();
		return view('processes_tables.tbl_sales', compact('name_view', 'user'));
	});

	Route::get('/compra', function () {
		$name_view = 'GENERAR VENTA';
		$user = \Auth::user();
		return view('processes_tables.tbl_sales', compact('name_view', 'user'));
	});

	Route::get('/pago', function () {
		$name_view = 'GENERAR VENTA';
		$user = \Auth::user();
		return view('processes_tables.tbl_sales', compact('name_view', 'user'));
	});

	Route::get('/finish_sales', function () {
		$name_view = 'GENERAR VENTA';
		$user = \Auth::user();
		return view('processes_tables.tbl_sales', compact('name_view', 'user'));
	});
});
Route::post('sales_products', 'SalesController@Data_Products');
Route::post('get_products_pedidos', 'SalesController@Data_Products_Pedidos');
Route::post('/post_pago_efectivo', 'SalesController@PostSales');

/***Sales Detail***/
Route::prefix('sales')->group(function () {
	Route::get('/details', function () {
		$name_view = 'DETALLES VENTAS';
		$user = \Auth::user();
		return view('processes_tables.tbl_sales', compact('name_view', 'user'));
	});
});

Route::post('get_sales_details', 'SalesController@GetSalesDetails');
Route::put('update_statussales', 'SalesController@UpdateStatus');
Route::post('findBysalesDate', 'SalesController@findBySalesDetailsDate');
Route::post('getsalesdate', 'SalesController@GetSalesDate');
Route::post('getsalesmonth', 'SalesController@GetSalesMonth');
Route::post('getsalesyear', 'SalesController@GetSalesYear');


/***Sales Report***/
Route::prefix('sales')->group(function () {
	Route::get('/report', function () {
		$name_view = 'REPORTE DE VENTAS';
		$user = \Auth::user();
		return view('processes_tables.tbl_sales_reports', compact('name_view', 'user'));
	});

	Route::get('/search_users', 'UserController@SearchUsers');

});

/***LayAway***/
Route::prefix('layaway')->group(function () {
	Route::get('/pedidos', function () {
		$name_view = 'GENERAR LAYAWAY';
		$user = \Auth::user();
		return view('processes_tables.tbl_layaway', compact('name_view', 'user'));
	});

	Route::get('/compra', function () {
		$name_view = 'GENERAR LAYAWAY';
		$user = \Auth::user();
		return view('processes_tables.tbl_layaway', compact('name_view', 'user'));
	});

	Route::get('/pago', function () {
		$name_view = 'GENERAR LAYAWAY';
		$user = \Auth::user();
		return view('processes_tables.tbl_layaway', compact('name_view', 'user'));
	});

	Route::get('/finish_layaway', function () {
		$name_view = 'GENERAR LAYAWAY';
		$user = \Auth::user();
		return view('processes_tables.tbl_layaway', compact('name_view', 'user'));
	});
});
Route::post('layaway_products', 'LayawayController@Data_Products');
Route::post('layaway_get_products_pedidos', 'LayawayController@Data_Products_Pedidos');
Route::post('/layaway_post_pago_efectivo', 'LayawayController@PostLayaway');


/***layaway Detail***/
Route::prefix('layaway')->group(function () {
	Route::get('/details', function () {
		$name_view = 'DETALLES LAYAWAY';
		$user = \Auth::user();
		return view('processes_tables.tbl_layaway', compact('name_view', 'user'));
	});
});

Route::post('get_layaway_details', 'LayAwayController@GetLayawayDetails');
Route::put('update_statuslayaway', 'LayAwayController@UpdateStatus');
Route::post('findBylayawayDate', 'LayAwayController@findByLayawayDetailsDate');
Route::post('getlayawaydate', 'LayAwayController@GetLayawayDate');
Route::post('getlayawaymonth', 'LayAwayController@GetLayawayMonth');
Route::post('getlayawayyear', 'LayAwayController@GetLayawayYear');

/***Usuarios***/
Route::prefix('user')->group(function () {

	Route::get('/', function () {
		$name_view = 'Usuarios';
		return view('master_tables.mae_user', compact('name_view'));
	});

	Route::get('/create', function () {
		$name_view = 'Usuarios';
		return view('master_tables.mae_user', compact('name_view'));
	});

	Route::get('/edit', function () {
		$name_view = 'Usuarios';
		return view('master_tables.mae_user', compact('name_view'));
	});

	Route::get('/search_users', 'UserController@SearchUsers');
});

Route::get('/get_users', 'UserController@GetUsers');
Route::get('/get_roles', 'UserController@GetRoles');
Route::post('/post_users', 'UserController@PostUsers');
Route::put('/update_user', 'UserController@UpdateUser');

/***Inventories***/
Route::prefix('inventory')->group(function () {
	Route::get('/', function () {
		$name_view = 'INVENTARIO';
		return view('processes_tables.tbl_inventories', compact('name_view'));
	});

	Route::get('/edit', function () {
		$name_view = 'INVENTARIO';
		return view('processes_tables.tbl_inventories', compact('name_view'));
	});

	Route::get('/details/{products_id}', function () {
		$name_view = 'INVENTARIO';
		return view('processes_tables.tbl_inventories', compact('name_view'));
	});

	Route::get('/add/{products_id}', function () {
		$name_view = 'INVENTARIO';
		return view('processes_tables.tbl_inventories', compact('name_view'));
	});

});

Route::get('inventory_details/{products_id}', 'InventoryController@DetailsInventory');
Route::post('inventory_add', 'InventoryController@InvetarioAdd');
Route::get('get_inventario', 'InventoryController@GetInventario');
Route::get('/generate_qr_inventorie/{products_id}', 'InventoryController@GenerateQRInventorie');
Route::get('/generate_qr_byinventorie/{inventories_codigo}', 'InventoryController@GenerateQRByInventorie');
Route::get('/find_by_code_inventory/{codigo}', 'InventoryController@findByInventoryCode');
Route::post('uploadimage_inventorie', 'InventoryController@UploadImageInventorie');
Route::post('tranferencia_inventorie', 'InventoryController@TransferenciaInventorie');
Route::post('/destroy_inventory/{id}', 'InventoryController@DestroyInventory');

Route::get('data_districts', 'DistrictsController@GetDistricts');

/**PurcheaseOrders**/
Route::get('/search_producto/{products_name}', 'Purchase_OrdersController@SearchProducto');
Route::get('/search_proveedor/{providers_name}', 'Purchase_OrdersController@SearchProveedor');
Route::post('/post_order', 'Purchase_OrdersController@CreateListOrder');
Route::get('/get_purchaseorder', 'Purchase_OrdersController@GetPurchaseOrder');
Route::post('/post_confirm_order', 'Purchase_OrdersController@Confirm_Order');
Route::post('/post_recibido_order', 'Purchase_OrdersController@Recibido_Order');
Route::post('/get_pedidos', 'Purchase_OrdersController@GetPedidos');
Route::post('/post_pedido', 'Purchase_OrdersController@UpdatePedido');
Route::post('/get_list_products', 'ProductsController@GetListProducts');
Route::post('/create_groupdiscounts', 'DiscountController@CreateGroupDiscounts');

/** Customers ***/
Route::prefix('customers')->group(function () {

	Route::get('/', function () {
		$name_view = 'CLIENTES';
		return view('processes_tables.tbl_customers', compact('name_view'));
	});

	Route::get('/customer_details', function () {
		$name_view = 'CLIENTES';
		return view('processes_tables.tbl_customers', compact('name_view'));
	});


	// Busqueda de un cliente por numero de celular
	Route::get('/search-phone/{phone}', 'CustomerController@findByPhone');

	
});

Route::get('get_customers', 'CustomerController@getCustomers');
Route::get('search_customers', 'CustomerController@searchCustomers');
Route::post('sales_customers', 'CustomerController@GetDetailsCustomers');



/***SOLICITUDES***/
Route::prefix('solicitudes')->group(function () {

	Route::get('/', function () {
		$name_view = 'Solicitudes';
		$user = \Auth::user();
		$sucursal = session('sucursal')[0];
		return view('processes_tables.tbl_solicitudes', compact('name_view', 'user', 'sucursal'));
	});

	Route::get('/create', function () {
		$name_view = 'Solicitudes';
		$user = \Auth::user();
		$sucursal = session('sucursal')[0];
		return view('processes_tables.tbl_solicitudes', compact('name_view', 'user', 'sucursal'));
	});
	
});

Route::get('/solicitante', function () {
	$name_view = 'Solicitudes';
	$user = \Auth::user();
	$sucursal = session('sucursal')[0];
	return view('processes_tables.tbl_solicitudes', compact('name_view', 'user', 'sucursal'));
});

Route::get('get_solicitudes', 'SolicitudesController@GetSolicitudes');
Route::get('get_solicitante', 'SolicitudesController@GetSolicitante');
Route::post('post_solicitudes', 'SolicitudesController@PostSolicitudes');


/**Clover Test**/
Route::get('/clover-post', 'CloverController@authorization');
