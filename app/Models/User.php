<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function makeDirectory($image_folder_type)
    {
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        if(config('custom.image_folders')[$image_folder_type] == 'post'){
            if (!is_dir(public_path().'/images/post/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/post/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/post/'.$year.'/'.$month.'/'.$day.'/';
        }

    }

    public  static function save_image($requestData,$extension,$count,$image_folder_type)
    {
        $directory = self::makeDirectory($image_folder_type);
        $uploaded_name = $requestData->getClientOriginalName();
        $uploaded_ext = $requestData->getClientOriginalExtension();
        $uploaded_type = $requestData->getClientMimeType();
        $uploaded_tmp = $requestData->getPathname();



        // Where are we going to be writing to?
        $target_path   = $directory;

        //$target_file   = basename( $uploaded_name, '.' . $uploaded_ext ) . '-';
        $target_file   =  md5( uniqid() . $uploaded_name ) . '.' . $uploaded_ext;
        $temp_file     = ( ( ini_get( 'upload_tmp_dir' ) == '' ) ? ( sys_get_temp_dir() ) : ( ini_get( 'upload_tmp_dir' ) ) );
        $temp_file    .= DIRECTORY_SEPARATOR . md5( uniqid() . $uploaded_name ) . '.' . $uploaded_ext;


        // Is it an image?
        if( ( strtolower( $uploaded_ext ) == 'jpg' || strtolower( $uploaded_ext ) == 'jpeg' || strtolower( $uploaded_ext ) == 'png' ) &&
            ( $uploaded_type == 'image/jpeg' || $uploaded_type == 'image/png' ) &&
            getimagesize( $uploaded_tmp ) ) {
            // Strip any metadata, by re-encoding image (Note, using php-Imagick is recommended over php-GD)
            if( $uploaded_type == 'image/jpeg' ) {
                $img = imagecreatefromjpeg( $uploaded_tmp );
                imagejpeg( $img, $temp_file, 100);
            }
            else {
                $imagedata = getimagesize($requestData);
                $width = $imagedata[0];
                $height = $imagedata[1];
                $img = imagecreatefrompng( $uploaded_tmp );
                $new_image = imagecreatetruecolor ( $width, $height );
                imagealphablending($new_image , false);
                imagesavealpha($new_image , true);
                imagecopyresampled ( $new_image, $img, 0, 0, 0, 0, $width, $height, imagesx ( $img ), imagesy ( $img ) );
                $img = $new_image;
                // saving
                imagealphablending($img , false);
                imagesavealpha($img , true);
                imagepng ( $img, $temp_file);

//                imagepng( $img, $temp_file, 100);
            }
            imagedestroy( $img);

            //moving image
            if( rename( $temp_file, ( $target_path . $target_file ) ) ) {
                $image_path = $target_path . $target_file;
                $doc_name = md5(date('Ymd').'_@id'.$count.uniqid());
                return [$image_path,$doc_name];
            }
        }
        if(strtolower( $uploaded_ext ) == 'svg' && $uploaded_type =='image/svg+xml'){
            $target_path   = $target_path;
            $content =  file_get_contents($requestData);
            if(file_put_contents( $target_path.$target_file,$content)){
                return($target_path.$target_file);
            }
        }
        if(strtolower( $uploaded_ext ) == 'docx' || strtolower( $uploaded_ext ) == 'pdf'){
            $target_path   = $target_path;
            $content =  file_get_contents($requestData);
            if(file_put_contents( $target_path.$target_file,$content)){
                return($target_path.$target_file);
            }
        }
    }
}
