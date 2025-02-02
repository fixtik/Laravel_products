<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $productRepository;

    public function __construct()
    {
        $this->productRepository = app(ProductRepository::class);
    }

    public function index()
    {
        $items = $this->productRepository->getAllProductsWithPaginator(100);
        return view('products.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = new Product();
        return view('products.create', compact('item'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        $data = $request->input();
        // получение данных атрибутов
        $data['data'] = key_exists('attr_key', $data) ? array_combine($data['attr_key'], $data['attr_value']) : '{}';

        $item = new Product($data);

        $item->save();
        if ($item) {
            return redirect()->route('products.edit', [$item->id])
                ->with(['success'=>'Успешно добавлено']);
            }
        else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product_id)
    {
        $item = $this->productRepository->getEdit($product_id);
        if(empty($item)) {
            abort(404);
        }

        return view('products.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, $product_id)
    {
        $item = $this->productRepository->getEdit($product_id);
        if (empty($item)) {
            return back()->withErrors(['msg'=>"Запись {$product_id} не найдена"])->withInput();
        }

        $data = $request->all();

        // получение данных атрибутов
        $data['data'] = key_exists('attr_key', $data) ? array_combine($data['attr_key'], $data['attr_value']) : '{}';

        $result = $item->update($data);
        if ($result) {
            return redirect()->route('products.edit', $item->id)->with(['success'=>'Успешно сохранено']);
        }
        else{
            $mes = !auth()->user()->HasRole('admin') ? 'Возможно недостаточно прав доступа' : '';
            return back()->withErrors(['msg' => 'Ошибка сохранения. '.$mes])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

}
