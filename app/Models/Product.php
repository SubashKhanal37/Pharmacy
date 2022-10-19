<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'code',
        'name',
        'excerpt',
        'description',
        'image',
        'image_caption',
        'slug',
        'supplier_id',
        'supplier_id',
        'quantity',
        'm_date',
        'e_date',
        'p_price',
        's_price',
        'dis_price',
        'status',
        'display_order',
        'feature'
    ];
    public $timestamps = false;

    /**

     * Boot the model.

     */

    protected static function boot()
    {
        parent::boot();

        static::created(function ($product) {

            $product->slug = $product->createSlug($product->name);

            $product->save();
        });
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {

            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'supplier_id', 'id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price');
    }
}
