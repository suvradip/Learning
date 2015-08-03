
var int1, int2, int3;
		 
function tabToggle(x)
{
	
	if(x==1)
	{	
	document.getElementById("x1").style.zIndex = "0";
	document.getElementById("x2").style.zIndex = "1";
	document.getElementById("tab1_h2").style.backgroundColor = "#FFFFFF";
	document.getElementById("tab2_h2").style.backgroundColor = "#E4EFFF";
	document.getElementById("tab1_h2_a").style.color = "#717171";
	document.getElementById("tab2_h2_a").style.color = "#09569d";
	}
	else
	{
	document.getElementById("x1").style.zIndex = "1";
	document.getElementById("x2").style.zIndex = "0";
	document.getElementById("tab1_h2").style.backgroundColor = "#E4EFFF";
	document.getElementById("tab2_h2").style.backgroundColor = "#FFFFFF";
	document.getElementById("tab1_h2_a").style.color = "#09569d";
	document.getElementById("tab2_h2_a").style.color = "#717171";
	
	}
}	


function numbercheck(e)
{
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
}





function radioCheckedValue(rname)
{
  var test = document.getElementsByName(rname);
    for (i=0; i < test.length; i++)
     {
        if(test[i].checked==true) 
        return test[i].value;   		 
    }
}





function overlay(cb) 
{
	el = document.getElementById("overlay");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
	
	var cb1_sub=document.getElementById("cb1_sub")
	var cb2_sub=document.getElementById("cb2_sub")
	var cb3_sub=document.getElementById("cb3_sub")





	if(cb==1)
	{
		cb1_sub.style.display="block";
		cb2_sub.style.display="none";
		cb3_sub.style.display="none";

		
		if(document.getElementById("cb1_sub_1").checked==true || document.getElementById("cb1_sub_2").checked==true || document.getElementById("cb1_sub_3").checked==true)
		document.getElementById("cb1").checked=true;
		
	}

	if(cb==2)
	{
		cb1_sub.style.display="none";
		cb2_sub.style.display="block";
		cb3_sub.style.display="none";

		if(document.getElementById("cb2_sub_1").checked==true || document.getElementById("cb2_sub_2").checked==true || document.getElementById("cb2_sub_3").checked==true)
		document.getElementById("cb2").checked=true;
		
	}

	if(cb==3)
	{
		cb1_sub.style.display="none";
		cb2_sub.style.display="none";
		cb3_sub.style.display="block";

		if(document.getElementById("cb3_sub_1").checked==true || document.getElementById("cb3_sub_2").checked==true || document.getElementById("cb3_sub_3").checked==true)
		document.getElementById("cb3").checked=true;
		
	}

	
}


var states = new Array(2) 
    states["0"] = ["Select"]; 
    states["IN"] = 
    ["Andhra Pradesh",
    "Arunachal Pradesh",
    "Assam",
    "Bihar",
    "Chhattisgarh",
    "Goa",
    "Gujarat",
    "Haryana",
    "Himachal Pradesh",
    "Jammu and Kashmir",
    "Jharkhand",
    "Karnataka",
    "Kerala",
    "Madhya Pradesh",
    "Maharashtra",
    "Manipur",
    "Meghalaya",
    "Mizoram",
    "Nagaland",
    "Odisha",
    "Punjab",
    "Rajasthan",
    "Sikkim", 
    "Tamil Nadu",
    "Telangana",
    "Tripura",
    "Uttar Pradesh",
    "Uttarakhand",
    "West Bengal"];
     
     states["US"] = 
     [
     "Alabama",
    "Alaska",
    "Arizona",
    "Arkansas",
    "California",
    "Colorado",
    "Connecticut",
    "Delaware",
    "Florida",
    "Georgia",
    "Hawaii",
    "Idaho",
    "Illinois",
    "Indiana",
    "Iowa",
    "Kansas",
    "Kentucky",
    "Louisiana",
    "Maine",
    "Maryland",
    "Massachusetts",
    "Michigan",
    "Minnesota",
    "Mississippi",    
    "Missouri",
    "Montana",
    "Nebraska",
    "Nevada",
    "New Hampshire",
    "New Jersey",
    "New Mexico",
    "New York",
    "North Carolina",
    "North Dakota",
    "Ohio",
    "Oklahoma",
    "Oregon",
    "Pennsylvania",
    "Rhode Island",
    "South Carolina",
    "South Dakota",
    "Tennessee",
    "Texas",
    "Utah",
    "Vermont",
    "Virginia",
    "Washington",
    "West Virginia",
    "Wisconsin",
    "Wyoming"];

    function stateChange(selectObj) { 
        document.getElementById("state").disabled=false;
        var idx = selectObj.selectedIndex;
        var which = selectObj.options[idx].value;
    
        var uList = states[which];
        var state = document.getElementById("state");
     
       

        while (state.options.length > 0) 
            { 
                state.remove(0); 
            }
        var newOption;
        // create and add new options 
        for (var i=0; i<uList.length; i++) 
        {
            newOption = document.createElement("option"); 
            newOption.value = uList[i];  
            newOption.text=uList[i];
            try { 
                state.add(newOption); 
                } 
            catch (e) { 
                state.appendChild(newOption);
                } 
        }
    }


    function checkIndia()
    {
        var phone=document.getElementById("phone");
        var n = phone.value.charAt(0);
        if (n=="7" || n=="8" || n=="9")   
            if (phone.value.length==10)
            phone.style.borderColor = "green";
            else
            phone.style.borderColor = "red";            
        else
            phone.style.borderColor = "red";
        
    }

    function removeOptions()
    {
        
        document.getElementById("state").innerHTML="";
        document.getElementById("state").disabled=true;
        document.getElementById("subscription").innerHTML="";
        document.getElementById("nameErr").innerHTML="";
        document.getElementById("phoneErr").innerHTML="";   
        document.getElementById("emailErr").innerHTML="";
        document.getElementById("stateErr").innerHTML="";   
        document.getElementById("feedbackErr").innerHTML="";    
        document.getElementById("sexErr").innerHTML=""; 
        document.getElementById("interestErr").innerHTML="";    
        document.getElementById("emailValidate").innerHTML="";  
        document.getElementById("phoneValidate").innerHTML="";  
        document.getElementById("countryErr").innerHTML="";    
    }


    function loadXMLDoc(q)
    {
        var xmlhttp;
        var txt,x,i;

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                data=xmlhttp.responseText;
               // console.log(data);  

                if(data=="Subscription")
                {
                document.getElementById("nameErr").innerHTML="";
                document.getElementById("phoneErr").innerHTML="";   
                document.getElementById("emailErr").innerHTML="";
                document.getElementById("stateErr").innerHTML="";   
                document.getElementById("feedbackErr").innerHTML="";    
                document.getElementById("sexErr").innerHTML=""; 
                document.getElementById("interestErr").innerHTML="";    
                document.getElementById("emailValidate").innerHTML="";  
                document.getElementById("phoneValidate").innerHTML="";
                document.getElementById("countryErr").innerHTML="";     

                document.getElementById("subscription").innerHTML="Subscription Successfull.";
                document.getElementById("subscription").style.color="green";    
                }
                else
                {
                var json =JSON.parse(data);     
                //console.log(json);    

                document.getElementById("subscription").innerHTML="* required"; 
                document.getElementById("subscription").style.color="red";
                if(json["nameErr"])
                document.getElementById("nameErr").innerHTML="*";   
                else
                document.getElementById("nameErr").innerHTML="";

                if(json["phoneErr"])
                document.getElementById("phoneErr").innerHTML="*";  
                else
                document.getElementById("phoneErr").innerHTML="";   


                if(json["emailErr"])
                document.getElementById("emailErr").innerHTML="*";  
                else
                document.getElementById("emailErr").innerHTML="";   


                if(json["countryErr"])
                document.getElementById("countryErr").innerHTML="*";    
                else
                document.getElementById("countryErr").innerHTML=""; 


                if(json["stateErr"])
                document.getElementById("stateErr").innerHTML="*";  
                else
                document.getElementById("stateErr").innerHTML="";   

                if(json["feedbackErr"])
                document.getElementById("feedbackErr").innerHTML="*";   
                else
                document.getElementById("feedbackErr").innerHTML="";    

                if(json["sexErr"])
                document.getElementById("sexErr").innerHTML="*";    
                else
                document.getElementById("sexErr").innerHTML=""; 

                if(json["interestErr"])
                document.getElementById("interestErr").innerHTML="*";   
                else
                document.getElementById("interestErr").innerHTML="";    


                if(json["emailFormat"])
                document.getElementById("emailValidate").innerHTML="";  
                else
                document.getElementById("emailValidate").innerHTML="Invalid";   

                if(json["phoneFormat"])
                document.getElementById("phoneValidate").innerHTML="";  
                else
                document.getElementById("phoneValidate").innerHTML="Invalid";   
                }   


            }
        }

        xmlhttp.open("GET","php_files/action_files/actionIndex.php?"+q,true);
        xmlhttp.send();


        
    }
    

    function checkValidData()
    {
            var chk1=chk2=chk3="";

            var n=document.getElementById("name").value;
            var e=document.getElementById("email").value;
            var p=document.getElementById("phone").value;
            var con = document.getElementById("country").value;
            var s = document.getElementById("state").value;
            var f=document.getElementById("feedback").value;
            var gender =  radioCheckedValue("sex");

            var cb1=document.getElementById("cb1").checked;
            var cb2=document.getElementById("cb2").checked;
            var cb3=document.getElementById("cb3").checked;
            

            if(cb1)
            var cb1V=document.getElementById("cb1").value;
            
            if(cb2)        
            var cb2V=document.getElementById("cb2").value;
            
            if(cb3)
            var cb3V=document.getElementById("cb3").value;

            var q= "name=" + n + "&email=" + e + "&phone=" + p + "&country=" + con + "&state=" + s + "&feedback=" + f + "&sex=" + gender + "&cb1=" + cb1 + "&cb2=" + cb2 + "&cb3=" + cb3 + "&cb1V=" + cb1V + "&cb2V=" + cb2V + "&cb3V=" + cb3V;


            loadXMLDoc(q);
        
    }


    