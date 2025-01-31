<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;

     /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'link',
        'name',
        'sort',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function moveUp(){
        $this->move(-1);
    }
    public function moveDown(){
        $this->move(+1);
    }

    /**
     * Summary of move
     * @param int $to
     * @return void
     */
    private function move($to){
        $order = $this->sort;
        $newOrder = $order + $to;

        $swapWith = $this->user->links()->where('sort', '=', $newOrder)->first();
        $this->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order ])->save();
    }

}
