// ----------------------------------------------------------------------------
// Copyright 2006-2009, GeoTelematic Solutions, Inc.
// All rights reserved
// ----------------------------------------------------------------------------
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
// 
// http://www.apache.org/licenses/LICENSE-2.0
// 
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
// ----------------------------------------------------------------------------
// Change History:
//  2008/02/21  Martin D. Flynn
//     -Moved from JavaScriptTools.java
//  2008/07/08  Martin D. Flynn
//     -Updated String "trim()"
//  2008/10/16  Martin D. Flynn
//     -Added 'numParseInt'
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
// --- String prototypes

// http://www.nicknettleton.com/zine/javascript/trim-a-string-in-javascript
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g,''); };

// http://www.tek-tips.com/faqs.cfm?fid=6620
String.prototype.startsWith = function(s) { return (this.match("^" + s) == s); };
String.prototype.endsWith   = function(s) { return (this.match(s + "$") == s); };

// ----------------------------------------------------------------------------
// --- Number parsing/formatting

/* encode characters */
function strEncode(s)
{
    return encodeURIComponent(s);   // escape(s);
};

/* encode characters */
function strDecode(s)
{
    return decodeURIComponent(s);   // unescape(s);
};

// ----------------------------------------------------------------------------
// --- Number parsing/formatting

function _trimZeros(val)
{
    if (typeof val == "string") {
        while (val.startsWith(" ")) { val = val.substring(1); }
        while ((val.length > 1) && val.startsWith("0")) { val = val.substring(1); }
    }
    return val;
}

/* parse 'decimal' int value */
function numParseInt(val, dft) 
{
    var num = parseInt(_trimZeros(val));
    if (isNaN(num)) { num = dft; }
    return num;
};

/* parse float value */
function numParseFloat(val, dft) 
{
    var num = parseFloat(_trimZeros(val));
    if (isNaN(num)) { num = dft; }
    return num;
};

/* format floating-point value with specified number of decimal points */
// an unsophisticated numeric formatter
function numFormatFloat(val, dec) 
{
    var num = numParseFloat(val,0);
    if (dec > 0) {
        var neg = (num >= 0)? '' : '-';
        num = Math.abs(num);
        var d;
        for (d = 0; d < dec; d++) { num *= 10; }
        num = parseInt(num + 0.5);
        var str = new String(num);
        while (str.length <= dec) { str = '0' + str; }
        str = str.substring(0, str.length - dec) + '.' + str.substring(str.length - dec);
        return neg + str;
    } else {
        num = parseInt((num >= 0)? (num + 0.5) : (num - 0.5));
        return new String(num);
    }
};

// ----------------------------------------------------------------------------
// --- latitude/logiutude distance calculations

var EARTH_RADIUS_KM     = 6371.0088;
var EARTH_RADIUS_METERS = EARTH_RADIUS_KM * 1000.0;

/* Square */
function geoSQ(val) 
{
    return val * val;
};

/* degrees to radians */
function geoRadians(deg) 
{
    return deg * (Math.PI / 180.0);
};

/* radians to degrees */
function geoDegrees(rad) 
{
    return rad * (180.0 / Math.PI);
};

/* return distance (in radians) between points */
function geoDistanceRadians(lat1, lon1, lat2, lon2) 
{
    var rlat1 = geoRadians(lat1);
    var rlon1 = geoRadians(lon1);
    var rlat2 = geoRadians(lat2);
    var rlon2 = geoRadians(lon2);
    var dtlat = rlat2 - rlat1;
    var dtlon = rlon2 - rlon1;
    var a     = geoSQ(Math.sin(dtlat/2.0)) + (Math.cos(rlat1) * Math.cos(rlat2) * geoSQ(Math.sin(dtlon/2.0)));
    var rad   = 2.0 * Math.atan2(Math.sqrt(a), Math.sqrt(1.0 - a));
    return rad;
};

/* return distance (in meters) between points */
function geoDistanceMeters(lat1, lon1, lat2, lon2) 
{
    return geoDistanceRadians(lat1,lon1,lat2,lon2) * EARTH_RADIUS_METERS;
};

/* return heading (degrees) from first point to second point */
function geoHeading(lat1, lon1, lat2, lon2)
{
    var rlat1 = geoRadians(lat1);
    var rlon1 = geoRadians(lon1);
    var rlat2 = geoRadians(lat2);
    var rlon2 = geoRadians(lon2);
    var rDist = geoDistanceRadians(lat1, lon1, lat2, lon2);
    var rad   = Math.acos((Math.sin(rlat2) - (Math.sin(rlat1) * Math.cos(rDist))) / (Math.sin(rDist) * Math.cos(rlat1)));
    if (Math.sin(rlon2 - rlon1) < 0) { rad = (2.0 * Math.PI) - rad; }
    var deg   = geoDegrees(rad);
    return deg;
};

// ----------------------------------------------------------------------------
// --- cookie utilities

var cookieTag = 'OpenGTS';

/* set cookie */
function setCookie(key, val) 
{
    var d;
    if (val == null) {
        d = (new Date(0)).toGMTString();
        val = '';
    } else {
        var expireMin = 15;
        d = new Date((new Date()).getTime() + (expireMin * 60000));
    }
    document.cookie = cookieTag+ '.' + key + '=' + strEncode(val) + ';; expires=' + d;
};

/* get cookie */
function getCookie(key, dft) 
{
    var c = document.cookie, k = cookieTag+ '.' + key + '=', p = c.indexOf(k);
    if (p >= 0) {
        var pe = c.indexOf(';',p);
        if (pe < 0) { pe = c.length; }
        return strDecode(c.substring(p + k.length, pe));
    } else {
        return dft;
    }
};

// ----------------------------------------------------------------------------
// --- Parse request URL

/* return argument for specified key in request string */
function getQueryArg(argName) 
{
    var mainURL = window.location.search;
    var argStr = mainURL.split('?');
    if (argStr.length > 1) {
        var args = argStr[1].split('&');
        for (i in args) {
            var keyVal = args[i].split('=');
            if (argName == keyVal[0]) {
                //document.write('Found Key: ' + keyVal[0] + ' == ' + keyVal[1] + '<br>');
                return keyVal[1];
            }
        }
    }
    return null;
};

// ----------------------------------------------------------------------------
// --- Element location/size

/* return relative position of specified element */
function getElementPosition(elem) 
{
    var ofsLeft = 0;
    var ofsTop  = 0;
    var ofsElem = elem;
    while (ofsElem) {
        ofsLeft += ofsElem.offsetLeft; // - ofsElem.scrollLeft;
        ofsTop  += ofsElem.offsetTop;  // - ofsElem.scrollTop;
        ofsElem  = ofsElem.offsetParent;
    }
    if ((navigator.userAgent.indexOf('Mac') >= 0) && (typeof document.body.leftMargin != 'undefined')) {
        ofsLeft += document.body.leftMargin;
        ofsTop  += document.body.topMargin;
    }
    return { left:ofsLeft, top:ofsTop };
};

/* return size of specified element */
function getElementSize(elem) 
{
    return { width:elem.offsetWidth, height:elem.offsetHeight };
};

// ----------------------------------------------------------------------------
// --- Create new window

/* open a resizable window and display specified URL */
function openResizableWindow(url, name, W, H) 
{
    //  "resizable=[yes|no]"
    //  "width='#',height='#'"
    //  "screenX='#',screenY='#',left='#',top='#'"
    //  "status=[yes|no]"
    //  "scrollbars=[yes|no]"
    var attr = 'resizable=yes,width=' + W + ',height=' + H;
    var L = ((screen.width - W) / 2), T = ((screen.height - H) / 2);
    attr += ',screenX=' + L + ',screenY=' + T + ',left=' + L + ',top='+T;
    var win = window.open(url, name, attr, false);
    if (win) {
        //if (!(typeof win.moveTo == "undefined")) { win.moveTo(L,T); }
        if (!(typeof win.focus  == "undefined")) { win.focus(); }
        return win;
    } else {
        return null;
    }
};

// ----------------------------------------------------------------------------

function openURL(url, target)
{
    // parent.main.location = url;
    // window.location.href = url;
    // document.location.href = url;
    if (!target) { target = "_top"; }
    window.open(url, target);
}

// ----------------------------------------------------------------------------
// --- HexColor value

/* return 6-digit hex value for specified RGB color */
function rgbHex(R,G,B)
{
    // "D.toString(16)" fails to produce a proper hex value if D is negative!!!!
    var D = 0x1F000000 | ((R & 0xFF) << 16) | ((G & 0xFF) << 8) | (B & 0xFF);
    var C = D.toString(16).toUpperCase();
    //alert("RGB " + R + "/" + G + "/" + B + " => " + C);
    return C.substr(2,6); // makes sure it has a leading '0' if necessary
}

// ----------------------------------------------------------------------------
// --- Div frame

/* create 'div' frame/box */
// var myElem = document.getElementById(someID);
// var absLoc = getElementPosition(myElem);
// var absSiz = getElementSize(myElem);
// var divObj = createDivBox('myid', absLoc.left, absLoc.top + absSiz.height, absSiz.width, H);
function createDivBox(idName, X, Y, W, H) 
{
    var isSafari           = /Safari/.test(navigator.userAgent);
    var divObj             = document.createElement('div');
    divObj.id              = idName;
    divObj.name            = idName;
    divObj.className       = idName;
    divObj.style.left      = X + 'px';
    divObj.style.top       = Y + 'px'; // (Y - (isSafari? 6 : 0)) + 'px';
    if (W > 0) {
        divObj.style.width  = W + 'px';
    }
    if (H > 0) {
        divObj.style.height = H + 'px';
    }
    divObj.style.position  = 'absolute';
    divObj.style.cursor    = 'default';
    divObj.style.zIndex    = 30000;
    return divObj;
    // divObj.innerHTML = "<html...>";
    // document.body.appendChild(divObj);
    // document.body.removeChild(divObj);

}

// ----------------------------------------------------------------------------

/* convert key code to String */
function getKeyString(key)
{
    var code = document.layers? key.which : event.keyCode;
    return String.fromCharCode(code);
}

/* return true if this event represents an 'Enter' key (carriage return) */
function isEnterKeyPressed(event)
{
    var code = event.keyCode || event.which;
    return (code == 13);
}

/* return true if this event represents an Digit key (0..9) */
function isDigitKeyPressed(event)
{
    var code = event.keyCode || event.which;
    return ((code >= 0x30) && (code <= 0x39));
}

// ---
