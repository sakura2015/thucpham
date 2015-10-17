/*==============================================================================

    Routines written by John Gardner - 2003 - 2005
    Edited by Dzung.tt - 2013

================================================================================

Routine to write a session cookie

    Parameters:
        cookieName        Cookie name
        cookieValue       Cookie Value
    
    Return value:
        true              Session cookie written successfullly
        false             Failed - persistent cookies are not enabled

   e.g. if (writeCookie("pans","drizzle") then
           alert ("Session cookie written");
        else
           alert ("Sorry - Session cookies not enabled");
*/

function writeCookie (cookieName, cookieValue) {
  if (testSessionCookie()) {
    document.cookie = escape(cookieName) + "=" + escape(cookieValue) + "; path=/";
    return true;
  }
  else return false;
}

/*==============================================================================

Routine to get the current value of a cookie

    Parameters:
        cookieName        Cookie name
    
    Return value:
        false             Failed - no such cookie
        value             Value of the retrieved cookie

   e.g. if (!getCookie("pans") then  {
           cookieValue = getCoookieValue ("pans2);
        }
*/

function getCookie (cookieName) {
  var exp = new RegExp (escape(cookieName) + "=([^;]+)");
  if (exp.test (document.cookie + ";")) {
    exp.exec (document.cookie + ";");
    return unescape(RegExp.$1);
  }
  else return false;
}

/*==============================================================================

Routine to write a persistent cookie

    Parameters:
        CookieName        Cookie name
        CookieValue       Cookie Value
        periodType        "years","months","days","hours", "minutes"
        offset            Number of units specified in periodType
    
    Return value:
        true              Persistent cookie written successfullly
        false             Failed - persistent cookies are not enabled
    
    e.g. writePersistentCookie ("Session", id, "years", 1);
*/       

function writePersistentCookie (CookieName, CookieValue, periodType, offset) {

  var expire_str = '';
  var expireDate = new Date ();
  offset = offset / 1;
  
  var myPeriodType = periodType;
  switch (myPeriodType.toLowerCase()) {
    case "years": 
     var year = expireDate.getYear();     
     // Note some browsers give only the years since 1900, and some since 0.
     if (year < 1000) year = year + 1900;     
     expireDate.setYear(year + offset);
     break;
    case "months":
      expireDate.setMonth(expireDate.getMonth() + offset);
      break;
    case "days":
      expireDate.setDate(expireDate.getDate() + offset);
      break;
    case "hours":
      expireDate.setHours(expireDate.getHours() + offset);
      break;
    case "minutes":
      expireDate.setMinutes(expireDate.getMinutes() + offset);
      break;
    case "session":
      expire_str = "Session";
      break;
    default:
      alert ("Invalid periodType parameter for writePersistentCookie()");
      break;
  } 
  
  if(myPeriodType.toLowerCase() != 'session') {
      expire_str = expireDate.toGMTString();
  }
  
  document.cookie = escape(CookieName ) + "=" + escape(CookieValue) + "; expires=" + expire_str + "; path=/";
}  

/*==============================================================================

Routine to delete a persistent cookie

    Parameters:
        CookieName        Cookie name
    
    Return value:
        true              Persistent cookie marked for deletion
    
    e.g. deleteCookie ("Session");
*/    

function deleteCookie (cookieName) {
  if (getCookie (cookieName)) writePersistentCookie (cookieName,"Pending delete","years", -1);  
  return true;     
}

