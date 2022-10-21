<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingAvailability extends Model
{
    use HasFactory;

      /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['from', 'to'];

  /**
   * The storage format of the model's date columns.
   *
   * @var string
   */
  protected $dateFormat = 'Y-m-d';

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'from' => 'date:Y-m-d',
    'to' => 'date:Y-m-d',
  ];
}
