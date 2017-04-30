<?php
namespace Core;

class Enum
{

    public static function getImage_Folder_Name($img_size_id)
    {
        $result = "";
        switch ($img_size_id) {
            case IMAGE_SIZE_ORIGINAL:
                $result = "img-original";
                break;
            case IMAGE_SIZE_LARGE:
                $result = "img-large";
                break;
            case IMAGE_SIZE_MEDIUM:
                $result = "img-medium";
                break;
            case IMAGE_SIZE_SMALL:
                $result = "img-small";
                break;
            case IMAGE_SIZE_THUMBNAIL:
                $result = "img-thumbnail";
                break;
            case IMAGE_PROFILE_PICTURE:
                $result = "profile-picture";
                break;
            case IMAGE_TEMPORARY_PICTURE:
                $result = "tmp-folder";
                break;
            case IMAGE_PITCH_COVER_PHOTO:
                $result = "cover-photo";
                break;
            case IMAGE_PITCH_PROJECT_COVER_PHOTO:
                $result = "cover-photo";
                break;
            case DOCUMENT:
                $result = "document";
                break;
            default:
                $result = "img-original";
                break;
        }
        return $result;
    }

    public static function getImage_File_Name($img_size_id, $file_name_with_ext)
    {
        $result = "";

        // if filename is given as a full path
        $path_to_file_in_array    = explode("/", $file_name_with_ext);
        $file_name_with_extension = array_pop($path_to_file_in_array);
        // split file name and extension
        $file_name_in_array       = explode(".", $file_name_with_extension);
        if (count($file_name_in_array) == 2) {
            $file_name = $file_name_in_array[0];
            $file_ext = $file_name_in_array[1];
            switch ($img_size_id) {
                case IMAGE_SIZE_ORIGINAL:
                    $result = $file_name . "." . $file_ext;
                    break;
                case IMAGE_SIZE_LARGE:
                    $result = $file_name . "-l." . $file_ext;
                    break;
                case IMAGE_SIZE_MEDIUM:
                    $result = $file_name . "-m." . $file_ext;
                    break;
                case IMAGE_SIZE_SMALL:
                    $result = $file_name . "-s." . $file_ext;
                    break;
                case IMAGE_SIZE_THUMBNAIL:
                    $result = $file_name . "-t." . $file_ext;
                    break;
                case IMAGE_PROFILE_PICTURE:
                    $result = $file_name . "-pp." . $file_ext;
                    break;
                case IMAGE_TEMPORARY_PICTURE:
                    $result = $file_name . "-tmp." . $file_ext;
                    break;
                case IMAGE_PITCH_COVER_PHOTO:
                    $result = $file_name . "-cp." . $file_ext;
                    break;
                case IMAGE_PITCH_PROJECT_COVER_PHOTO:
                    $result = $file_name . "-cp." . $file_ext;
                    break;
                case DOCUMENT:
                    $result = $file_name . "-tmp." . $file_ext;
                    break;
                default:
                    $result = $file_name . "." . $file_ext;
                    break;
            }
        } else {
            echo "Fail core enum getImagefileName: $file_name_with_ext. ";
        }
        return $result;
    }

    public static function getImage_Pixel($img_file_name)
    {
        $result = "";
        switch ($img_file_name) {
            // Get pixel width & height from image file
            // Convert into scale height & weight 
            case IMAGE_SIZE_LARGE_WIDTH:
                $result = "img-large";
                break;
            case IMAGE_SIZE_MEDIUM_WIDTH:
                $result = "img-medium";
                break;
            case IMAGE_SIZE_SMALL_WIDTH:
                $result = "img-small";
                break;
            case IMAGE_SIZE_THUMBNAIL_WIDTH:
                $result = "img-thumbnail";
                break;
            default:
                $result = "img-original";
                break;
        }
        return $result;
    }

    public static function getTargetFileWidth($img_size_id)
    {
        //in Pixels
        $result = null;
        switch ($img_size_id) {
            // Get pixel width & height from image file
            // Convert into scale height & weight 
            case IMAGE_SIZE_LARGE:
                $result = intval(IMAGE_SIZE_LARGE_WIDTH);
                break;
            case IMAGE_SIZE_MEDIUM:
                $result = intval(IMAGE_SIZE_MEDIUM_WIDTH);
                break;
            case IMAGE_SIZE_SMALL:
                $result = intval(IMAGE_SIZE_SMALL_WIDTH);
                break;
            case IMAGE_SIZE_THUMBNAIL:
                $result = intval(IMAGE_SIZE_THUMBNAIL_WIDTH);
                break;
            case IMAGE_PROFILE_PICTURE:
                $result = intval(IMAGE_SIZE_THUMBNAIL_WIDTH);
                break;
            case IMAGE_PITCH_COVER_PHOTO:
                $result = intval(IMAGE_SIZE_SMALL_WIDTH);
                break;
            case IMAGE_PITCH_PROJECT_COVER_PHOTO:
                $result = intval(IMAGE_SIZE_SMALL_WIDTH);
                break;
            default:
                $result = intval(IMAGE_SIZE_LARGE_WIDTH);
                break;
        }
        return $result;
    }

    public static function getTargetFileHeight($img_size_id)
    {
        //in Pixels
        $result = null;
        switch ($img_size_id) {
            // Get pixel width & height from image file
            // Convert into scale height & weight 
            case IMAGE_SIZE_LARGE:
                $result = intval(IMAGE_SIZE_LARGE_HEIGHT);
                break;
            case IMAGE_SIZE_MEDIUM:
                $result = intval(IMAGE_SIZE_MEDIUM_HEIGHT);
                break;
            case IMAGE_SIZE_SMALL:
                $result = intval(IMAGE_SIZE_SMALL_HEIGHT);
                break;
            case IMAGE_SIZE_THUMBNAIL:
                $result = intval(IMAGE_SIZE_THUMBNAIL_HEIGHT);
                break;
            case IMAGE_PROFILE_PICTURE:
                $result = intval(IMAGE_SIZE_THUMBNAIL_HEIGHT);
                break;
            case IMAGE_PITCH_COVER_PHOTO:
                $result = intval(IMAGE_SIZE_SMALL_HEIGHT);
                break;
            case IMAGE_PITCH_PROJECT_COVER_PHOTO:
                $result = intval(IMAGE_SIZE_SMALL_HEIGHT);
                break;
            default:
                $result = intval(IMAGE_SIZE_LARGE_HEIGHT);
                break;
        }
        return $result;
    }

  public static function OBJECT_TYPE_TO_STRING($object_type){
    $string = "";

    switch($object_type){
      case OBJECT_TYPE_PROFILE:
        $string = "profile";
        break;
      case OBJECT_TYPE_PROJECT:
        $string = "project";
        break;
      case OBJECT_TYPE_PHOTO:
        $string = "photo";
        break;
      case OBJECT_TYPE_COMMENT:
        $string = "comment";
        break;
      case OBJECT_TYPE_PHOTO_LIKE:
        $string = "like photo";
        break;
      case OBJECT_TYPE_REVIEW:
        $string = "review";
        break;
      default:
        $string = "oops... confusing object";
        break;
    }
    return $string;
  }

  public static function ACTION_TYPE_TO_STRING($action_type, $object_type){
    $string     = "";
    $string_obj = "";  
    
    $string_obj = self::OBJECT_TYPE_TO_STRING($object_type);
    switch($action_type){
        case ACTION_TYPE_PHOTO_LIKE:
            // Like Photo
            $string = "LIKES PHOTO";
            break;
        case ACTION_TYPE_PHOTO_REMOVE_LIKE:
            // Remove Like Photo
            $string = "UNLIKE PHOTO";
            break;
        case ACTION_TYPE_FOLLOW_PROFILE:
            // Follow
            $string = "STARTED FOLLOWING";
            break;
        case ACTION_TYPE_UNFOLLOW_PROFILE:
            // Unfollow
            $string = "UNFOLLOW";
            break;
        case ACTION_TYPE_NEW_PROFILE:
            // New Profile
            $string = "REGISTERED NEW PROFILE";
            break;
        case ACTION_TYPE_NEW_PROJECT:
            // New Project
            $string = "CREATED NEW PROJECT";
            break;
        case ACTION_TYPE_DELETE_PROJECT:
            // Delete Project
            $string = "DELETED PROJECT";
            break;
        case ACTION_TYPE_NEW_PHOTO_PROJECT:
            // Project Photo
            $string = "UPLOADED NEW PROJECT PHOTO";
            break;
        case ACTION_TYPE_DELETE_PHOTO_PROJECT:
            // Delete Project Photo
            $string = "DELETED PHOTO PROJECT";
            break;
        case ACTION_TYPE_NEW_PHOTO_PROFILE_PICTURE:
            // New Profile Picture
            $string = "UPLOADED NEW PROFILE PICTURE";
            break;
        case ACTION_TYPE_NEW_COVER_PHOTO_PROJECT:
            // New Cover Photo Project
            $string = "SET NEW COVER PROJECT PHOTO";
            break;
        case ACTION_TYPE_NEW_COMMENT:
            // New Cover Photo Project
            $string = "COMMENTED ON A PHOTO";
            break;
        case ACTION_TYPE_DELETE_COMMENT:
            // Delete photo comment
            $string = "DELETED COMMENT ON A PHOTO";
            break;
        case ACTION_TYPE_NEW_MENTION:
            // New Mention
            $string = "NEW MENTION";
            break;
        default:
            // Unknown Action Type
            $string = "UNKNOWN ACTION TYPE";
            break;
        }
    return $string;
  }

    public static function getString_SORT_BY($sort_by)
    {
        $string = "";
        switch ($sort_by) {
            case SORT_BY_RELEVANCE:
                $string = "Relevance";
                break;
            case SORT_BY_MOST_VIEWED:
                $string = "Most Viewed";
                break;
            case SORT_BY_MOST_LIKED:
                $string = "Most Liked";
                break;
            case SORT_BY_MOST_RECENT:
                $string = "Most Recent";
                break;
            case SORT_BY_MOST_POPULAR:
                $string = "Most Popular";
                break;
            case SORT_BY_ALPHABET:
                $string = "Title Alphabet";
                break;
            default:
                $string = "Relevance";
                break;
        }
        return $string;
    }

    public static function getField_Keyword($sort_by) 
    {        
        $string = "";
        switch ($sort_by) {
            case SORT_BY_RELEVANCE:
                $string .= "";
                break;
            case SORT_BY_MOST_VIEWED:
                $string .= "view_counter";
                break;
            case SORT_BY_MOST_LIKED:
                $string .= "like_counter";
                break;
            case SORT_BY_MOST_RECENT:
                $string .= "created_at";
                break;
            case SORT_BY_MOST_POPULAR:
                $string .= "point";
                break;
            case SORT_BY_ALPHABET:
                $string .= "title";
                break;
            default:
                $string .= "";
                break;
        }
        return $string;

    }

    public static function getSQL_Sort_Statement($sort_by) 
    {        
        $fieldName = self::getField_Keyword($sort_by);
        $string = "ORDER BY ";
        switch ($sort_by) {
            case SORT_BY_RELEVANCE:
                $string .= " RANK ASC";
                break;
            case SORT_BY_MOST_VIEWED:
                $string .= $fieldName." DESC";
                break;
            case SORT_BY_MOST_LIKED:
                $string .= $fieldName." DESC";
                break;
            case SORT_BY_MOST_RECENT:
                $string .= $fieldName." DESC";
                break;
            case SORT_BY_MOST_POPULAR:
                $string .= $fieldName." DESC";
                break;
            case SORT_BY_ALPHABET:
                $string .= $fieldName." ASC";
                break;
            default:
                $string .= " RANK ASC";
                break;
        }
        return $string;

    }

    public static function getField_Keyword_New($sort_by) 
    {        
        $string = "";
        switch ($sort_by) {
            case SORT_BY_RELEVANCE:
                $string .= "TOTAL_POINTS";
                break;
            case SORT_BY_MOST_VIEWED:
                $string .= "project_view_counter";
                break;
            case SORT_BY_MOST_LIKED:
                $string .= "project_like_counter";
                break;
            case SORT_BY_MOST_RECENT:
                $string .= "project_created_at";
                break;
            case SORT_BY_MOST_POPULAR:
                $string .= "TOTAL_POINTS";
                break;
            case SORT_BY_ALPHABET:
                $string .= "project_title";
                break;
            default:
                $string .= "TOTAL_POINTS";
                break;
        }
        return $string;

    }

    public static function getSQL_Sort_Statement_New($sort_by) 
    {        
        $fieldName = self::getField_Keyword_New($sort_by);
        $desc_or_asc = "";
        switch ($sort_by) {
            case SORT_BY_ALPHABET:
                $desc_or_asc = "ASC";
                break;
            case SORT_BY_RELEVANCE:
            case SORT_BY_MOST_VIEWED:
            case SORT_BY_MOST_LIKED:
            case SORT_BY_MOST_RECENT:
            case SORT_BY_MOST_POPULAR:
            default:
                $desc_or_asc = "DESC";
                break;
        }
        $result = "ORDER BY $fieldName $desc_or_asc, project_featured DESC, project_id DESC";
        return $result;
    }

    public static function getObjectTypeName($object_type){
        $string = "";
        switch ($object_type) {
            case OBJECT_TYPE_PROFILE:
                $string = "profile";
                break;
            case OBJECT_TYPE_PROJECT:
                $string = "project";
                break;
            case OBJECT_TYPE_COMMENT:                
                $string = "comment";
                break;
            case OBJECT_TYPE_PHOTO:
                $string = "photo";
                break;
            default:
                break;
        }
        return $string;
    }
}