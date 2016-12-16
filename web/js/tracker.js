var Tracker = (function() {
  //define remote host
  var scriptInc = document.getElementById('fibo_tracker');
  var src       = scriptInc.src;
  var host      = src.substring(0, src.lastIndexOf('/') + 1);
  
  //tracker properties
  var params = {
    uidName    : 'trackerUserUID',
    uidExpire  : 365,
    statUrl    : host +'index.php'
  };
  
  //run tracker
  function run(p) {

    params = Tools.mergeObjects(params, p);

    var options = {
      r   : getReferer(),
      l   : getLocation(),
      u   : Tracker.getUID(),
      rnd : Math.random()
    };

    Tools.load(Tools.buildUrl(params.statUrl, options));
  }

  function getReferer() {
    return Tools.getParameterByName('site_ref') || document.referrer;
  }

  function getLocation() {
    return document.location;
  }

  return {
    run : function() {
      var p = arguments.length ? arguments[0] : {};
      run(p);
    } ,
    setUID : function(uid) {
      return Tools.setCookie(params.uidName, uid, params.uidExpire)
    } ,
    getUID : function () {
      return Tools.getCookie(params.uidName);
    }
  }
})();

var Tools = {
  getCookie : function(name) {
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
      offset = cookie.indexOf(search);
      if (offset != -1) {
        offset += search.length;
        end = cookie.indexOf(";", offset)
        if (end == -1) {
          end = cookie.length;
        }
        setStr = unescape(cookie.substring(offset, end));
      }
    }
    return(setStr);
  },

  setCookie : function(name, value, expires, path, domain, secure) {
    expires instanceof Date ? expires = expires.toGMTString() : typeof(expires) == 'number' && (expires = (new Date(+(new Date) + expires * 86400 * 1e3)).toGMTString());
    var r = [name + "=" + escape(value)], s, i;
    for(i in s = {
      expires: expires, 
      path: path, 
      domain: domain
    }){
      s[i] && r.push(i + "=" + s[i]);
    }
    return secure && r.push("secure"), document.cookie = r.join(";"), true;
  },

  buildUrl : function (url, parameters){
    var qs = "";
    for(var key in parameters) {
      var value = parameters[key];
      qs += encodeURIComponent(key) + "=" + encodeURIComponent(value) + "&";
    }
    if (qs.length > 0){
      qs = qs.substring(0, qs.length-1);
      url = url + "?" + qs;
    }
    return url;
  },
  getParameterByName : function (name) {
    var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
  },
  mergeObjects : function (obj1, obj2) {
    for (var p in obj2) {
      try {
        if ( obj2[p].constructor==Object ) {
          obj1[p] = MergeRecursive(obj1[p], obj2[p]);
        } else {
          obj1[p] = obj2[p];
        }
      } catch(e) {
        obj1[p] = obj2[p];
      }
    }
    return obj1;
  },

  load : function(src) {
    var head= document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = src;
    head.appendChild(script);
  }
}

Tracker.run();