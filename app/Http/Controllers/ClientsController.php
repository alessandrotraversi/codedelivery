<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Http\Controllers\Controller;

class ClientsController extends Controller
{
    
    private $repository;
    private $clientService;
        
    public function __construct(ClientRepository $repository, ClientService $clientService){

        $this->repository = $repository;
        $this->clientService = $clientService;

    }
    
    
    public function index(ClientRepository $repository){

        $clients = $this->repository->paginate(15);
        
        return view('admin.clients.index', compact('clients'));
        
    }
    
    public function create(){
        
        return view('admin.clients.create');
        
    }
    
    public function store(AdminClientRequest $request){//request sono i dati inseriti nel formulario
        
        $data = $request->all(); //dico di prenderli tutti
        $this->repository->create($data); //dico di salvare un nuovo record
        
        return redirect()->route('admin.clients.index');
        
    }
    
    public function edit($id){
        
        $client = $this->repository->find($id);
        
        return view('admin.clients.edit', compact('client'));
        
    }
    
    public function update(AdminClientRequest $request, $id){
        
        $data = $request->all();
        $this->clientService->update($data, $id);
        
        return redirect()->route('admin.clients.index');
        
    }
}
