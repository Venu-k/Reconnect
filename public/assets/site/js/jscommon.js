// JScript File
// CommonJSUtils.js
// Common Utilities organized in the following sections:
// 1. String manipulation 
// 2. HTML Element manipulation 
// 3. HTML page manipulation 
// 4. Formating Numbers 
// 5. Internationalization
// 6. Dropdown retaled 
// 7. Checkbox retaled 
// 8. Common objects (hashtable, connection, calendar)

var numGrpSep = '';  //Number Group Separator
var newwindow = '';
var newwindow1 = '';


// start: String manipulation functions

//prepare string to be passed on a URL
function escapeText(txt)
{
    txt = escape(txt);
    txt = txt.replace(/\//g,"%2F");
    txt = txt.replace(/\?/g,"%3F");
    txt = txt.replace(/=/g,"%3D");
    txt = txt.replace(/&/g,"%26");
    txt = txt.replace(/@/g,"%40");
    return txt;
}
//RamKC replace escape charecters ?!=#%:;\"/<> with empty string
function escapeSplChar(txt)
{
    txt = txt.replace(/\?/g,"");
    txt = txt.replace(/\!/g,"");
    txt = txt.replace(/\=/g,"");
    txt = txt.replace(/\#/g,"");
    txt = txt.replace(/\%/g,"");
    txt = txt.replace(/\:/g,"");
    txt = txt.replace(/\;/g,"");
    txt = txt.replace(/\\/g,"");
    txt = txt.replace(/\//g,""); // this looks like a comment in Studio but it is not
    txt = txt.replace(/\</g,"");
    txt = txt.replace(/\>/g,"");
    txt = txt.replace(/\"/g,'');
    return txt;
}

function ReplaceCommaWithEmptyString(txt){
	txt.value = txt.value.replace(/\,/g,'');
}

function Left(str, n){
	if (n <= 0)
	    return "";
	else if (n > String(str).length)
	    return str;
	else
	    return String(str).substring(0,n);
}

function parseName(id){
	
	return id.substring(0,id.lastIndexOf("_")); 
	
}

function parseId(id){
	
	return id.substring(id.lastIndexOf("_")); 
	
}

function getElementsByNameMatch(node,searchNameMatch,tag) {
	var classElements = new Array();
	var els = node.getElementsByTagName(tag); // use "*" for all elements
	var elsLen = els.length;
	var pattern = new RegExp("\\b"+searchNameMatch+"\\b");
	
	for (i = 0, j = 0; i < elsLen; i++) {
				
		if ( pattern.test(els[i].id) ) {
	
			classElements[j] = els[i];
			j++;
		}
	}
	return classElements;
}

// Pradeep - to find elements by class name and tag name  
// e.g. getElementsByClassName(document, 'span', 'validationRequiredErrorMessage') 
function getElementsByClassMatch(oElm, strTagName, strClassName)
    {
        var arrElements = (strTagName == "*" && document.all)? document.all : oElm.getElementsByTagName(strTagName);
	    var classElements = new Array();
	    strClassName = strClassName.replace(/\-/g, "\\-");
	    var oRegExp = new RegExp("(^|\\s)" + strClassName + "(\\s|$)");
	    for (i = 0, j = 0; i < arrElements.length; i++) {
		   if(oRegExp.test(arrElements[i].className)){
			    classElements[j] = arrElements[i];
			    j++;
		}
	}
	return classElements;
	}
	
//RamKC to parse a xml response string into xml object with browser compatibility.
function ParseStringToXmlDomObject(xmlString)
{
   //remove space between xml nodes
   //firefox doesn't allow spaces between nodes, it treates a space as a separate node 
   var xmlString = xmlString.replace(/>\s+</g, '><');
   
   if(xmlString.length < 0)
        return "";
   else
   {  
      try //Internet Explorer
      {
        xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
        xmlDoc.async="false";
        xmlDoc.loadXML(xmlString);         
      }
      catch(e)
      {
        try //Firefox, Mozilla, Opera, Chrome etc.
        {        
            parser=new DOMParser();
            xmlDoc=parser.parseFromString(xmlString,"text/xml");            
        }
        catch(e){alert("XMLHTTP not available. Please try installing a newer browser.");return "";}
      }      
  }  
 
  if(xmlDoc.hasChildNodes())
    return xmlDoc;
  else
    return "";
}

//RamKC Modified
//returns the node value of nodeName
function RetrieveNodeValue(xmlText, nodeName)
{
    if(xmlText.indexOf('<'+nodeName+'>') > 0)//if the node name exists in the xmlText and not null(not like '<url/>')
    {
        var xmlDoc = ParseStringToXmlDomObject(xmlText);        
        if(xmlDoc.documentElement.hasChildNodes())    
        {
            var node = xmlDoc.getElementsByTagName(nodeName)[0];                
            var nodeVal = node.childNodes[0].nodeValue;            
            return nodeVal;
        }
        else        
            return "";
    }
    else
        return "";
}

//RamKC for future requirement
//compares valueToCompare with nodeName  value, returns true(1). (for future requirement)
function CompareNodeValue(xmlText, nodeName, valueToCompare)
{
    if(xmlText.indexOf('<'+nodeName+'>') > 0)//if the node name exists in the xmlText and not null(not like '<url/>')
    {
        var xmlDoc = ParseStringToXmlDomObject(xmlText);        
        if(xmlDoc.documentElement.hasChildNodes())
        {        
            var node = xmlDoc.getElementsByTagName(nodeName)[0];
            var nodeVal = node.childNodes[0].nodeValue;
            
            if(nodeVal == valueToCompare)
                return 1;
            else
                return "";            
        }
        else
            return "";
    }
    else        
        return "";
}
   
//RamKC for future requirement
//Returns no of rows of datatable sent as xml response. (for future requirement)
function RetrieveNodeCount(xmlText)
{
    var xmlDoc = ParseStringToXmlDomObject(xmlText);    
    
    if(xmlDoc.documentElement.hasChildNodes())    
    {           
        var rowsLength = xmlDoc.documentElement.childNodes.length;        
        if(rowsLength > 0)
            return rowsLength;
        else
            return "";    
    }
    else    
        return "";    
}

//RamKC to parse xmlstring to xmlObject
//errormessage support tickets will be replaced by xml node values
function BuildErrorMessageFromXMLText(xmlText, warningMessage)
{    
    var xmlDoc = ParseStringToXmlDomObject(xmlText);
    
    if(xmlDoc.documentElement.hasChildNodes())    
    {           
        var colLength = xmlDoc.documentElement.childNodes[0].childNodes.length; //colLength is the first row columns lengh
        var firstRow = xmlDoc.documentElement.childNodes[0]; //firstRow is the first row with all columns
        var count=0;        
        
        for(var i = 0; i < colLength; i++)
        {
            var xmlNodeName = firstRow.childNodes[i].nodeName; //firstrow firstcolumn name
            var xmlNodeValue = firstRow.childNodes[i].childNodes[0].nodeValue; //firstrow firstcolumn Value            
            var startIndex = warningMessage.indexOf('['+xmlNodeName+']');
                        
            if(startIndex >= 0)
            {
                warningMessage = warningMessage.replace('['+xmlNodeName+']', xmlNodeValue);
                count++;
            }
        }    
    }
    else
    {
        return "";
    }
    
    if(count > 0)
        return warningMessage;
    else
        return ""; //if no parameters replaced in warning message.
}


// function to replace all instances of a string 
function ReplaceAll(stringVal, stringToFind, stringToReplace)
{
    var indexOfStringToFind = 0;
    var retVal = stringVal;
    while (indexOfStringToFind != -1){
        retVal = retVal.replace(stringToFind, stringToReplace);
        indexOfStringToFind = retVal.indexOf( stringToFind );
    }	    
    return retVal;
}


String.prototype.trim = function() {
	var str = this.replace(/^\s+/, '');
	for (var i = str.length - 1; i >= 0; i--) {
		if (/\S/.test(str.charAt(i))) {
			str = str.substring(0, i + 1);
			break;
		}
	}
	return str;
};

//Trim function pass chars to remove from string starting and ending
String.prototype.trim = function(chars) {	
	chars = chars || "\\s";
	//do left trim.
	var string = this.replace(new RegExp("^[" + chars + "]+", "g"), "");
	//do right trim.
	return string.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

// end: String manipulation functions

// start: HTML Element manipulation functions

function ValidateForHTML(txtbox){
    
    if (txtbox.value.indexOf('<',0) >= 0)
        txtbox.value = txtbox.value.replace(/\</g,'');
    
    if (txtbox.value.indexOf('&#',0) >= 0)
        txtbox.value = txtbox.value.replace(/\&\#/g,'');
    
}

//set the text within a div
function SetDivText(divID, lblText)
{
    if(document.layers)	   //NN4+
    {
       document.layers[divID].innerHTML = lblText;
    }
    else if(document.getElementById)	  //gecko(NN6) + IE 5+
    {
        var obj = document.getElementById(divID);
        obj.innerHTML = lblText;
        
    }
    else if(document.all)	// IE 4
    {
        document.all[divID].innerHTML = lblText;
    }
}
  
// cancels inline edit div
function CancelUpdate(evt,cancel)
{

   var currentCell;
   
   // get the table element
   if(oldElementValue != '')
   {
    if(cancel)
        currentCell = evt.parentNode.parentNode.parentNode.parentNode.parentNode;
    else
        currentCell = evt.parentNode.parentNode.parentNode;
   
    // read old values and split from global variable
    var values = oldElementValue.split('^');
   
    // set the cellindex
    var cellIndex = values[0];
   
    // set the row index
    var rowIndex = values[1];
   
    // replaces old value
    currentCell.rows[rowIndex].cells[cellIndex].innerHTML = values[2];
    
    // removes if any old cell value exists
    oldElementValue = ''
       
     }
}
    

// toggle div
function ToggleDisplay(id)
{
    // Toggle should work but its broken in 1.3.2 jquery - http://dev.jquery.com/ticket/4512
    //$('#' + id  ).toggle();
    if($('#' + id)[0].style.display == 'none')
         $('#' + id).show();
    else
         $('#' + id).hide();                       
}

function calculateDifference(previous, latest, diff){
	
	if ((document.getElementById(previous)) && (document.getElementById(latest)))
		if ((document.getElementById(latest).value != '') && (document.getElementById(previous).value != ''))
			document.getElementById(diff).value = parseFloat(document.getElementById(latest).value) - parseFloat(document.getElementById(previous).value);
}

// end: HTML Element manipulation functions



// start: HTML page manipulation functions
function addLoadFunction(func)
{    
    var oldonload = window.onload;
    if (typeof window.onload != 'function'){
        window.onload = func;
    } else {
        window.onload = function(){
        oldonload();
        func();
        }
    }
}

function RefreshPage()
{
    window.location.href = window.location.href;
}

function CloseAndRefreshParent()
{
    opener.location.href = opener.location.href;
    self.close();
}

function OpenModal(URL,height,width)
{
	if (height == null)
		height = 700;
		
	if (width == null)
	    width = 750;
		
	if (!newwindow.closed && newwindow.location)
	{
		alert('You can only have one pop-up form open at a time. Please finish using the form you already have open before opening a new one. ');
		//newwindow.location.href = URL;
	}
	else
	{
		newwindow=window.open(URL,'name','resizable=yes,scrollbars=yes,height=' + height + ',width=' + width);
		if (!newwindow.opener) newwindow.opener = self;
	}
	if (window.focus) 
		newwindow.focus();
		
}

function OpenSecondModal(URL,height,width)
{
	if (height == null)
		height = 600;
		
	if (width == null)
	    width = 750;
		
	if (!newwindow1.closed && newwindow1.location)
	{
		alert('You can only have one pop-up form open at a time. Please finish using the form you already have open before opening a new one. ');
		//newwindow.location.href = URL;
	}
	else
	{
		newwindow1=window.open(URL,'name1','resizable=yes,scrollbars=yes,height=' + height + ',width=' + width);
		if (!newwindow1.opener) newwindow1.opener = self;
	}
	if (window.focus) 
		newwindow1.focus();
		
}

function OpenSecondModalChrome(URL,height,width,top,left)
{
	if (height == null)
		height = 600;
		
	if (width == null)
	    width = 750;
	    
	if (top == null)
	    top = 50 ;
	
	if (left == null)
	    left = 100;
	    
		
	if (!newwindow1.closed && newwindow1.location)
	{
		alert('You can only have one pop-up form open at a time. Please finish using the form you already have open before opening a new one. ');
		//newwindow.location.href = URL;
	}
	else
	{
		newwindow1=window.open(URL,'name1','resizable=yes,toolbar=no,location=no,directories=no,status=no,menuBar=no,scrollBars=no,height=' + height + ',width=' + width +',top=' + top + ',left=' + left);
		if (!newwindow1.opener) newwindow1.opener = self;
	}
	if (window.focus) 
		newwindow1.focus();
		
}

function OpenForPrint(URL,height)
{
	if (height == null)
		height = 600;
		
	window.open(URL,'_blank','menubar=yes, resizable=yes,scrollbars=yes,height=' + height + ',width=750');
	
		
}

function openTutorialWindow(url) 
{
	window.open(url,null, 'resizable=yes,scrollbars=yes,height=650,width=1024,status=yes,toolbar=no,menubar=no,location=no');
}


// end: HTML page manipulation functions

// start: Formating Numbers 

function formatCurrency(num) {
    num = num.toString().replace(/\$|\,/g,'');
    if(isNaN(num))
    num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num*100+0.50000000001);
    cents = num%100;
    num = Math.floor(num/100).toString();
    if(cents<10)
    cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
    num = num.substring(0,num.length-(4*i+3))+','+
    num.substring(num.length-(4*i+3));
    return (((sign)?'':'-') + '$' + num + '.' + cents);
}

function CheckMaxDecimalValue(value)
{
    if ((Math.round(value * 100)/100) > 99999999.99)
       value = '';
       
    return value;
}

function IsNumeric(sText){

   var ValidChars = "0123456789.";
   var IsNumber=(sText.length == 0) ? false : true;
   var Char;
   
   var numberOfPeriods = 0;
 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      else if (ValidChars.indexOf(Char) == 10)
         {
         numberOfPeriods = numberOfPeriods + 1;
         if (numberOfPeriods > 1) IsNumber = false;
         }
      }
   return IsNumber;
}

function IsNumericWithNegative(sText){

   var ValidChars = "-0123456789.";
   var IsNumber=(sText.length == 0) ? false : true;
   var Char;
   var numberOfPeriods = 0;
   
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      else if (ValidChars.indexOf(Char) == 11)
         {
         numberOfPeriods = numberOfPeriods + 1;
         if (numberOfPeriods > 1) IsNumber = false;
         }
      }
   return IsNumber;
}

// end: Formating Numbers 

// start: Internationalization

function FormatCurrencyCulture(num) {
    
    
    num = num.toString().replace(/\$|\,/g,'');
    if(isNaN(num))
    num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num*100+0.50000000001);
    cents = num%100;
    num = Math.floor(num/100).toString();
    if(cents<10)
        cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
    {
        num = num.substring(0,num.length-(4*i+3)) + numGrpSep + num.substring(num.length-(4*i+3));
        }

    return (((sign)?'':'-') + curSymbol + num + numDecSep + cents);
}
function UnformatDecimalCulture(decimalValue)
{    
   	var tempVal = decimalValue.replace(/&nbsp;/g,''); 
   	    tempVal = tempVal.replace(/\s+/g,'');   	
        tempVal = tempVal.replace(curSymbol,'');
        tempVal = ReplaceAll(tempVal, numGrpSep, '');
	    tempVal = tempVal.replace(numDecSep,'.');
	return tempVal;
}

function IsNumericCulture(sText){

   var ValidChars = "0123456789"+numDecSep;
   var IsNumber=(sText.length == 0) ? false : true;
   var Char;
   
   var numberOfPeriods = 0;
 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      else if (ValidChars.indexOf(Char) == 10)
         {
         numberOfPeriods = numberOfPeriods + 1;
         if (numberOfPeriods > 1) IsNumber = false;
         }
      }
   return IsNumber;
}

function IsNumericCultureWithNegative(sText){

   var ValidChars = "-0123456789"+numDecSep;
   var IsNumber=(sText.length == 0) ? false : true;
   var Char;
   var numberOfPeriods = 0;
   
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      else if (ValidChars.indexOf(Char) == 11)
         {
         numberOfPeriods = numberOfPeriods + 1;
         if (numberOfPeriods > 1) IsNumber = false;
         }
      }
   return IsNumber;
}



// function that will round to certain decimal points:
// num - number to round
// nearest - specify 0 for whole number, 1 for 1st decimal place, 2 for 2nd decimal place 
function RoundUpDown(num, nearest) 
{
  var num=parseFloat(num);
    
  if (num > 0) 
  {
    num = num.toFixed(nearest - 1);
    if(nearest != 3) num = parseFloat(num).toFixed(2)
  }
  return num;
}


// end: Internationalization



// start: Functions relating to DropDowns

function clearDropDown(dropDownName) {
    var select = document.getElementById(dropDownName);
    while (select.length > 0) {
        select.remove(0);
    }
}

function addToDropDown(dropDownId, index, value) {
    var dropDown = document.getElementById(dropDownId);
    dropDown.options[dropDown.length] = new Option(value, index, true, true);
}

function addToACDropDown(dropDownId, key, value) {
    var dropDown = document.getElementById('txt'+dropDownId);
    dropDown.suggest.provider.addSuggestion(key, value);
    dropDown.suggest.selectValue(key);
}


function PopulateDropDown(dropdown, xmlText, valueNode, textNode ){
	
	var i = xmlText.indexOf(valueNode, 0);
	var j = xmlText.indexOf(textNode, 0);
	
	dropdown[0] = new Option('','0');
	while (i > 0) {
		
		j = xmlText.indexOf(textNode, i);
		
         var opt = new Option( xmlText.substring( j + textNode.length , xmlText.indexOf('<', j+1) ), xmlText.substring( i + valueNode.length , xmlText.indexOf('<', i+1) ));
		
		 dropdown[dropdown.length] = opt; 
         i = xmlText.indexOf(valueNode, i+1);
         
    }
}


function SelectDropdownValue(dropdown, value){
	
	
	for(var i = 0; i < dropdown.options.length; i++){
		if (dropdown.options[i].value == value){
			dropdown.options[i].selected = true;
			return;
		}
	}	
}

function EnableDisableDropDown(disable, ddl, selectValue)
{
    		
    var ddlId = document.getElementById(ddl);
    ddlId.disabled = disable;

    if (disable) ddlId.value = '';
    
    if (!disable && selectValue != null) ddlId.value = selectValue;
}

function EnableDisableACDropDown(disable, ddl, selectValue)
{
    		
    var txt = document.getElementById('txt'+ddl);
    var hid = document.getElementById('hid'+ddl);
    hid.disabled = txt.disabled = disable;

    //if (disable) hid.value = '-1';
    
    if (!disable && selectValue != null) hid.value = selectValue;
}

// end: Functions relating to DropDowns


// start: CheckBox and radio button functions

 // update selected count for checkbox all event
  function UpdateCheckAllEvent(checkbox, elementNameToMatch)
  {    
   $('input[name=' + elementNameToMatch + ']').each(function() {
    if (checkbox.checked != this.checked && !($(this).parent().parent().is(':hidden')))
        this.click();
   });
}
// function get selected radio button list value
function GetRadioValue(radioId)
{
    return $('#' + radioId + ' input:checked').val();
}

function ActivateInactivateCheckbox(checked, depended){
	
	if (checked)
		document.getElementById(depended).disabled = false;
	else{
		document.getElementById(depended).disabled = true;
		document.getElementById(depended).checked = false;
	}	
}

function ActivateInactivateTextbox(checked, depended){
	var tempVal = '0.00';
	if (!checked)
		document.getElementById(depended).value = tempVal.replace('.', numDecSep);
}


// end: Functions relating to CheckBoxes

// start: Object functions

// This function shows the calendar under the element having the given id.
// It takes care of catching "mousedown" signals on document and hiding the
// calendar if the click was outside.
function showCalendar(id, format, showsTime, showsOtherMonths) {
  var el = document.getElementById(id);
  if (_dynarch_popupCalendar != null) {
    // we already have some calendar created
    _dynarch_popupCalendar.hide();                 // so we hide it first.
  } else {
    // first-time call, create the calendar.
    var cal = new Calendar(1, null, selected, closeHandler);
    // uncomment the following line to hide the week numbers
    // cal.weekNumbers = false;
    if (typeof showsTime == "string") {
      cal.showsTime = true;
      cal.time24 = (showsTime == "24");
    }
    if (showsOtherMonths) {
      cal.showsOtherMonths = true;
    }
    _dynarch_popupCalendar = cal;                  // remember it in the global var
    cal.setRange(1900, 2070);        // min/max year allowed.
    cal.create();
  }
  _dynarch_popupCalendar.setDateFormat(format);    // set the specified date format
  _dynarch_popupCalendar.parseDate(el.value);      // try to parse the text in field
  _dynarch_popupCalendar.sel = el;                 // inform it what input field we use

  // the reference element that we pass to showAtElement is the button that
  // triggers the calendar.  In this example we align the calendar bottom-right
  // to the button.
   if(!el.disabled)
      _dynarch_popupCalendar.showAtElement(el.nextSibling, "Br");        // show the calendar

  return false;
}

// This function gets called when the end-user clicks on some date.
function selected(cal, date) {
  cal.sel.value = date; // just update the date in the input field.
  if (cal.dateClicked)
  {
    cal.callCloseHandler();
    if(cal.sel.onblur != null) cal.sel.onblur();
  }
}

// And this gets called when the end-user clicks on the _selected_ date,
// or clicks on the "Close" button.  It just hides the calendar without
// destroying it.
function closeHandler(cal) {
  cal.hide();                        // hide the calendar
//  cal.destroy();
  _dynarch_popupCalendar = null;
}

function arrowKeyHandler(e, ev){

	var VK_LEFT = 0x25;
	var VK_UP = 0x26;
	var VK_RIGHT = 0x27;
	var VK_DOWN = 0x28;
	var type = -1;
	var idToSelect = -1;

    var evt = ev ? ev : window.event;
	// ignore event if not an arrow navigation key
	switch (evt.keyCode){
		case VK_UP : {type = 1;break}
		case VK_DOWN : {type = 2;break}
	default : return;
	}

	// Get elemeents for the week
	var elems = getElementsByNameMatch(document,"^" + parseName(e.id) + "\\w*","input");
			
	for(var i = 0; i < elems.length; i++){
		
		if (elems[i].id == e.id){
			if (type == 1)
				if (i > 0)
					idToSelect = i-1;
				else
					idToSelect = elems.length-1;
			else
				if (i + 1 < elems.length)
					idToSelect = i+1;	
				else
					idToSelect = 0;
					
			break;
		}
		
	}	

	document.getElementById(elems[idToSelect].id).focus();	

} // arrowKeyHandler

/** XHConn - Simple XMLHTTP Interface - bfults@gmail.com - 2005-04-08        **
 ** Code licensed under Creative Commons Attribution-ShareAlike License      **
 ** http://creativecommons.org/licenses/by-sa/2.0/                           **/
function XHConn()
{
  var xmlhttp, bComplete = false;
  try { xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); }
  catch (e) { try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
  catch (e) { try { xmlhttp = new XMLHttpRequest(); }
  catch (e) { xmlhttp = false; }}}
  if (!xmlhttp) return null;
  this.connect = function(sURL, sMethod, sVars, fnDone)
  {
    if (!xmlhttp) return false;
    bComplete = false;
    sMethod = sMethod.toUpperCase();

    try {
      if (sMethod == "GET")
      {
        xmlhttp.open(sMethod, sURL+"?"+sVars, true);
        sVars = "";
      }
      else
      {
        xmlhttp.open(sMethod, sURL, true);
        xmlhttp.setRequestHeader("Method", "POST "+sURL+" HTTP/1.1");
        xmlhttp.setRequestHeader("Content-Type",
          "application/x-www-form-urlencoded");
      }
      xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && !bComplete)
        {
          bComplete = true;
          fnDone(xmlhttp);
        }};
      xmlhttp.send(sVars);
    }
    catch(z) { return false; }
    return true;
  };
  return this;
}

//    This is a Javascript implementation of the Java Hashtable object.
//	Copyright (C) 2003  Michael Synovic
function Hashtable(){
    this.hashtable = new Array();
}

/* privileged functions */

Hashtable.prototype.clear = function(){
    this.hashtable = new Array();
}              
Hashtable.prototype.containsKey = function(key){
    var exists = false;
    for (var i in this.hashtable) {
        if (i == key && this.hashtable[i] != null) {
            exists = true;
            break;
        }     
    }
    return exists;
}
Hashtable.prototype.containsValue = function(value){
    var contains = false;
    if (value != null) {
        for (var i in this.hashtable) {
            if (this.hashtable[i] == value) {
                contains = true;
                break;
            }
        }
    }        
    return contains;
}
Hashtable.prototype.get = function(key){
    return this.hashtable[key];
}
Hashtable.prototype.isEmpty = function(){
    return (parseInt(this.size()) == 0) ? true : false;
}
Hashtable.prototype.keys = function(){
    var keys = new Array();
    for (var i in this.hashtable) {
        if (this.hashtable[i] != null)
            keys.push(i);
    }
    return keys;
}
Hashtable.prototype.put = function(key, value){
    if (key == null || value == null) {
        throw "NullPointerException {" + key + "},{" + value + "}";
    }else{
        this.hashtable[key] = value;
    }
}
Hashtable.prototype.remove = function(key){
    var rtn = this.hashtable[key];
    this.hashtable[key] = null;
    return rtn;
}    
Hashtable.prototype.size = function(){
    var size = 0;
    for (var i in this.hashtable) {
        if (this.hashtable[i] != null)
            size ++;
    }
    return size;
}
Hashtable.prototype.toString = function(){
    var result = "";
    for (var i in this.hashtable)
    {     
        if (this.hashtable[i] != null)
            result += "{" + i + "},{" + this.hashtable[i] + "}\n";  
    }
    return result;
}                                  
Hashtable.prototype.values = function(){
    var values = new Array();
    for (var i in this.hashtable) {
        if (this.hashtable[i] != null)
            values.push(this.hashtable[i]);
    }
    return values;
}                                  
Hashtable.prototype.entrySet = function(){
    return this.hashtable;
}

// end: Object functions


//-------------------------- start: COMMON AJAX functions----------------------------

// Global variable to hold the XML returned from a successful AJAX call that can be leveraged by other functions
// for further processing
var xmlTextGlobal = '';

// 1.paramsArray      - A parameter array of name and value pairs concatinated with '=' as [paramName]=[paramValue] to append as QueryString for the AJAX call
// 2.ajaxPageName     - ASHX page to call that resides in the AJAX folder
// 3.callBackFunction - A JavaScript function that can be optionally executed if AJAX call is successful
//                    -     Paramters automatically passed to this function are  
//                            - elementsArray (See below for description of this parameter)
//                            - columnsArray (See below for description of this parameter)
//                            - Note: This function can also access the AJAX result using the global variable xmlTextGlobal
// 4.elementsArray    - An array of HTML element ids, potentially whose values are to be set with the AJAX call
// 5.columnsArray     - An array of XML element names, that can be searched and set to the HTML elements in the 
//                      previous parameter (elementsArray)
//
// Note:    There is a general purpose function called "SetSingleFormFieldValue" which can be used if the required
//          result is to just set one field in the form after the AJAX call.
// Example: AjaxSetFormControls(paramsArray, "GetEventsData", "SetSingleFormFieldValue", elementArray, columnsArray);

function AjaxSetFormControls(paramsArray, ajaxPageName, callBackFunction, elementsArray, columnsArray)
{ 
    if (paramsArray.length > 0)
    {
       var myConn = new XHConn();        
        
        if (!myConn)
	        alert("XMLHTTP not available. Please try installing a newer browser.");

        var fnWhenDone = function (oXML) 
				        {	//Returns no of rows of xml response. (for future requirement)	
			                var result = RetrieveNodeCount(oXML.responseText); 
    				        
			                if (result > 0 || result.length > 1)  
			                    xmlTextGlobal = oXML.responseText;
			                else  
			                    { 
			                        result = 0;
			                        xmlTextGlobal = '';
			                    }
    		            
			                //Create the function call from function name and parameter.   
			                 var funcCall = callBackFunction + '(' + result + ',' + "'" + elementsArray + "'" + ',' + "'" + columnsArray + "'"  + ')';
			                
                            //Call the function
			                 var res =  eval(funcCall)
			  	        };
        
        myConn.connect("../AJAX/" + ajaxPageName + ".ashx" , "GET", paramsArray.join('&'), fnWhenDone); 
    }
 }



 // function get result and bind single node value to element
 function SetSingleFormFieldValue(result, elementsArray, columnsArray)
 {
   if(result == 1)
        document.getElementById(elementsArray).value = RetrieveNodeValue(xmlTextGlobal, columnsArray);
    else
        document.getElementById(elementsArray).value = ""
 }


//RamKC issue# 2366 Duplicate check Number
/*Parameters(total: 7)*/
// 1.warningMessage is the warning that will be displayed - can include columns with [columnName] that replace values from the resultset
// 2.ajaxPageName is the pagename to be executed.
// 3.warningDivId is the div id which will display warning.
// 4.paramsArray is an array, having parameter names and values concatinated('parmName='+parValue) to send to the xml file.
// 5.if logicType = "checkDBval" RetrieveNodeValue() will return 'columnToCheck' value.
//   if logicType = "compDBval" CompareNodeValue() will compare 'columnToCheck' value with valueToCompare & returns 1 or null
//   if logicType = "getDBval" BuildErrorMessageFromXMLText() will replace support tickets of ajaxDisplayWarningMessage & returns warningMessage or null if not replaced
//   if logicType = "" to return count of rows in a data table from xml response 
// 6.columnToCheck is the column name where to check for value 0 or 1
// 7.valueToCompare is the value where to compare with columnToCheck column value.
function AjaxDisplayWarning(warningMessage, ajaxPageName, warningDivId, paramsArray, logicType, columnToCheck, valueToCompare){ 
    
    if (paramsArray.length > 0)
    {
        var myConn = new XHConn();        
        
        if (!myConn)
	        alert("XMLHTTP not available. Please try installing a newer browser.");

        var fnWhenDone = function (oXML) 
				        {				            
				            var result = "";
				            
    				        if(logicType == "checkDBval"){ //returns columnToCheck value from xml response
    				            result = RetrieveNodeValue(oXML.responseText, columnToCheck);}
    				        else if(logicType == "compDBval"){ //compares valueToCompare with columnToCheck value, returns 1(true) (for future requirement)
    				            result = CompareNodeValue(oXML.responseText, columnToCheck, valueToCompare);}
    				        else if(logicType == "getDBval"){ //errormessage support tickets will be replaced by xml node values    				            
    				            warningMessage = BuildErrorMessageFromXMLText(oXML.responseText, warningMessage);    				            
    				            if(warningMessage.length > 0)
    				                result = 1;
    				        }
    				        else{
    				            result = RetrieveNodeCount(oXML.responseText);} //Returns no of rows of xml response. (for future requirement)
    				        
				            if (result > 0 || result.length > 1)
				            {
				                document.getElementById(warningDivId).className= "validationInlineWarningMessage"; //the result is positive. make the error box visible and set the text.
            		            SetDivText(warningDivId, warningMessage);
				            }
				            else
				            {
				                document.getElementById(warningDivId).className= "validationInlinePlaceholder"; //the result is negative. make the error box non visible.
				            }
			  	        };
        
        myConn.connect("../AJAX/" + ajaxPageName + ".ashx" , "GET", paramsArray.join('&'), fnWhenDone); 
    }
    else
    {
        document.getElementById(warningDivId).className= "validationInlinePlaceholder"; //the paramerer values are empty. make the error box non visible.
    }
}

//RamKC - Generic function to reload a dropdown while data updated from the window opened from utilitiy link.
//ajaxPageName is the ajax page name to return json data.
//clientIdToBind is the control's client id to which data should be binded.
//valueToSelect is the value to be selected after binding.  
function AjaxReloadDropDown(ajaxPagePath, clientIdToBind, valueField, textField, valueToSelect){ 

    var options = $('select#' + clientIdToBind); //Gel dropdownlist element
    
    if(options.length > 0 && valueField && textField) //Check existance of dropdown, valueField and textField
    {    
        options.empty(); //Clear dropdown items
        
        //Call json to execute ajax and get response in json text format
        $.getJSON(ajaxPagePath, function(data){            
            $.each(data, function(i, item) {options.append($("<option />").val(item[valueField.toLowerCase()]).text(item[textField.toLowerCase()]));}); //Prepare and add list items to element
            if(valueToSelect){options.val(valueToSelect);} //Set the value if not null
        });
    }
}

function AjaxACReloadDropDown(ajaxPagePath, clientIdToBind, valueField, textField, valueToSelect){ 

    var textbox = $('input#txt' + clientIdToBind); //Get dropdownlist element
    
    if(textbox.length > 0 && valueField && textField) //Check existence of dropdown, valueField and textField
    {    
        var suggest = textbox[0].suggest;
        //Call json to execute ajax and get response in json text format
        $.getJSON(ajaxPagePath, function(data) {            
            suggest.provider.datalist = new Array();
            $.each(data, function(i, item) {
                suggest.provider.datalist.push({key: item[valueField.toLowerCase()], text: item[textField.toLowerCase()]});
                if (valueToSelect)
                    suggest.selectValue(valueToSelect);
            });
        });
    }
}
//--------------------------- end: COMMON AJAX functions ---------------------------------------------



 