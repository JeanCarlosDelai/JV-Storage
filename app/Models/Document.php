<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'conteudo',
        'path',
        'created_at',
    ];

    protected $dates = [
        'created_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'document_user')->withPivot('permissao');
    }

    public function getCanBeEditedAttribute()
    {
        return $this->hasRtfFormat();
    }
    public function createByUser()
    {
        return $this->belongsTo(User::class, 'createby');
    }
    private function hasRtfFormat()
    {
        return strtolower(pathinfo($this->nome, PATHINFO_EXTENSION)) === 'rtf';
    }
}
