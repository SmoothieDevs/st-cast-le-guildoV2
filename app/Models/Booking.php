<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['start', 'end', 'nb_people'];

  /**
   * The model's default values for attributes.
   *
   * @var array
   */
  protected $attributes = [
    'status' => BookingStatus::NeedPayment,
  ];

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
    'status' => BookingStatus::class,
    'start' => 'date:Y-m-d',
    'end' => 'date:Y-m-d',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function bookedDates()
  {
    return Booking::whereNot('status', BookingStatus::Cancelled)->select('start', 'end')->get();
  }
}
