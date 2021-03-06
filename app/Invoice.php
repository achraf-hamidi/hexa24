<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Invoice extends Model
{
	use SoftDeletes, LogsActivity;
    protected $fillable = [
        'client_id', 'invoice_no', 'title', 'invoice_date', 'sub_total', 'discount', 'total'
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
