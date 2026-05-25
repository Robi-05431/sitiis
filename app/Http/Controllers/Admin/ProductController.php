<?php

namespace App\Http\Controllers\Admin;

use App\Application\UseCases\Product\CreateProductUseCase;
use App\Application\UseCases\Product\DeleteProductUseCase;
use App\Application\UseCases\Product\GetAllProductUseCase;
use App\Application\UseCases\Product\UpdateProductUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private GetAllProductUseCase $getAllProduct,
        private CreateProductUseCase $createProduct,
        private UpdateProductUseCase $updateProduct,
        private DeleteProductUseCase $deleteProduct,
    ) {}

    public function index()
    {
        $products = $this->getAllProduct->execute();
        return view('admin.product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string',
            'type'        => 'required|in:wisata,penginapan,camping',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $this->createProduct->execute($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name'        => 'required|string',
            'type'        => 'required|in:wisata,penginapan,camping',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $this->updateProduct->execute($id, $data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $this->deleteProduct->execute($id);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
