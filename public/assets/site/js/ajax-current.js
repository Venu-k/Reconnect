
   var http_request = false;
   var result = '';
   
   function makePOSTRequest(url, parameters) {
      http_request = false;
      if (window.XMLHttpRequest) { // Mozilla, Safari,...
         http_request = new XMLHttpRequest();
         if (http_request.overrideMimeType) {
         	// set type accordingly to anticipated content type
            //http_request.overrideMimeType('text/xml');
            http_request.overrideMimeType('text/html');
         }
      } else if (window.ActiveXObject) { // IE
         try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
            try {
               http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
         }
      }
      if (!http_request) {
         alert('Cannot create XMLHTTP instance');
         return false;
      }
      
      http_request.onreadystatechange = alertContents;
      http_request.open('POST', url, true);
      http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      http_request.setRequestHeader("Content-length", parameters.length);
      http_request.setRequestHeader("Connection", "close");
      http_request.send(parameters);
   }

   function alertContents() {
      if (http_request.readyState == 4) {
         if (http_request.status == 200) {
            result = http_request.responseText;
         } else {
            alert('There was a problem with the request.');
         }
      }
   }
   
   function parseXMLExample(xmlstring)
   {
        // convert the string to an XML object
        var xmlobject = (new DOMParser()).parseFromString(xmlstring, "text/xml");
        // get the XML root item
        var root = xmlobject.getElementsByTagName('shoppingcart')[0];
        var date = root.getAttribute("date");
        alert("shoppingcart date=" + date);

        var items = root.getElementsByTagName("item");
        for (var i = 0 ; i < items.length ; i++) {
	        // get one item after another
	        var item = items[i];
	        // now we have the item object, time to get the contents
	        // get the name of the item
	        var name = item.getElementsByTagName("name")[0].firstChild.nodeValue;
	        // get the quantity
	        var quantity = item.getElementsByTagName("quantity")[0].firstChild.nodeValue;
	        alert("item #" + i + ": name=" + name + " quantity=" + quantity);
        }   
   }
   