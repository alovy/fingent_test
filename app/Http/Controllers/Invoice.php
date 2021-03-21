<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Model\Invoice as Model;
use App\Model\InvoiceItem as ItemModel;

use Config;

class Invoice extends Controller
{
    protected $response;

    protected $validatedData;
    
    /**
     * list the invoices.
     *
     * @return View
     */
    public function index()
    {
        $data = Model::with('items')->get();
        return view('view', ['data' => $data]);
    }

    /**
     * Invoice create form.
     *
     * @return View
     */
    public function create()
    {
        $taxes = Config::get('tax');
        return view('invoice', ['tax' => $taxes]);
    }

    /**
     * Store the invoices.
     *
     * @return View
     */
    public function store(Request $request)
    {    
        $this->validatedData = $request->validate([
            'customer_name' => 'required|string|max:50',
            'customer_email' => 'nullable|string|max:50',
            'customer_contact' => 'nullable|string|max:15',
            
            'sub_total' => 'required|numeric',
            'amount' => 'required|numeric',
            'discount_type' => 'nullable|in:A,P',
            'discount' => 'required|numeric',
            'total' => 'required|numeric',

            'items' => 'array|required',
            'items.*.item_name' => 'required|string|max:50',
            'items.*.quantity' => 'required|numeric|gt:0',
            'items.*.unit_price' => 'required|numeric',
            'items.*.amount' => 'required|numeric',
            'items.*.total' => 'required|numeric',
            'items.*.tax_percent' => 'required|numeric',
        ]);


        \DB::transaction(function () {
            $invoice = Model::create($this->validatedData);

            foreach ($this->validatedData['items'] as $items){ 
                $data = [
                    'invoice_id' => $invoice->id,
                    'item_name' => $items['item_name'],
                    'quantity' => (double) $items['quantity'],
                    'unit_price' => $items['unit_price'],
                    'tax_percent' => $items['tax_percent'] ?? 0,
                    'amount' => $items['amount'] ?? 0,
                    'total' => $items['total'] ?? 0,
                ];

                $this->response = ItemModel::create($data);
            }
        });
        return redirect('/');
    }

    /**
     * Store the invoices.
     *
     * @return View
     */
    public function preview(Model $invoice) 
    {
        return view('preview', compact('invoice'));
    }
}