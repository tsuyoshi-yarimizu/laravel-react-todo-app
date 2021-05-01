<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\TodoModel
 *
 * @property int $todo_id Todo ID
 * @property int $user_id User ID
 * @property string $todo_name Todo名
 * @property string $todo_detail Todo詳細
 * @property int $priority 優先度
 * @property string $expire_date 期限
 * @property \Illuminate\Support\Carbon $created_at レコード作成日時
 * @property \Illuminate\Support\Carbon|null $updated_at レコード更新日時
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereTodoDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereTodoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereTodoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereUserId($value)
 */
	class TodoModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

