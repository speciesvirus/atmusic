<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoSocial extends Model
{
    protected $fillable =  ['video','social','user','url','status'];
}
