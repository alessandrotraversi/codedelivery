<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;


class OrdersController extends Controller
{
    
    private $repository;
    
    public function __construct(OrderRepository $repository, UserRepository $userRepository){
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }
    
    public function index(){
        
        $orders = $this->repository->paginate();
        return view('admin.orders.index', compact('orders'));
    
    }
    
    public function edit($id, UserRepository $userRepository){
        
        $list_status = ['0'=>'Pendente', '1'=>'Inviato', '2'=>'Ricevuto', '3'=>'Cancellato'];
        $order = $this->repository->find($id);
        $deliveryman = $userRepository->findWhere(['role'=>'deliveryman'], ['name','id']);

        return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
    
    }
    
    public function update(Request $request, $id){
        
        $all = $request->all();
        $this->repository->update($all, $id);
        
        return redirect()->route('admin.orders.index');
    
    }
}