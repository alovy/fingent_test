<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'customer_name', 'customer_contact', 'customer_email', 'sub_total', 'amount', 'total', 'discount_type', 'discount'];

    public function items()
    {
        return $this->hasMany('App\Model\InvoiceItem');
    }
}
