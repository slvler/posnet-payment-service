// JavaScript Document
function submitForm(Form, OpenNewWindowFlag, WindowName) {
    
    var isURLExist = false;
    var isNewWindowExist = false;
    
    if (document.all || document.getElementById){
		for (i = 0; i < Form.length; i++) {
			var tempobj = Form.elements[i];
			
			if(tempobj.name.toLowerCase() == "url")
			{
			    Form.url.value = location.href;
			    isURLExist = true;
			}   
			
			if(OpenNewWindowFlag && tempobj.name == "openANewWindow")
			{
			    tempobj.value = "1";
			    isNewWindowExist = true;
			}
			else if(tempobj.name == "openANewWindow")
			{
			    tempobj.value = "0";
			    isNewWindowExist = true;
			}
		}
	}
	    
    if(!isURLExist)
    {
        el = document.createElement("input");
        el.name = "url";
        el.type = "hidden";
        el.value = location.href;
        el = Form.appendChild(el);
    }

    if(!isNewWindowExist)
    {
        el2 = document.createElement("input");
        el2.name = "openANewWindow";
        el2.type = "hidden";
        if(OpenNewWindowFlag)
            el2.value = "1";
        else
            el2.value = "0";
        el2 = Form.appendChild(el2);
    }
    
    if(OpenNewWindowFlag)
    {
	    window.name = "merchantWindow";	
        openWindow(WindowName,650,600);
    }
    else
	    window.name = "YKBWindow";	
}

function openWindow(WindowName,width,height) {
    x = (640 - width)/2, y = (480 - height)/2;

    if (screen) {
        y = (screen.availHeight - height - 70)/2;
        x = (screen.availWidth - width)/2;
    }

    window.open('',WindowName,'width='+width+',height='+height+',screenX='+x+',screenY='+y+',top='+y+',left='+x+',status=yes,location=yes,resizable=no,scrollbars=yes');
}