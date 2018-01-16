<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nama', 'stok', 'kategori', 'berat', 'deskripsi', 'sale_status', 'gambar', 'harga', 'harga_diskon'];
}