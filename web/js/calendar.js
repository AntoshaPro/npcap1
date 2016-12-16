/**
 * ��������� ��������� FIBO ��� ���������
 */
function addIframeFiboCalendar(){
  var fiboInformerDiv = document.getElementById("fiboInformerDiv2");
  var w = 620;
  for (i = 0; i < fiboInformerDiv.attributes.length; i++){
  	if (fiboInformerDiv.attributes[i].nodeName == "path"){
        path = fiboInformerDiv.attributes[i].nodeValue;
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
    fixWatch = "&fix_watch=1";
  } else {
	fixWatch = "";
  }

  var link = document.getElementById("fiboInformerDiv2").getElementsByTagName("a")[0];
  if (typeof(link) != 'undefined' && link.href.indexOf("fibo") > -1) {
    informerFrame = document.createElement("iframe");
    informerFrame.frameBorder = 0;
    informerFrame.height = FiboFrameHeight || 368;
      //informerFrame.height = 400;
    informerFrame.width = w;
    informerFrame.src = path + "?opener=" + decodeURI(window.location) + fixWatch;

    fiboInformerDiv.insertBefore(informerFrame, fiboInformerDiv.firstChild);
  }
};

if (typeof isFiboSite == "undefined"){
//  window.onload = addIframeFiboCalendar;
  addIframeFiboCalendar();
}
