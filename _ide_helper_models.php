<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $brand_name
 * @property string|null $brand_code
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereBrandCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 */
	class Brand extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $category_name
 * @property string|null $category_code
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CoatingBrand
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CoatingOption> $coatingOptions
 * @property-read int|null $coating_options_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobFrame> $jobFrames
 * @property-read int|null $job_frames_count
 * @method static \Illuminate\Database\Eloquent\Builder|CoatingBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoatingBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoatingBrand query()
 */
	class CoatingBrand extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CoatingOption
 *
 * @property-read \App\Models\CoatingBrand|null $coatingBrand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobFrame> $jobFrames
 * @property-read int|null $job_frames_count
 * @method static \Illuminate\Database\Eloquent\Builder|CoatingOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoatingOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoatingOption query()
 */
	class CoatingOption extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $cus_id
 * @property string $cus_code
 * @property int $location_id
 * @property string $cus_name
 * @property string|null $email
 * @property string|null $address
 * @property string|null $dob
 * @property string|null $mobile
 * @property string|null $phone
 * @property string|null $remark
 * @property int|null $user_id
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Location $location
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCusName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUserId($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FrameShape
 *
 * @property int $id
 * @property string $name
 * @property string|null $code_no
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FrameShape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FrameShape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FrameShape query()
 * @method static \Illuminate\Database\Eloquent\Builder|FrameShape whereCodeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameShape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameShape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameShape whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameShape whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameShape whereUpdatedAt($value)
 */
	class FrameShape extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JobFrame
 *
 * @method static \Illuminate\Database\Eloquent\Builder|JobFrame newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobFrame newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobFrame query()
 */
	class JobFrame extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JobOrder
 *
 * @property-read \App\Models\Customer|null $customer
 * @property-read \App\Models\Location|null $location
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sales> $sales
 * @property-read int|null $sales_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SalesItem> $salesItems
 * @property-read int|null $sales_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|JobOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOrder query()
 */
	class JobOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JobPrescription
 *
 * @property-read \App\Models\JobOrder|null $jobOrder
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|JobPrescription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobPrescription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobPrescription query()
 */
	class JobPrescription extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Location
 *
 * @property int $id
 * @property string $name
 * @property string $store_code
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $website
 * @property array|null $social_media
 * @property string $default_language
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereDefaultLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereSocialMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereStoreCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereWebsite($value)
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PermissionModule
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule query()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule whereUpdatedAt($value)
 */
	class PermissionModule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $product_code
 * @property int $category_id
 * @property string $product_name
 * @property string|null $product_img
 * @property int $brand_id
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sales
 *
 * @property-read \App\Models\Customer|null $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SalesItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\JobOrder|null $jobOrder
 * @property-read \App\Models\Location|null $location
 * @method static \Illuminate\Database\Eloquent\Builder|Sales newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sales newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sales query()
 */
	class Sales extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SalesItem
 *
 * @property-read \App\Models\JobOrder|null $jobOrder
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\Sales|null $sale
 * @method static \Illuminate\Database\Eloquent\Builder|SalesItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesItem query()
 */
	class SalesItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $name
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $profile_image
 * @property string|null $last_login_ip
 * @property string|null $last_login_at
 * @property int $login_attempts
 * @property int $is_blocked
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $image
 * @property-read mixed $role_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsBlocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoginAttempts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

