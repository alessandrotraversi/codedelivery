<?php

namespace CodeDelivery\Http\Controllers;

use Auth;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;


use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;


class CheckoutController extends Controller
{
    
    private $repository;
    private $userRepository;
    private $productRepository;
    private $service;
        
    public function __construct(OrderRepository $repository, UserRepository $userRepository, ProductRepository $productRepository, OrderService $service){

        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderService = $service;

    }
    
    public function index(){
    
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $orders = $this->repository->scopeQuery(function($query) use($clientId){
            return $query->where('client_id', '=', $clientId);          
        })->paginate();
        
        return view('costumer.order.index', compact('orders'));
    }
    
    public function create(){
    
        $products = $this->productRepository->lists();
        return view('costumer.order.create', compact('products'));
        
    }
    
    public function store(Request $request){
    
        $data = $request->all();
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->service->create($data);
        
        return redirect()->route('costumer.order.index');
        
    
    }

}