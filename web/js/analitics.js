/**
 * ��������� ��������� FIBO ��� ������������� ��������
 */
function addIframeFiboAnalytics(){
  var fiboInformerDiv = document.getElementById("fiboInformerDiv3");
  var w = 620;
  var ref = "";
  
  for (i = 0; i < fiboInformerDiv.attributes.length; i++){
	if (fiboInformerDiv.attributes[i].nodeName == "path"){
      path = fiboInformerDiv.attributes[i].nodeValue;
	}
  if (fiboInformerDiv.attributes[i].nodeName == "ref"){
      ref = fiboInformerDiv.attributes[i].nodeValue;
	}
	if (fiboInformerDiv.attributes[i].nodeName == "width"){
      w = fiboInformerDiv.attributes[i].nodeValue;
	}
  };
  tmp = path.split("/");
  st1 = document.createElement("link");
  st1.setAttribute("rel", "stylesheet");
  st1.setAttribute("href", tmp[0] + "//" + tmp[2] + "/informers_resources/styles/informers.css");
  fiboInformerDiv.appendChild(st1);

  if (typeof isFiboSite == "undefined"){
    openerr = "?opener=" + decodeURI(window.location);
    if(ref) {
      openerr += "&ref="+ ref;
    }
  } else {
    if(ref) {
      openerr += "?ref="+ ref;
    } else {
      openerr = "";      
    }
  }

  var link = document.getElementById("fiboInformerDiv3").getElementsByTagName("a")[0];
  if (typeof(link) != 'undefined' && link.href.indexOf("fibo") > -1) {
    informerFrame = document.createElement("iframe");
    informerFrame.frameBorder = 0;
    informerFrame.height = 211;
    informerFrame.width = w;
    informerFrame.style.overflow = 'hidden';
    informerFrame.src = path + openerr;

    fiboInformerDiv.insertBefore(informerFrame, fiboInformerDiv.firstChild);
  }
};

if (typeof isFiboSite == "undefined"){
//  window.onload = addIframeFiboAnalytics;
  addIframeFiboAnalytics();
}