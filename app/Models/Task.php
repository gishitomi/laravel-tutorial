<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class Task extends Model
{
    use HasFactory;
    // 状態定義
    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'badge-danger'],
        2 => ['label' => '着手中', 'class' => 'badge-info'],
        3 => ['label' => '完了', 'class' => 'badge-success'],
    ];

    // 状態のラベル
    public function getStatusLabelAttribute() {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を渡す
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute() {
        $status = $this->attributes['status'];
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['class'];
    }

    // 日付を整形
    public function getFormatteDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('Y/m/d');
    }
}
