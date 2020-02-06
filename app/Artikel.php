<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
    	'judul',
    	'slug', 'deskripsr', 'foto', 'user_id', 'kategori_id'
    ];
    public $timestamps = true;
    public function kategori ()
    {
    	// data Model 'Artikel' bisa dimiliki oleh Model 'kategori'
    	// melalui 'kategori_id'
    	return $this->belongsTo('App\Kategori', 'kategori_id');
    }
     public function user ()
    {
        // Model user bisa memiliki banyak data
        // dari model Artikel melalui user_id
        return $this->belongsTo('App\User', 'user_id');
    }
    public function tag ()
    {
        // Model tag memiliki relasi many to many(belongsToMany)
        // terhadap model 'Artikel' yang terhubung oleh
        // table 'artikel_tag' masing-masing sebagai tag_id dan kategori_id
        return $this->belongsToMany(
        	'App\Artikel',
        	'artikel_tag',
        	'artikel_id',
        	'tag_id'

        );

    }

}
