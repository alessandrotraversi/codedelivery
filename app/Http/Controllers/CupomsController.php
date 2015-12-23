<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CupomRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Http\Controllers\Controller;

class CupomsController extends Controller
{
    
    private $repository;
        
        public function __construct(CupomRepository $repository){
        
            $this->repository = $repository;
            
        }
    
    
    public function index(CupomRepository $repository){

        $cupoms = $this->repository->paginate(15);
        
        return view('admin.cupoms.index', compact('cupoms'));
        
    }
    
    public function create(){
        
        return view('admin.cupoms.create');
        
    }
    
    public function store(AdminCupomRequest $request){//request sono i dati inseriti nel formulario
        
        $data = $request->all(); //dico di prenderli tutti
        $this->repository->create($data); //dico di salvare un nuovo record
        
        return redirect()->route('admin.cupoms.index');
        
    }
    
    public function edit($id){
        
        $cupom = $this->repository->find($id);
        
        return view('admin.cupoms.edit', compact('cupom'));
        
    }
    
    public function update(AdminCupomRequest $request, $id){
        
        $cupom = $this->repository->find($id);
        
        $data = $request->all();
        $this->repository->update($data, $id);
        
        return redirect()->route('admin.cupoms.index');
        
    }
}
