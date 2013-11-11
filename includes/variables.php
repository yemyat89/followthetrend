<?
# Common constants
$BASE_DIR = "talktweet/";
$DOMAIN = "http://localhost/";
$IMAGE_DIR = "/".$BASE_DIR."images/";
$USER_PHOTO_UPLOAD = $_SERVER["DOCUMENT_ROOT"]."/".$BASE_DIR."user_photo/";
$USER_PHOTO_DB = "/".$BASE_DIR."user_photo/";

# Styles
$STYLE = "/".$BASE_DIR."style/style.css";
$STYLE_FACEBOX = "/".$BASE_DIR."scripts/facebox/facebox.css";

# /talktweet/includes/
$COMMON = "/".$BASE_DIR."includes/"."common.php";
$SQLCONNECT = "/".$BASE_DIR."includes/"."sqlconnect.php";
$SEARCH = "/".$BASE_DIR."includes/"."search.php";
$TWITTER = "/".$BASE_DIR."includes/"."twitter.php";

# /talktweet/
$FEEDBACK = "/".$BASE_DIR."feedback.php";
$FORGET_PASSWORD = "/".$BASE_DIR."forget_password.php";
$HOWTO = "/".$BASE_DIR."howto.php";
$INDEX = "/".$BASE_DIR."index.php";
$INFO = "/".$BASE_DIR."info.php";
$LOGIN = "/".$BASE_DIR."login.php";
$NOTIFICATIONS = "/".$BASE_DIR."notifications.php";
$PEOPLE = "/".$BASE_DIR."people.php";
$PROFILE = "/".$BASE_DIR."profile.php";
$SEARCH_TREND = "/".$BASE_DIR."search_trend.php";
$SETTINGS = "/".$BASE_DIR."settings.php";
$SIGNUP = "/".$BASE_DIR."signup.php";
$TEMP_REG = "/".$BASE_DIR."temp_reg.php";
$TERMS = "/".$BASE_DIR."terms.php";
$TREND = "/".$BASE_DIR."trend.php";

# /talktweet/components/actions/
$CREATE = "/".$BASE_DIR."components/actions/"."create.php";
$FEED = "/".$BASE_DIR."components/actions/"."feed.php";
$LEAVE = "/".$BASE_DIR."components/actions/"."leave.php";
$LOGIN_PROCESS = "/".$BASE_DIR."components/actions/"."login_process.php";
$LOGOUT = "/".$BASE_DIR."components/actions/"."logout.php";
$PICTURE_CHANGE = "/".$BASE_DIR."components/actions/"."picture_change.php";
$RESET = "/".$BASE_DIR."components/actions/"."reset.php";
$VALIDATE = "/".$BASE_DIR."components/actions/"."validate.php";

# /talktweet/components/common/
$DISPLAY_ALL = "/".$BASE_DIR."components/common/"."display_all.php";
$FOOTER = "/".$BASE_DIR."components/common/"."footer.php";
$FOOTER_TREND = "/".$BASE_DIR."components/common/"."footer_trend.php";
$LOWER = "/".$BASE_DIR."components/common/"."lower.php";
$MENU = "/".$BASE_DIR."components/common/"."menu.php";
$RIGHT_SIDE = "/".$BASE_DIR."components/common/"."right_side.php";

# /talktweet/scripts/
$COMMON_JS = "/".$BASE_DIR."scripts/"."common.js";
$INDEX_SCRIPT = "/".$BASE_DIR."scripts/"."index_script.js";
$SEARCH_TREND_SCRIPT = "/".$BASE_DIR."scripts/"."search_trend_script.js";
$FEEDBACK_SCRIPT = "/".$BASE_DIR."scripts/"."feedback_script.js";
$FOOTER_SCRIPT = "/".$BASE_DIR."scripts/"."footer_script.js";
$HOWTO_SCRIPT = "/".$BASE_DIR."scripts/"."howto_script.js";
$MENU_SCRIPT = "/".$BASE_DIR."scripts/"."menu_script.js";
$PPL_SCRIPT = "/".$BASE_DIR."scripts/"."ppl_script.js";
$RESET_SCRIPT = "/".$BASE_DIR."scripts/"."reser_script.js";
$RIGHT_SIDE_SCRIPT = "/".$BASE_DIR."scripts/"."right_side_script.js";
$SETTINGS_SCRIPT = "/".$BASE_DIR."scripts/"."settings_script.js";
$SIGNUP_SCRIPT = "/".$BASE_DIR."scripts/"."signup_scripts.js";
$TREND_SCRIPT = "/".$BASE_DIR."scripts/"."trend_script.js";
$JQUERY = "/".$BASE_DIR."scripts/"."jquery.js";
$FACEBOX = "/".$BASE_DIR."scripts/facebox/"."facebox.js";
$UI_CORE = "/".$BASE_DIR."scripts/"."ui.core.js";
$UI_DRAGGABLE = "/".$BASE_DIR."scripts/"."ui.draggable.js";

# /talktweet/modules/
$INSIDE_FORGET_PASSWORD_1 = "/".$BASE_DIR."modules/"."inside_forget_password_1.php";
$INSIDE_FORGET_PASSWORD_2 = "/".$BASE_DIR."modules/"."inside_forget_password_2.php";
$INSIDE_FORGET_PASSWORD_3 = "/".$BASE_DIR."modules/"."inside_forget_password_3.php";

$INSIDE_FEEDBACK_1 = "/".$BASE_DIR."modules/"."inside_feedback_1.php";
$INSIDE_FEEDBACK_2 = "/".$BASE_DIR."modules/"."inside_feedback_2.php";

$INSIDE_HOWTO_1 = "/".$BASE_DIR."modules/"."inside_howto_1.php";

$INSIDE_INDEX_1 = "/".$BASE_DIR."modules/"."inside_index_1.php";
$INSIDE_INDEX_2 = "/".$BASE_DIR."modules/"."inside_index_2.php";
$INSIDE_INDEX_3 = "/".$BASE_DIR."modules/"."inside_index_3.php";

$INSIDE_INFO_1 = "/".$BASE_DIR."modules/"."inside_info_1.php";
$INSIDE_INFO_2 = "/".$BASE_DIR."modules/"."inside_info_2.php";

$INSIDE_LOGIN_1 = "/".$BASE_DIR."modules/"."inside_login_1.php";

$INSIDE_TREND_1 = "/".$BASE_DIR."modules/"."inside_trend_1.php";

$INSIDE_NOTIFICATIONS_1 = "/".$BASE_DIR."modules/"."inside_notifications_1.php";
$INSIDE_NOTIFICATIONS_2 = "/".$BASE_DIR."modules/"."inside_notifications_2.php";
$INSIDE_NOTIFICATIONS_3 = "/".$BASE_DIR."modules/"."inside_notifications_3.php";

$INSIDE_PEOPLE_1 = "/".$BASE_DIR."modules/"."inside_people_1.php";
$INSIDE_PEOPLE_2 = "/".$BASE_DIR."modules/"."inside_people_2.php";
$INSIDE_PEOPLE_3 = "/".$BASE_DIR."modules/"."inside_people_3.php";
$INSIDE_PEOPLE_4 = "/".$BASE_DIR."modules/"."inside_people_4.php";
$INSIDE_PEOPLE_5 = "/".$BASE_DIR."modules/"."inside_people_5.php";

$INSIDE_PROFILE_1 = "/".$BASE_DIR."modules/"."inside_profile_1.php";
$INSIDE_PROFILE_2 = "/".$BASE_DIR."modules/"."inside_profile_2.php";

$INSIDE_SEARCH_TREND_1 = "/".$BASE_DIR."modules/"."inside_search_trend_1.php";
$INSIDE_SEARCH_TREND_2 = "/".$BASE_DIR."modules/"."inside_search_trend_2.php";

$INSIDE_SETTINGS_1 = "/".$BASE_DIR."modules/"."inside_settings_1.php";
$INSIDE_SETTINGS_2 = "/".$BASE_DIR."modules/"."inside_settings_2.php";

$INSIDE_SIGNUP_1 = "/".$BASE_DIR."modules/"."inside_signup_1.php";

$INSIDE_TEMP_REG_1 = "/".$BASE_DIR."modules/"."inside_temp_reg_1.php";
$INSIDE_TEMP_REG_2 = "/".$BASE_DIR."modules/"."inside_temp_reg_2.php";

$INSIDE_TERMS_1 = "/".$BASE_DIR."modules/"."inside_terms_1.php";
$INSIDE_TERMS_2 = "/".$BASE_DIR."modules/"."inside_terms_2.php";

# /talktweet/components/common/modules/
$INSIDE_FOOTER_1 = "/".$BASE_DIR."components/common/modules/"."inside_footer_1.php";
$INSIDE_FOOTER_2 = "/".$BASE_DIR."components/common/modules/"."inside_footer_2.php";

# /talktweet/components/actions/modules/
$INSIDE_CREATE_1 = "/".$BASE_DIR."components/actions/modules/"."inside_create_1.php";
$INSIDE_CREATE_2 = "/".$BASE_DIR."components/actions/modules/"."inside_create_2.php";

$INSIDE_RESET_1 = "/".$BASE_DIR."components/actions/modules/"."inside_reset_1.php";

?>