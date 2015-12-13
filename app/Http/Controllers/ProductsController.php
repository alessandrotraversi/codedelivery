<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminProductRequest;
use CodeDelivery\Http\Controllers\Controller;

class ProductsController extends Controller
{
    
    private $repository;
    private $categoryRepository;
        
        public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository){
        
            $this->repository = $repository;
            $this->categoryRepository = $categoryRepository;
            
        }
    
    
    public function index(ProductRepository $repository){

        $products = $this->repository->paginate(15);
        
        return view('admin.products.index', compact('products'));
        
    }
    
    public function create(){
        
        $categories= $this->categoryRepository->lists();
        return view('admin.products.create', compact('categories'));
        
    }
    
    public function store(AdminProductRequest $request){//request sono i dati inseriti nel formulario
        
        $data = $request->all(); //dico di prenderli tutti
        $this->repository->create($data); //dico di salvare un nuovo record
        
        return redirect()->route('admin.products.index');
        
    }
    
    public function edit($id){
        
        $product = $this->repository->find($id);
        $categories= $this->categoryRepository->lists();
        
        return view('admin.products.edit', compact('product', 'categories'));
        
    }
    
    public function update(AdminProductRequest $request, $id){
        
        $product = $this->repository->find($id);
        
        $data = $request->all();
        $this->repository->update($data, $id);
        
        return redirect()->route('admin.products.index');
        
    }
    
    public function destroy($id){
    
        $this->repository->delete($id);
        
        return redirect()->route('admin.products.index');
    
    }
}
