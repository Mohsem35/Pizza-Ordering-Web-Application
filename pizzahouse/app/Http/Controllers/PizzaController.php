<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;          //telling which model have to interact

class PizzaController extends Controller
{
    //public function __construct(){
    //    $this->middleware('auth');
    //}
    public function index(){

        $pizzas = Pizza::all(); //Pizza = model name, $pizzas = variable


        /*$pizzas = [
            ['type' => 'hawaiian', 'base' => 'chessy crust'],
            ['type' => 'volcano', 'base' => 'garlic crust'],
            ['type' => 'veg supreme', 'base' => 'thin & cripsy']
            ];*/
    
        $name = request('name');   //'name=Tuhin' is key of query parameter(after?), it is saved in $name variable
        $age = request('age');   //'age=30' is key of query parameter and it is saved in $age variable
    
        return view('pizzas.index', [
            'pizzas' => $pizzas,
            //'name' => $name,
            //'age' => $age,
        ]);
    }

    public function show($id){

        $pizza = Pizza::findOrFail($id);    //Pizza = model name, find() = function, $id = through id

        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create(){

        return view('pizzas.create');
    }

    public function store(){

        $pizza = new Pizza();

        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');  

        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order');
    }

    public function destroy($id) {

        $pizza = Pizza::findOrFail($id);
        
        $pizza->delete();

        return redirect('/pizzas');
    }
}
