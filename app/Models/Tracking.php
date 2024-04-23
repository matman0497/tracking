<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tracking
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $request_time
 * @property string $ip_address
 * @property string $location
 * @property string $os
 * @property string $device
 * @property string $referrer
 * @property string $url
 * @property string $language
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereOs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereReferrer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereRequestTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereUrl($value)
 * @mixin \Eloquent
 */
class Tracking extends Model
{
    use HasFactory;

    protected $fillable = ['request_time', 'ip_address', 'location', 'os', 'device', 'referer', 'url', 'language'];
}
