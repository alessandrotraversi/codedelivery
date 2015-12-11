<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    
    private $repository;
        
        public function __construct(CategoryRepository $repository){
        
            $this->repository = $repository;
            
        }
    
    
    public function index(CategoryRepository $repository){

        $categories = $this->repository->paginate(15);
        
        return view('admin.categories.index', compact('categories'));
        
    }
    
    public function create(){
        
        return view('admin.categories.create');
        
    }
    
    public function store(AdminCategoryRequest $request){//request sono i dati inseriti nel formulario
        
        $data = $request->all(); //dico di prenderli tutti
        $this->repository->create($data); //dico di salvare un nuovo record
        
        return redirect()->route('admin.categories.index');
        
    }
    
    public function edit($id){
        
        $category = $this->repository->find($id);
        
        return view('admin.categories.edit', compact('category'));
        
    }
    
    public function update(AdminCategoryRequest $request, $id){
        
        $category = $this->repository->find($id);
        
        $data = $request->all();
        $this->repository->update($data, $id);
        
        return redirect()->route('admin.categories.index');
        
    }
}
