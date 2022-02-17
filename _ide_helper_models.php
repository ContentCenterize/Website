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
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property int $third_party_id
 * @property int $category_id
 * @property string $post_id_in_thirdparty
 * @property string $content
 * @property int $level
 * @property bool $hide
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\ThirdParty|null $third_party
 * @property-read \Illuminate\Database\Eloquent\Collection|\CyrildeWit\EloquentViewable\View[] $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static \Illuminate\Database\Eloquent\Builder|Post orderByViews(string $direction = 'desc', ?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereHide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostIdInThirdparty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereThirdPartyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post withViewsCount(?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 */
	class Post extends \Eloquent implements \CyrildeWit\EloquentViewable\Contracts\Viewable {}
}

namespace App\Models{
/**
 * App\Models\ThirdParty
 *
 * @property int $id
 * @property string $type
 * @property string $base_url
 * @property string $description
 * @property int $user_id
 * @property string|null $updated
 * @property int $verified
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\ThirdPartyValidation|null $validation
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty query()
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty whereBaseUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty whereUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdParty whereVerified($value)
 */
	class ThirdParty extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ThirdPartyValidation
 *
 * @property int $id
 * @property string $type
 * @property string $validate_string
 * @property string|null $validated_at
 * @property int $third_party_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ThirdParty|null $third_party
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartyValidation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartyValidation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartyValidation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartyValidation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartyValidation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartyValidation whereThirdPartyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartyValidation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartyValidation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartyValidation whereValidateString($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartyValidation whereValidatedAt($value)
 */
	class ThirdPartyValidation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property string|null $hsuan_id
 * @property string|null $hsuan_token
 * @property string|null $hsuan_refresh_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property-read mixed $posts
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ThirdParty[] $third_parties
 * @property-read int|null $third_parties_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHsuanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHsuanRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHsuanToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

