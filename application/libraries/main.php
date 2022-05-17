<?php  
// Google API configuration 
define('GOOGLE_CLIENT_ID', '811700569243-35e84idhjpkbn14iifk4suelpolonukt.apps.googleusercontent.com'); 
define('GOOGLE_CLIENT_SECRET', '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'); 
define('GOOGLE_OAUTH_SCOPE', 'https://www.googleapis.com/auth/drive'); 
define('REDIRECT_URI', 'http://localhost/trackitCodeigniterNew'); 
 
// Start session 
if(!session_id()) session_start(); 
 
// Google OAuth URL 
$googleOauthURL = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode(GOOGLE_OAUTH_SCOPE) . '&redirect_uri=' . REDIRECT_URI . '&response_type=code&client_id=' . GOOGLE_CLIENT_ID . '&access_type=online'; 
 
?>